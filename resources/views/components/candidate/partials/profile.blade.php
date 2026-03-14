@props(['profile'])
<x-card class="mb-8 border border-slate-200/50 bg-gradient-to-br from-slate-50 to-white shadow-xl">
    <div class="p-8 sm:p-8">
        <div class="flex flex-col lg:flex-row lg:items-start lg:gap-6">
            <!-- Avatar & Headline -->
            <div class="flex-shrink-0 mb-6 lg:mb-0">
                <div class="relative">
                    <x-initials-avatar :name="Auth::user()->name" class="size-24 ring-4 ring-white shadow-lg" />
                </div>
                <div class="mt-4 text-center lg:text-left">
                    <h1 class="text-2xl font-bold text-slate-900 mb-1">{{ Auth::user()->name }}</h1>
                    <p class="text-lg text-slate-600 mb-2">{{ $profile->job_title ?? 'Job Seeker' }}</p>
                    @if ($profile->location)
                        <p class="flex items-center gap-1 text-slate-500">
                            <x-heroicon-o-map-pin class="size-4" />
                            {{ $profile->location }}
                        </p>
                    @endif
                </div>
            </div>

            <!-- Stats -->
            <div class="flex-1 grid grid-cols-1 md:grid-cols-3 gap-4 mt-6 lg:mt-0 lg:ml-auto">
                @if ($profile->years_of_experience !== null)
                    <div
                        class="text-center lg:text-left p-4 gap-2 rounded-xl bg-white/50 backdrop-blur-sm border border-slate-200/50 shadow-sm">
                        <div class="text-lg font-bold text-slate-900">{{ $profile->years_of_experience }}</div>
                        <div class="text-xs text-slate-500 uppercase tracking-wide font-medium">Years Experience</div>
                    </div>
                @endif

                @if ($profile->expected_salary)
                    <div
                        class="text-center lg:text-left p-4 rounded-xl bg-white/50 backdrop-blur-sm border border-slate-200/50 shadow-sm">
                        <div class="text-lg font-bold text-slate-900">
                            {{ $profile->salary_currency ?? '$' }}{{ number_format($profile->expected_salary) }}</div>
                        <div class="text-xs text-slate-500 uppercase tracking-wide font-medium">Expected Salary</div>
                    </div>
                @endif

                @if ($profile->phone)
                    <div
                        class="text-center lg:text-left p-4 rounded-xl bg-white/50 backdrop-blur-sm border border-slate-200/50 shadow-sm">
                        <div class="text-lg font-semibold text-slate-900">{{ $profile->phone }}</div>
                        <div class="text-xs text-slate-500 uppercase tracking-wide font-medium">Contact</div>
                    </div>
                @endif
            </div>
        </div>

        @if ($profile->bio)
            <div class="mt-10 pt-10 border-t border-slate-200">
                <h2 class="text-xl font-bold text-slate-900 mb-4 flex items-center gap-3">
                    <x-heroicon-o-user-circle class="size-6 flex-shrink-0" />
                    About
                </h2>
                <p class="text-lg text-slate-700 leading-relaxed max-w-3xl">{{ $profile->bio }}</p>
            </div>
        @endif

        @if ($profile->is_profile_complete)
            <div class="mt-6 p-4 bg-emerald-50 border border-emerald-200 rounded-xl">
                <div class="flex items-center gap-3">
                    <div class="flex-shrink-0">
                        <x-heroicon-o-check-circle class="size-6 text-emerald-600" />
                    </div>
                    <div>
                        <h3 class="font-semibold text-emerald-900">Profile Complete</h3>
                        <p class="text-sm text-emerald-700">Your profile is 100% complete and ready to attract
                            employers!</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-card>
