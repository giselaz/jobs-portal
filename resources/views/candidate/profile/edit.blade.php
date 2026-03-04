<x-layouts.landing>
    <section class="min-h-[80vh] px-4 py-12">
        <div class="mx-auto max-w-4xl">

            <x-section-title title="Edit Your Profile"
                subtitle="Update your profile information to help employers find you" class="mb-8 text-left"/>
            <form action="{{ route('profile.update', $profile) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Personal Information Section -->
                <div class="mb-8 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                    <h2 class="mb-6 text-xl font-semibold text-slate-900">Personal Information</h2>

                    <div class="grid gap-6 sm:grid-cols-2">
                        <div>
                            <x-label for="phone" :required="false">Phone Number</x-label>
                            <x-text-input type="text" name="phone" value="{{ old('phone', $profile?->phone) }}"
                                placeholder="+1 234 567 8900" class="mt-1.5" />
                        </div>

                        <div>
                            <x-label for="location" :required="false">Location</x-label>
                            <x-text-input type="text" name="location"
                                value="{{ old('location', $profile?->location) }}" placeholder="New York, USA"
                                class="mt-1.5" />
                        </div>
                    </div>
                </div>

                <!-- Professional Information Section -->
                <div class="mb-8 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                    <h2 class="mb-6 text-xl font-semibold text-slate-900">Professional Information</h2>

                    <div class="grid gap-6 sm:grid-cols-2">
                        <div>
                            <x-label for="job_title" :required="true">Job Title</x-label>
                            <x-text-input type="text" name="job_title"
                                value="{{ old('job_title', $profile?->job_title) }}" placeholder="Software Engineer"
                                class="mt-1.5" />
                        </div>

                        <div>
                            <x-label for="years_of_experience" :required="false">Years of Experience</x-label>
                            <x-text-input type="number" name="years_of_experience"
                                value="{{ old('years_of_experience', $profile?->years_of_experience) }}" placeholder="5"
                                min="0" class="mt-1.5" />
                        </div>

                        <div>
                            <x-label for="expected_salary" :required="false">Expected Salary</x-label>
                            <div class="mt-1.5 flex gap-2">
                                <x-text-input type="number" name="expected_salary"
                                    value="{{ old('expected_salary', $profile?->expected_salary) }}" placeholder="50000"
                                    min="0" class="flex-1" />
                                <select name="salary_currency"
                                    class="w-24 rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 ring-slate-300 focus:ring-violet-600">
                                    <option value="USD"
                                        {{ old('salary_currency', $profile?->salary_currency ?? 'USD') === 'USD' ? 'selected' : '' }}>
                                        USD</option>
                                    <option value="EUR"
                                        {{ old('salary_currency', $profile?->salary_currency) === 'EUR' ? 'selected' : '' }}>
                                        EUR</option>
                                    <option value="GBP"
                                        {{ old('salary_currency', $profile?->salary_currency) === 'GBP' ? 'selected' : '' }}>
                                        GBP</option>
                                    <option value="INR"
                                        {{ old('salary_currency', $profile?->salary_currency) === 'INR' ? 'selected' : '' }}>
                                        INR</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <x-label for="cv_path" :required="false">Upload CV</x-label>
                            <input type="file" name="cv_path" id="cv_path" accept=".pdf,.doc,.docx"
                                class="mt-1.5 block w-full text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-md file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-violet-50 file:text-violet-700
                                    hover:file:bg-violet-100
                                " />
                            @if ($profile?->cv_path)
                                <p class="mt-2 text-xs text-slate-500">Current CV: {{ basename($profile->cv_path) }}
                                </p>
                            @endif
                        </div>
                    </div>

                    <div class="mt-6">
                        <x-label for="bio" :required="false">Bio / Summary</x-label>
                        <x-text-input type="textarea" name="bio" value="{{ old('bio', $profile?->bio) }}"
                            placeholder="Tell us about yourself, your skills, and experience..."
                            class="mt-1.5 min-h-[150px]" />
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-end gap-4">
                    <x-button type="button" variant="outline" href="{{ route('profile.show', $profile) }}">
                        Cancel
                    </x-button>
                    <x-button type="submit" variant="primary">
                        Save Profile
                    </x-button>
                </div>
            </form>
        </div>
    </section>
</x-layouts.landing>
