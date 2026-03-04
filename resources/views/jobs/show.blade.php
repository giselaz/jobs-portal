<x-layouts.landing>
    <section class="border-t border-slate-100 bg-slate-50/30 py-10">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <a href="{{ route('jobs.index') }}"
                class="mb-6 inline-flex items-center gap-1.5 text-sm font-medium text-slate-600 hover:text-violet-600 transition">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Back to jobs
            </a>

            <div class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden">
                <div class="border-b border-slate-100 bg-white p-6 sm:p-8">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                        <div class="flex gap-4">
                            <x-initials-avatar :name="$job->employer->company_name" size="lg" />
                            <div>
                                <h1 class="text-xl font-bold tracking-tight text-slate-900 sm:text-2xl">
                                    {{ $job->title }}</h1>
                                <p class="mt-1 text-slate-600">{{ $job->employer->company_name }}</p>
                                <p class="text-sm text-slate-500">{{ $job->location }}</p>
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-2 sm:shrink-0">
                            <x-tag variant="pill">{{ Str::ucfirst($job->experience) }}</x-tag>
                            <x-tag variant="pill">{{ $job->category }}</x-tag>
                        </div>
                    </div>
                    <p class="mt-4 text-lg font-semibold text-violet-600">${{ number_format($job->salary) }}</p>
                </div>

                <div class="border-t border-slate-100 bg-white p-6 sm:p-8">
                    <h2 class="mb-3 text-sm font-semibold uppercase tracking-wide text-slate-500">Description</h2>
                    <div class="prose prose-slate max-w-none text-slate-600 text-sm leading-relaxed">
                        {!! nl2br(e($job->description)) !!}
                    </div>

                    @auth
                        @can('apply', $job)
                            <a href="{{ route('job.application.create', ['job' => $job]) }}" class="mt-8 inline-block">
                                <x-button variant="primary">Apply for this job</x-button>
                            </a>
                        @else
                            <x-messages.warning class="mt-8" message="You have already applied to this job." />
                        @endcan
                    @else
                        <a href="{{ route('job.application.create', ['job' => $job]) }}" class="mt-8 inline-block">
                            <x-button variant="primary">Apply for this job</x-button>
                        </a>
                    @endauth


                </div>
            </div>

            @php
                $otherJobs = $job->employer->jobPortals->where('id', '!=', $job->id);
            @endphp
            @if ($otherJobs->isNotEmpty())
                <div class="mt-10">
                    <x-section-title title="More jobs at {{ $job->employer->company_name }}" class="mb-6 text-left" />
                    <div class="space-y-3">
                        @foreach ($otherJobs as $otherJob)
                            <a href="{{ route('jobs.show', ['job' => $otherJob]) }}"
                                class="block rounded-xl border border-slate-200 bg-white p-4 shadow-sm transition hover:border-violet-200 hover:shadow md:flex md:items-center md:justify-between md:gap-4">
                                <div>
                                    <h3 class="font-semibold text-slate-900 hover:text-violet-600 transition">
                                        {{ $otherJob->title }}</h3>
                                    <p class="text-sm text-slate-500">{{ $otherJob->created_at->diffForHumans() }} ·
                                        ${{ number_format($otherJob->salary) }}</p>
                                </div>
                                <span class="mt-2 flex items-center text-sm font-medium text-violet-600 md:mt-0">
                                    View job
                                    <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </span>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
</x-layouts.landing>
