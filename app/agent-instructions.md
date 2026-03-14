You are a senior full-stack Laravel developer and UI/UX architect. I am building a job portal 
application styled like LinkedIn using Laravel 12, Blade components, Alpine.js, Livewire, 
and Tailwind CSS. Help me refactor and extend this application with clean architecture, 
reusable components, and smooth user experience.

---

## CURRENT STATE OF THE APP

### Features:
- Homepage: job search and filtering
- Single Job Page: job application form
- User Profile Page:
  - Displays user data (experience, education, skills, languages)
  - Editable fields: years of experience, phone number, location (plain text), expected salary
  - CV upload → calls local Ollama API (Mistral 7B) → extracts and saves experience, 
    education, skills, languages to DB
  - Missing: phone country extension selector, location API, salary currency selector
  - CV parsing flow is unstructured and not smooth for the user

### Tech Stack:
- Laravel 12
- Blade components (class-based and anonymous)
- Alpine.js (tab switching, conditional rendering)
- Livewire (where needed)
- Tailwind CSS
- Heroicons (via blade-heroicons package)
- Local Ollama API for CV parsing (Mistral 7B)

---

## WHAT I WANT YOU TO DO

### 1. BACKEND ARCHITECTURE

Structure the backend following these rules:

Routes:
- Group routes by domain: candidate, employer, admin, auth
- Use Route::prefix() and Route::name() consistently
- Example:
  Route::prefix('candidate')->name('candidate.')->middleware(['auth', 'role:candidate'])->group(function () {
      Route::get('/profile', [CandidateController::class, 'show'])->name('profile.show');
      Route::post('/cv/upload', [CandidateController::class, 'uploadCv'])->name('cv.upload');
  });

Controllers:
- Single Responsibility: one controller per domain entity
- CandidateController: profile show, edit, update
- CvController: handle upload, trigger parsing, return status
- JobController: index, show, filter
- ApplicationController: store, index, show
- Each controller method should be under 20 lines, delegate logic to Services

Services:
- CvParserService: extract text, call Ollama, return structured array
- ProfileFillerService: take parsed CV data, map to DB columns, save to profile
- JobFilterService: handle search and filter logic
- Each service method should do ONE thing

Form Requests:
- CvUploadRequest: validate file type, size
- ProfileUpdateRequest: validate all profile fields
- JobApplicationRequest: validate application fields

---

### 2. CV PARSING FLOW - MAKE IT SMOOTH

Current flow is messy. Refactor it into this clean flow:

Step 1 - Upload:
- User uploads CV via a Livewire component <livewire:candidate.cv-upload>
- Show upload progress indicator
- On success show: "CV uploaded. Parsing your profile..."

Step 2 - Parse:
- Dispatch a queued Laravel Job: ParseCvJob::dispatch($profile, $filePath)
- ParseCvJob calls CvParserService then ProfileFillerService
- Use Laravel queues (database driver) so the UI is not blocked

Step 3 - Notify:
- When ParseCvJob finishes, fire a Laravel Event: CvParsed
- CvParsed listener triggers a Livewire broadcast or polling refresh
- Show user: "Profile updated from your CV!"
- Profile sections refresh automatically without page reload

---

### 3. FRONTEND ARCHITECTURE

#### Reusable Blade Components

Build a component system under resources/views/components/ with this structure:

components/
├── ui/
│   ├── button.blade.php          # variants: primary, secondary, danger, ghost
│   ├── badge.blade.php           # variants: success, warning, info, muted
│   ├── card.blade.php            # base card wrapper with optional header slot
│   ├── avatar.blade.php          # user avatar with fallback initials
│   ├── empty-state.blade.php     # empty section with icon + message + optional CTA
│   └── section-header.blade.php  # title + subtitle + optional action slot
├── form/
│   ├── input.blade.php           # styled text input with label + error
│   ├── select.blade.php          # styled select with label + error
│   ├── phone-input.blade.php     # country code selector + number input
│   ├── salary-input.blade.php    # currency selector + amount input
│   └── file-upload.blade.php     # drag and drop CV upload area
├── candidate/
│   ├── sidebar.blade.php
│   └── partials/
│       ├── profile-header.blade.php
│       ├── experience.blade.php
│       ├── education.blade.php
│       ├── skills.blade.php
│       └── languages.blade.php
└── icons/
    ├── briefcase.blade.php       # wraps heroicon with consistent sizing + color props
    ├── academic-cap.blade.php
    └── [one file per icon used]

#### Icon Component Pattern (consistent sizing and color via props):
@props(['size' => 'md', 'class' => ''])

@php
  $sizes = ['sm' => 'size-4', 'md' => 'size-5', 'lg' => 'size-6', 'xl' => 'size-8'];
  $sizeClass = $sizes[$size] ?? $sizes['md'];
@endphp

<x-heroicon-o-briefcase {{ $attributes->merge(['class' => "$sizeClass $class"]) }} />

#### Button Component Pattern (variants via props):
@props(['variant' => 'primary', 'type' => 'button', 'size' => 'md'])

@php
  $variants = [
    'primary' => 'bg-violet-600 text-white hover:bg-violet-700',
    'secondary' => 'bg-white text-slate-700 border border-slate-200 hover:bg-slate-50',
    'danger' => 'bg-red-600 text-white hover:bg-red-700',
    'ghost' => 'text-slate-600 hover:bg-slate-100',
  ];
  $sizes = ['sm' => 'px-3 py-1.5 text-xs', 'md' => 'px-4 py-2 text-sm', 'lg' => 'px-6 py-3 text-base'];
@endphp

