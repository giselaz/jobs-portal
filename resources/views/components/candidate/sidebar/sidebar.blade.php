@props(['profile', 'applicationCount'])
<div class="lg:col-span-1">
    <x-card class="border border-slate-200 bg-white p-6">
        <!-- User Info -->
        <x-card-body class="mt-0">
            <div class="mb-6 text-center">
                <x-initials-avatar :name="Auth::user()->name" />
                <h2 class="text-lg font-semibold text-slate-900">{{ Auth::user()->name }}</h2>
                <p class="text-sm text-slate-500">{{ Auth::user()->email }}</p>
            </div>
        </x-card-body>

        <x-card-body class="mt-0">
            <nav class="space-y-2">
                <x-candidate.sidebar.navlink :route="route('profile.edit', $profile)">
                    <x-heroicon-o-pencil-square class="size-5" />
                    Edit Profile
                </x-candidate.sidebar.navlink>

                <x-candidate.sidebar.navlink :route="route('my-job-application.index')">
                    <x-heroicon-o-briefcase class="size-5" />
                    My Applications
                    @if ($applicationCount > 0)
                        <span
                            class="ml-auto rounded-full bg-violet-100 px-2.5 py-0.5 text-xs font-semibold text-violet-700">
                            {{ $applicationCount }}
                        </span>
                    @endif
                </x-candidate.sidebar.navlink>

                @if ($profile?->cv_path)
                    <x-candidate.sidebar.navlink :route="route('candidate.cv.download')">
                        <x-heroicon-o-document class="size-5" />
                        View CV
                    </x-candidate.sidebar.navlink>
                @endif
            </nav>
        </x-card-body>
    </x-card>
</div>
