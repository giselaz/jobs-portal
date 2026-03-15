# Job Portal - Project Context

## Tech Stack
- Laravel 12
- Blade components (class-based and anonymous)
- Alpine.js (tab switching, conditional rendering)
- Livewire (where needed)
- Tailwind CSS
- Heroicons (via blade-heroicons package)
- Local Ollama API for CV parsing (Mistral 7B)

---

## Features

### ✅ Done
- Homepage: job search and filtering
- Single Job Page: job application form
- User Profile Page:
  - Displays user data (experience, education, skills, languages)
  - Editable fields: years of experience, phone number, location, expected salary
  - CV upload → Ollama API (Mistral 7B) → extracts and saves experience, education, skills, languages

### ⚠️ Partially Done / Needs Fixing
- Phone number: missing country extension selector
- Location: plain text field, not connected to any API
- Expected salary: missing currency selector
- CV parsing flow: works but is unstructured and not smooth for the user

### ❌ Not Started
- Phone country code selector (config/countries.php + Alpine.js dropdown)
- Location autocomplete (Nominatim API)
- Salary currency selector (config/currencies.php)
- Profile completion progress bar
- Queued CV parsing (Laravel Jobs + Events)
- Skeleton loaders during CV parsing

---

## Current Issues
- CV parsing flow blocks the UI (not queued)
- Profile sections not refreshing after CV parse without page reload
- N+1 queries in profile view (relationships not fully eager loaded)
- No consistent reusable UI component system yet
- Routes not grouped by domain
- Controllers doing too much (service layer not fully applied)

---

## File Structure (current)
app/
├── Http/
│   ├── Controllers/
│   │   ├── CandidateController.php
│   │   └── JobController.php
│   └── Requests/
├── Models/
│   ├── CandidateProfile.php
│   ├── JobPortal.php
│   └── JobApplication.php
└── Services/
    └── CvParserService.php

---

## Progress Log
<!-- Update this as you build -->
- [date] Initial profile page built
- [date] CV upload + Ollama parsing working
```

