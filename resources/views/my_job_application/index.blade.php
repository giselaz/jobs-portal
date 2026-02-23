<x-layouts.landing>
    <section class="border-t border-slate-100 bg-slate-50/30 py-10">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <x-section-title
                title="My applications"
                subtitle="Track your job applications and their status"
                class="mb-8"
            />

            @forelse ($applications as $jobApplication)
                @php
                    $job = $jobApplication->jobPortal;
                    $initials = strtoupper(mb_substr($job->employer->company_name, 0, 2));
                @endphp
                <article class="mb-6 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                    <div class="border-b border-slate-100 p-4 sm:p-6">
                        <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                            <div class="flex gap-4">
                                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-violet-100 text-sm font-semibold text-violet-700">
                                    {{ $initials }}
                                </div>
                                <div class="min-w-0 flex-1">
                                    <h2 class="font-semibold text-slate-900">
                                        <a href="{{ route('jobs.show', $job) }}" class="hover:text-violet-600 transition">{{ $job->title }}</a>
                                    </h2>
                                    <p class="text-sm text-slate-500">{{ $job->employer->company_name }} · {{ $job->location }}</p>
                                    <p class="mt-1 text-sm font-medium text-violet-600">${{ number_format($job->salary) }}</p>
                                    <div class="mt-2 flex flex-wrap gap-2">
                                        <x-tag variant="pill">{{ Str::ucfirst($job->experience) }}</x-tag>
                                        <x-tag variant="pill">{{ $job->category }}</x-tag>
                                    </div>
                                </div>
                            </div>
                            <div class="flex shrink-0 flex-wrap items-center gap-3 sm:flex-nowrap">
                                <a href="{{ route('jobs.show', $job) }}" class="inline-block">
                                    <x-button variant="outline">View job</x-button>
                                </a>
                                <form action="{{ route('my-job-application.destroy', ['my_job_application' => $jobApplication]) }}" method="POST" onsubmit="return confirm('Cancel this application?');">
                                    @csrf
                                    @method('DELETE')
                                    <x-button type="submit" class="border-red-200! text-red-600! hover:bg-red-50! hover:border-red-300!">Cancel application</x-button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="grid gap-4 border-b border-slate-100 bg-slate-50/50 px-4 py-4 sm:grid-cols-2 sm:px-6 lg:grid-cols-4">
                        <div>
                            <p class="text-xs font-medium uppercase tracking-wide text-slate-500">Applied</p>
                            <p class="mt-0.5 text-sm font-medium text-slate-800">{{ $jobApplication->created_at->diffForHumans() }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-medium uppercase tracking-wide text-slate-500">Your expected salary</p>
                            <p class="mt-0.5 text-sm font-medium text-slate-800">${{ number_format($jobApplication->expected_salary) }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-medium uppercase tracking-wide text-slate-500">Other applicants</p>
                            <p class="mt-0.5 text-sm font-medium text-slate-800">{{ $job->job_applications_count - 1 }} {{ Str::plural('applicant', $job->job_applications_count - 1) }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-medium uppercase tracking-wide text-slate-500">Avg. expected salary</p>
                            <p class="mt-0.5 text-sm font-medium text-slate-800">${{ number_format($job->job_applications_avg_expected_salary ?? 0) }}</p>
                        </div>
                    </div>

                    @if ($jobApplication->cv_path !== null)
                        <div class="p-4 sm:p-6">
                            <p class="mb-2 text-xs font-medium uppercase tracking-wide text-slate-500">Your CV</p>
                            <a href="{{ route('cv.view', $jobApplication) }}" target="_blank" rel="noopener noreferrer"
                                class="inline-flex items-center gap-1.5 text-sm font-medium text-violet-600 hover:text-violet-700 transition">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                </svg>
                                View CV in new tab
                            </a>
                            <div class="mt-3 h-64 overflow-hidden rounded-lg border border-slate-200 bg-white">
                                <iframe src="{{ route('cv.view', $jobApplication) }}" title="Your CV" class="h-full w-full"></iframe>
                            </div>
                        </div>
                    @endif
                </article>
            @empty
                <x-empty-collection title="No job applications yet" subtitle="Browse jobs and apply" :url="route('jobs.index')" />
            @endforelse
        </div>
    </section>
</x-layouts.landing>
