@props(['profile', 'applicationCount'])
<div class="lg:col-span-1" {{ $attributes }}>
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
            <nav class="space-y-2" x-data="{ activeTab: 'experience' }">
                <x-candidate.sidebar.navlink :route="route('profile.edit', $profile)" type="link">
                    <x-heroicon-o-pencil-square class="size-5" />
                    Edit Profile
                </x-candidate.sidebar.navlink>

                <x-candidate.sidebar.navlink :route="route('my-job-application.index')" type="button" tab="applications">
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
                    <x-candidate.sidebar.navlink :route="route('candidate.cv.download')" type="link">
                        <x-heroicon-o-document class="size-5" />
                        View CV
                    </x-candidate.sidebar.navlink>
                @else
                    <x-candidate.sidebar.navlink :route="route('candidate.cv.uploadCv', $profile)" type="link">
                        <x-heroicon-o-arrow-up-tray class="size-5" />
                        Upload CV
                    </x-candidate.sidebar.navlink>
                @endif
                <x-candidate.sidebar.navlink type="button" tab="education">
                    <x-heroicon-o-academic-cap class="size-5" />
                    Educations
                </x-candidate.sidebar.navlink>
                <x-candidate.sidebar.navlink type="button" tab="experience">
                    <x-heroicon-o-briefcase class="size-5" />
                    Experiences
                </x-candidate.sidebar.navlink>
                <x-candidate.sidebar.navlink type="button" tab="language">
                    <x-heroicon-o-globe-alt class="size-5" />
                    Languages
                </x-candidate.sidebar.navlink>

                <x-candidate.sidebar.navlink type="button" tab="skills">
                    <x-heroicon-o-sparkles class="size-5" />
                    Skills
                </x-candidate.sidebar.navlink>

                <x-candidate.sidebar.navlink type="button" tab="applications">
                    <x-heroicon-o-clipboard-document-list class="size-5" />
                    Applications
                    @if ($applicationCount > 0)
                        <span
                            class="ml-auto rounded-full bg-violet-100 px-2.5 py-0.5 text-xs font-semibold text-violet-700">
                            {{ $applicationCount }}
                        </span>
                    @endif
                </x-candidate.sidebar.navlink>
            </nav>
        </x-card-body>
    </x-card>
</div>
