<x-layouts.landing>
    <div class="min-h-[80vh] px-4 py-12">
        <div class="mx-auto max-w-6xl">
            <x-ui.section-title title="My Profile" subtitle="Manage your profile and view your applications"
                class="mb-8 text-left" />
            <div class="grid gap-8 lg:grid-cols-4" x-data="{ activeTab: 'profile' }"> 
                <!-- Sidebar -->
                <x-candidate.sidebar :profile="$profile" :applicationCount="$applicationCount" />

                <!-- Main Content -->
                <div class="lg:col-span-3">
                    @if ($profile)
                        <!-- Profile Info Card -->
                        <x-candidate.partials.profile :profile="$profile" t  x-show="activeTab === 'profile'" x-transition />

                        <!-- Experience Section -->
                        @if ($experienceCount > 0)
                            <x-candidate.partials.experience :profile="$profile" :$experienceCount x-show="activeTab === 'experience'"
                                x-transition />
                        @endif

                        <!-- Education Section --> 
                        @if ($educationCount > 0)
                            <x-candidate.partials.education :profile="$profile" :$educationCount  x-show="activeTab === 'education'"
                                x-transition />
                        @endif

                        <!-- Languages Section -->
                        @if ($languageCount > 0)
                            <x-candidate.partials.language :profile="$profile" :$languageCount x-show="activeTab === 'language'"
                                x-transition />
                        @endif

                        <!-- Skills Section -->
                        @if ($skillsCount > 0)
                            <x-candidate.partials.skill :profile="$profile" :$skillsCount x-show="activeTab === 'skills'"
                                x-transition />
                        @endif

                        <!-- Recent Applications -->
                        @if ($recentApplications->count() > 0)
                            <x-candidate.partials.recent-applications :$recentApplications
                                x-show="activeTab === 'applications'" x-transition />
                        @endif
                    @else
                        <!-- Empty State -->
                        <div class="rounded-2xl border border-slate-200 bg-white p-8 text-center shadow-sm">
                            <x-heroicon-o-user class="mx-auto size-12 text-slate-400" />
                            <h3 class="mt-4 text-lg font-semibold text-slate-900">No Profile Yet</h3>
                            <p class="mt-2 text-slate-600">Complete your profile to help employers find you</p>
                            <a href="{{ route('candidate.profile.edit') }}" class="mt-6 inline-block">
                                <x-ui.button type="button" variant="primary">
                                    Complete Profile
                                </x-ui.button>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layouts.landing>
