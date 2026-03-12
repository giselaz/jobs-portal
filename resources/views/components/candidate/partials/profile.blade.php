 @props([
    'profile'
 ])
 <x-card class="mb-6  border border-slate-200 bg-white p-6 sm:p-8">
                            <x-card-header>
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
                            </x-card-header>

                            @if ($profile->bio)
                                <x-card-body>
                                    <h3 class="text-sm font-medium text-slate-900">Bio</h3>
                                    <p class="mt-2 text-slate-600">{{ $profile->bio }}</p>
                                </x-card-body>
                            @endif

                            <x-card-body>
                                <div class="grid gap-4 sm:grid-cols-3">
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
                                            <p class="mt-1 text-lg font-semibold text-slate-900">{{ $profile->phone }}
                                            </p>
                                        </div>
                                    @endif
                                </div>
                            </x-card-body>
                        </x-card>