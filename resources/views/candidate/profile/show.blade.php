<x-layouts.landing>
    <div class="min-h-[80vh] px-4 py-12">
        <div class="mx-auto max-w-6xl">
            <x-section-title title="My Profile" subtitle="Manage your profile and view your applications"
                class="mb-8 text-left" />
            <div class="grid gap-8 lg:grid-cols-4">
                <!-- Sidebar -->
                <x-candidate.sidebar :profile="$profile" :applicationCount="$applicationCount" />

                <!-- Main Content -->
                <div class="lg:col-span-3">
                    @if ($profile)
                        <!-- Profile Info Card -->
                        <x-card class="mb-6  border border-slate-200 bg-white p-6 sm:p-8">
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
                                    <x-tag variant="success"
                                        class="rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-700">Profile
                                        Complete</x-tag>
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
                        </x-card>

                        <!-- Recent Applications -->

                        @if ($recentApplications->count() > 0)
                            <x-card class="border">
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
                            </x-card>
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