<button type="{{ $type }}" 
  {{ $attributes->merge(['class' => "inline-flex items-center gap-2 rounded-lg font-medium transition {$variants[$variant]} {$sizes[$size]}"]) }}>
  {{ $slot }}
</button>

---

### 4. MISSING FEATURES TO ADD

#### Phone Number with Country Code:
- Build <x-form.phone-input> component
- Uses Alpine.js for country selector dropdown
- Country list with dial codes stored in a config file: config/countries.php
- Saves as: country_code (+1) + number (2025550100) separately in DB

#### Location with Autocomplete:
- Integrate free Nominatim API (no API key needed): https://nominatim.openstreetmap.org/search
- Build <x-form.location-input> Livewire component
- As user types, debounce 400ms, call Nominatim, show dropdown suggestions
- Save: city, country, full_address separately in DB

#### Salary with Currency:
- Build <x-form.salary-input> component
- Currency list stored in config/currencies.php
- Default currency based on user country
- Show formatted salary on profile: "$85,000 / year"

#### Profile Completion Progress Bar:
- Calculate % based on filled fields: photo, bio, experience, education, skills, location, phone, salary
- Show LinkedIn-style progress bar on profile header
- Update in real time when fields are saved using Livewire

---

### 5. LINKEDIN-STYLE UI PATTERNS TO FOLLOW

- Clean white cards with subtle shadow and rounded-xl corners
- Violet as primary accent color (matching current setup)
- Section headers with icon + title + "Add" button aligned right
- Inline editing: clicking a section opens an edit form below it without navigation
- Toast notifications for save/error feedback (Alpine.js based)
- Skeleton loaders while CV is being parsed
- Empty states with icon + message + CTA for each empty section

---

### 6. DESIGN PATTERNS TO APPLY

Backend:
- Service Layer Pattern: controllers call services, never touch models directly
- Repository Pattern (optional): abstract DB queries if app grows
- DTO (Data Transfer Objects): use simple PHP classes or arrays to pass parsed CV data between services
- Observer Pattern: use Laravel Model Observers to trigger side effects (e.g. recalculate profile completion when experience is added)

Frontend:
- Compound Component Pattern: card + card-header + card-body as composable units
- Slot Pattern: all components expose named slots for customization
- Variant Pattern: all UI components (button, badge, input) accept a variant prop
- Container/Presenter split: Livewire component handles data, Blade partial handles display

---
### 7. DATA LOADING RULES (STRICT - NO EXCEPTIONS)

#### Backend is responsible for ALL data preparation:
- Eager load every relationship needed by the view in the controller using with()
- Never lazy load inside Blade templates or components
- Never call $model->relationship in a loop inside Blade (N+1 problem)
- Never use Auth::user() or request()->user() inside Blade or components
- Never access ->count(), ->sum(), ->avg() inside Blade — compute in controller and pass as variable

#### Controller must pass ready-to-use data:
// WRONG
return view('candidate.profile.show', compact('profile'));

// RIGHT
$profile = CandidateProfile::with([
    'user',
    'skills',
    'languages',
    'experiences' => fn($q) => $q->orderBy('start_date', 'desc'),
    'educations'  => fn($q) => $q->orderBy('start_date', 'desc'),
])
->withCount('jobApplications')
->where('user_id', $user->id)
->firstOrFail();

return view('candidate.profile.show', [
    'profile'            => $profile,
    'experienceCount'    => $profile->experiences->count(),
    'educationCount'     => $profile->educations->count(),
    'skillCount'         => $profile->skills->count(),
    'applicationCount'   => $profile->job_applications_count,
    'profileCompletion'  => $this->profileService->calculateCompletion($profile),
    'recentApplications' => $profile->user->jobApplications()
                                ->with('jobPortal')
                                ->latest()
                                ->limit(5)
                                ->get(),
]);

#### Blade and components must ONLY:
- Loop over already loaded collections: @foreach($experiences as $exp)
- Display already computed variables: {{ $profileCompletion }}%
- Conditionally show/hide using already passed booleans or counts
- NEVER call methods on models: 
    WRONG:  {{ $profile->experiences()->count() }}  (hits DB)
    RIGHT:  {{ $experienceCount }}                  (already computed)
    WRONG:  {{ $profile->user->name }}              (lazy loads user)
    RIGHT:  {{ $profile->user->name }}              (only ok if user was eager loaded)
    WRONG:  @if($profile->skills()->exists())       (hits DB)
    RIGHT:  @if($skillCount > 0)                    (already computed)

#### Services must return clean arrays or DTOs, never Eloquent queries:
// WRONG - returns a query builder
public function getExperiences($profile) {
    return $profile->experiences()->orderBy('start_date');
}

// RIGHT - returns a ready collection
public function getExperiences($profile) {
    return $profile->experiences->sortByDesc('start_date')->values();
}

#### For Livewire components:
- Load all data in the mount() method once
- Use computed properties with #[Computed] attribute for derived values
- Never query inside render() method

// WRONG
public function render() {
    return view('livewire.cv-upload', [
        'skills' => $this->profile->skills()->get() // queries on every render
    ]);
}

// RIGHT
public function mount(CandidateProfile $profile) {
    $this->profile = $profile->load(['skills', 'experiences', 'educations', 'languages']);
}

#[Computed]
public function skillCount() {
    return $this->profile->skills->count(); // uses already loaded collection
}

## OUTPUT FORMAT

For each change you suggest, provide:
1. File path
2. Full file content
3. A one-line explanation of why this change improves the architecture

Start with the backend structure first (routes, controllers, services), 
then move to frontend components, then the CV parsing flow, then missing features.

Ask me clarifying questions before generating code if anything is ambiguous.


