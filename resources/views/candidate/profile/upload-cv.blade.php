<x-container>
    <x-section-title title="Complete Profile" subtitle="Upload Cv to autofill" class="text-left" />

    <!-- Back Link -->
    <div class="mb-4">
        href="{{ route('candidate.profile.show', $profile) }}
            <x-heroicon-o-arrow-left class="mr-2 size-4" />
        Back to Profile
        </x-link-button>
    </div>
    <!-- Profile Data Summary -->
    @if ($profile)
        <!-- Education Section -->
        @if ($profile->educations->count() > 0)
            <x-card class="mb-6 border">
                <x-card-header>
                    <h3 class="text-lg font-semibold text-slate-900">Education</h3>
                </x-card-header>
                <x-card-body>
                    <div class="space-y-4">
                        @foreach ($profile->educations as $education)
                            <x-candidate.profile-item type="education" :item="$education" />
                        @endforeach
                    </div>
                </x-card-body>
            </x-card>
        @endif

        <!-- Experience Section -->
        @if ($profile->experiences->count() > 0)
            <x-card class="mb-6 border">
                <x-card-header>
                    <h3 class="text-lg font-semibold text-slate-900">Experience</h3>
                </x-card-header>
                <x-card-body>
                    <div class="space-y-4">
                        @foreach ($profile->experiences as $experience)
                            <x-candidate.profile-item type="experience" :item="$experience" />
                        @endforeach
                    </div>
                </x-card-body>
            </x-card>
        @endif

        <!-- Languages Section -->
        @if ($profile->languages->count() > 0)
            <x-card class="mb-6 border">
                <x-card-header>
                    <h3 class="text-lg font-semibold text-slate-900">Languages</h3>
                </x-card-header>
                <x-card-body>
                    <div class="space-y-4">
                        @foreach ($profile->languages as $language)
                            <x-candidate.profile-item type="language" :item="$language" />
                        @endforeach
                    </div>
                </x-card-body>
            </x-card>
        @endif

        <!-- Skills Section -->
        @if ($profile->skills->count() > 0)
            <x-card class="mb-6 border">
                <x-card-header>
                    <h3 class="text-lg font-semibold text-slate-900">Skills</h3>
                </x-card-header>
                <x-card-body>
                    <div class="space-y-4">
                        @foreach ($profile->skills as $skill)
                            <x-candidate.profile-item type="skill" :item="$skill" />
                        @endforeach
                    </div>
                </x-card-body>
            </x-card>
        @endif
    @endif

    <!-- Upload Form -->
    action="{{ route('candidate.profile.cv.upload') }}
        @csrf
        <x-card class="border mt-6">
    <x-label for="cv_path" :required="false">Upload CV</x-label>
    <x-file-input name="cv_path" />
    <div class="mt-4">
        <x-button type="submit" variant="primary" :disabled="isset($processing) && $processing">
            {{ isset($processing) && $processing ? 'Processing...' : 'Upload' }}
        </x-button>
    </div>
    </x-card>

    </form>
</x-container>
