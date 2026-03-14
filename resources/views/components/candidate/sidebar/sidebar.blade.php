@props(['profile', 'applicationCount'])
<aside class="lg:col-span-1 sticky top-8 self-start space-y-6">
    <!-- Profile Card -->
    <x-card class="border-0 shadow-lg ring-1 ring-slate-200/50">
        <div class="p-6">
            <div class="text-center mb-6">
                <div class="relative inline-block mb-4">
                    <x-initials-avatar :name="Auth::user()->name" class="size-20 ring-4 ring-white shadow-2xl mx-auto" />
                    @if ($profile->is_profile_complete)
                        <div
                            class="absolute -bottom-1 -right-1 bg-emerald-500 border-4 border-white rounded-full p-1.5 shadow-lg">
                            <x-heroicon-o-check class="size-4 text-white" />
                        </div>
                    @endif
                </div>
                <h2 class="text-xl font-bold text-slate-900 mt-2">{{ Auth::user()->name }}</h2>
                <p class="text-slate-500 text-sm">{{ $profile->job_title ?? 'Job Seeker' }}</p>
            </div>

            <!-- Profile Completeness -->
            <div class="mb-6">
                <div class="flex items-center gap-2 mb-2">
                    <div class="flex-1 bg-slate-200 rounded-full h-2">
                        <div class="bg-gradient-to-r from-emerald-500 to-blue-500 h-2 rounded-full transition-all"
                            style="width: {{ $profile->is_profile_complete ? '100' : '75' }}%"></div>
                    </div>
                    <span
                        class="text-xs font-medium text-slate-600">{{ $profile->is_profile_complete ? 'Complete' : '75% Complete' }}</span>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-2 gap-3 mb-6">
                <div class="text-center p-3 bg-slate-50/50 rounded-lg">
                    <div class="text-lg font-bold text-slate-900">{{ $profile->experiences->count() }}</div>
                    <div class="text-xs text-slate-500 uppercase tracking-wide">Positions</div>
                </div>
                <div class="text-center p-3 bg-slate-50/50 rounded-lg">
                    <div class="text-lg font-bold text-slate-900">{{ $profile->skills->count() }}</div>
                    <div class="text-xs text-slate-500 uppercase tracking-wide">Skills</div>
                </div>
            </div>

            <!-- Actions -->
            <div class="space-y-2">
                <a href="{{ route('profile.edit', $profile) }}"
                    class="w-full block text-center bg-linear-to-r from-slate-900 to-slate-800 hover:from-slate-800 hover:to-slate-700 text-white font-semibold py-3 px-6 rounded-xl shadow-lg hover:shadow-xl transition-all text-sm">
                    <x-heroicon-o-pencil-square class="size-4 inline-block mr-2 -ml-1" />
                    Edit Profile
                </a>
                @if ($profile?->cv_path)
                    <a href="{{ route('candidate.cv.download') }}"
                        class="w-full block text-center border border-slate-200 hover:border-slate-300 bg-white font-semibold py-3 px-6 rounded-xl hover:shadow-md transition-all text-sm flex items-center justify-center gap-2">
                        <x-heroicon-o-arrow-down-tray class="size-4" />
                        Download CV
                    </a>
                @else
                    <a href="{{ route('candidate.cv.uploadCv', $profile) }}"
                        class="w-full block text-center border border-slate-200 hover:border-slate-300 bg-white font-semibold py-3 px-6 rounded-xl hover:shadow-md transition-all text-sm flex items-center justify-center gap-2">
                        <x-heroicon-o-arrow-up-tray class="size-4" />
                        Upload CV
                    </a>
                @endif
            </div>

            @if ($applicationCount > 0)
                <div class="mt-6 p-4 bg-linear-to-r from-violet-50 to-indigo-50 border border-violet-200 rounded-xl">
                    <div class="flex items-center gap-3">
                        <div class="shrink-0 p-2 bg-violet-200 rounded-lg">
                            <x-heroicon-o-briefcase class="size-5 text-violet-700" />
                        </div>
                        <div>
                            <h4 class="font-semibold text-slate-900 text-sm">{{ $applicationCount }} Applications</h4>
                            <a href="{{ route('my-job-application.index') }}"
                                class="text-sm text-violet-700 hover:text-violet-800 font-medium">View all →</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </x-card>
</aside>
