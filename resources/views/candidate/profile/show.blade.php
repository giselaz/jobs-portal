<x-layouts.landing>
    <div class="min-h-[80vh] px-4 py-12">
        <div class="mx-auto max-w-6xl">

            <x-section-title title="My Profile" subtitle="Manage your profile and view your applications"
                class="mb-8 text-left" />
            <div class="grid gap-8 lg:grid-cols-4">
                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                        <!-- User Info -->
                        <div class="mb-6 text-center">
                            <div
                                class="mx-auto mb-4 flex h-20 w-20 items-center justify-center rounded-full bg-violet-100 text-2xl font-bold text-violet-600">
                                {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                            </div>
                            <h2 class="text-lg font-semibold text-slate-900">{{ Auth::user()->name }}</h2>
                            <p class="text-sm text-slate-500">{{ Auth::user()->email }}</p>
                        </div>

                        <nav class="space-y-2">
                            <a href="{{ route('profile.edit', $profile) }}"
                                class="flex items-center gap-3 rounded-lg px-4 py-2.5 text-sm font-medium text-slate-700 hover:bg-violet-50 hover:text-violet-700 transition">
                                <x-heroicon-o-pencil-square class="w-5 h-5" />
                                Edit Profile
                            </a>

                            <a href="{{ route('my-job-application.index') }}"
                                class="flex items-center gap-3 rounded-lg px-4 py-2.5 text-sm font-medium text-slate-700 hover:bg-violet-50 hover:text-violet-700 transition">
                                <x-heroicon-o-briefcase class="w-5 h-5" />
                                My Applications
                                @php
                                    $applicationCount = Auth::user()->jobApplications()->count();
                                @endphp
                                @if ($applicationCount > 0)
                                    <span
                                        class="ml-auto rounded-full bg-violet-100 px-2.5 py-0.5 text-xs font-semibold text-violet-700">
                                        {{ $applicationCount }}
                                    </span>
                                @endif
                            </a>

                            @if ($profile?->cv_path)
                                <a href="{{ route('candidate.cv.download') }}"
                                    class="flex items-center gap-3 rounded-lg px-4 py-2.5 text-sm font-medium text-slate-700 hover:bg-violet-50 hover:text-violet-700 transition">
                                    <x-heroicon-o-document class="size-5" />
                                    View CV
                                </a>
                            @endif
                        </nav>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="lg:col-span-3">
                    @if ($profile)
                        <!-- Profile Info Card -->
                        <div class="mb-6 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                            <div class="flex items-start justify-between">
                                <div>
                                    <h2 class="text-xl font-semibold text-slate-900">
                                        {{ $profile->job_title ?? 'No job title set' }}</h2>
                                    @if ($profile->location)
                                        <p class="mt-1 flex items-center gap-1 text-slate-600">
                                            <x-heroicon-o-map-pin class="size-4" />
                                            {{ $profile->location }}
                                        </p>
                                    @endif
                                </div>
                                @if ($profile->is_profile_complete)
                                    <span
                                        class="rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-700">Profile
                                        Complete</span>
                                @endif
                            </div>

                            @if ($profile->bio)
                                <div class="mt-6">
                                    <h3 class="text-sm font-medium text-slate-900">Bio</h3>
                                    <p class="mt-2 text-slate-600">{{ $profile->bio }}</p>
                                </div>
                            @endif

                            <div class="mt-6 grid gap-4 sm:grid-cols-3">
                                @if ($profile->years_of_experience !== null)
                                    <div class="rounded-lg bg-slate-50 p-4">
                                        <p class="text-xs font-medium text-slate-500">Experience</p>
                                        <p class="mt-1 text-lg font-semibold text-slate-900">
                                            {{ $profile->years_of_experience }} years</p>
                                    </div>
                                @endif

                                @if ($profile->expected_salary)
                                    <div class="rounded-lg bg-slate-50 p-4">
                                        <p class="text-xs font-medium text-slate-500">Expected Salary</p>
                                        <p class="mt-1 text-lg font-semibold text-slate-900">
                                            {{ $profile->salary_currency ?? '$' }}{{ number_format($profile->expected_salary) }}
                                        </p>
                                    </div>
                                @endif

                                @if ($profile->phone)
                                    <div class="rounded-lg bg-slate-50 p-4">
                                        <p class="text-xs font-medium text-slate-500">Phone</p>
                                        <p class="mt-1 text-lg font-semibold text-slate-900">{{ $profile->phone }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Recent Applications -->
                        @php
                            $recentApplications = Auth::user()
                                ->jobApplications()
                                ->with('jobPortal')
                                ->latest()
                                ->take(5)
                                ->get();
                        @endphp

                        @if ($recentApplications->count() > 0)
                            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                                <div class="mb-4 flex items-center justify-between">
                                    <h2 class="text-lg font-semibold text-slate-900">Recent Applications</h2>
                                    <a href="{{ route('my-job-application.index') }}"
                                        class="text-sm font-medium text-violet-600 hover:text-violet-700">View all</a>
                                </div>
                                <div class="space-y-4">
                                    @foreach ($recentApplications as $application)
                                        <div
                                            class="flex items-center justify-between rounded-lg border border-slate-200 p-4">
                                            <div>
                                                <h3 class="font-medium text-slate-900">
                                                    {{ $application->jobPortal->title }}</h3>
                                                <p class="text-sm text-slate-500">
                                                    {{ $application->jobPortal->employer->company_name ?? 'Company' }}
                                                </p>
                                            </div>
                                            <div class="text-right">
                                                <span
                                                    class="@if ($application->status === 'pending') text-yellow-600 @elseif($application->status === 'accepted') text-green-600 @else text-slate-600 @endif text-sm font-medium">
                                                    {{ ucfirst($application->status) }}
                                                </span>
                                                <p class="text-xs text-slate-500">
                                                    {{ $application->created_at->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @else
                        <!-- Empty State -->
                        <div class="rounded-2xl border border-slate-200 bg-white p-8 text-center shadow-sm">
                            <x-heroicon-o-user class="mx-auto size-12 text-slate-400" />
                            <h3 class="mt-4 text-lg font-semibold text-slate-900">No Profile Yet</h3>
                            <p class="mt-2 text-slate-600">Complete your profile to help employers find you</p>
                            <a href="{{ route('candidate.profile.edit') }}" class="mt-6 inline-block">
                                <x-button type="button" variant="primary">
                                    Complete Profile
                                </x-button>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layouts.landing>
