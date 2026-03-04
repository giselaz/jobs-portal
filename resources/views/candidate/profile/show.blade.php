<x-layouts.landing>
    <div class="min-h-[80vh] px-4 py-12">
        <div class="mx-auto max-w-6xl">
            <div class="mb-8">
                <h1 class="text-3xl font-bold tracking-tight text-slate-900">My Profile</h1>
                <p class="mt-2 text-slate-600">Manage your profile and view your applications</p>
            </div>

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
                            <a href="{{ route('profile.edit',$profile) }}"
                                class="flex items-center gap-3 rounded-lg px-4 py-2.5 text-sm font-medium text-slate-700 hover:bg-violet-50 hover:text-violet-700 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                                Edit Profile
                            </a>

                            <a href="{{ route('my-job-application.index') }}"
                                class="flex items-center gap-3 rounded-lg px-4 py-2.5 text-sm font-medium text-slate-700 hover:bg-violet-50 hover:text-violet-700 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                                </svg>
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
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                    </svg>
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
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                            </svg>
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
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="mx-auto size-12 text-slate-400">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
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
