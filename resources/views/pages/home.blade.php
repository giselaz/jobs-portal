        <x-layouts.landing>
            <x-hero-section>
                <x-search-bar class="mt-6" :action="route('jobs.index')" />
                <p class="mt-4 text-sm font-medium text-slate-500">Popular Search</p>
                <div class="mt-2 flex flex-wrap gap-2">
                    <x-tag variant="pill">UX/UI</x-tag>
                    <x-tag variant="pill">Web Development</x-tag>
                    <x-tag variant="pill">Human Resources</x-tag>
                </div>
            </x-hero-section>

            <section class="border-t border-slate-100 bg-white py-16">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <x-section-title title="Job Category"
                        subtitle="Get the most exciting jobs and grow your career fast with others" class="mb-10" />
                    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                        <x-category-card title="UX/UI Designer" :open-positions="50" :active="true">
                            <x-heroicon-o-photo class="h-6 w-6" />
                        </x-category-card>
                        <x-category-card title="Website Development" :open-positions="120">
                            <x-heroicon-o-code-bracket class="h-6 w-6" />
                        </x-category-card>
                        <x-category-card title="Digital Marketing" :open-positions="78">
                            <x-heroicon-o-chart-bar class="h-6 w-6" />
                        </x-category-card>
                    </div>
                </div>
            </section>

            <section class="border-t border-slate-100 bg-slate-50/30 py-16">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                        <x-section-title title="Popular Jobs"
                            subtitle="Check out featured jobs from top companies around the globe and apply now" />
                        <a href="{{ route('jobs.index') }}" class="shrink-0">
                            <x-button variant="primary">See More →</x-button>
                        </a>
                    </div>
                    <div class="mt-10 space-y-4">

                        @foreach ($popularJobs as $job)
                            <x-job-listing-card :title="$job->title" :location="$job->location" :applyUrl="route('job.application.create', $job)">
                                <div class="flex gap-2">
                                    <x-tag variant="pill">
                                        {{ Str::ucfirst($job->category) }}
                                    </x-tag>
                                    <x-tag variant="pill">
                                        {{ Str::ucfirst($job->experience) }}
                                    </x-tag>
                                </div>

                            </x-job-listing-card>
                        @endforeach
                    </div>
                </div>
            </section>

            <x-company-logo-group>
                <span class="text-lg font-semibold text-slate-400">afterpay</span>
                <span class="text-lg font-semibold text-slate-400">asana</span>
                <span class="text-lg font-semibold text-slate-400">slack</span>
                <span class="text-lg font-semibold text-slate-400">Dropbox</span>
            </x-company-logo-group>

            <section class="border-t border-slate-200 bg-violet-600 py-16">
                <div class="mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
                    <h2 class="text-2xl font-bold tracking-tight text-white sm:text-3xl">
                        Step To Your Future Start Here
                    </h2>
                </div>
            </section>
        </x-layouts.landing>
