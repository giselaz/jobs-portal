<x-layouts.landing>
    <section class="border-t border-slate-100 bg-white py-10">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            @php
                $initials = strtoupper(mb_substr($employer->company_name, 0, 2));
                $jobCount = $employer->jobPortals()->count();
            @endphp

            <!-- Employer Header -->
            <div class="mb-10 rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
                <div class="flex flex-wrap items-center gap-4 md:flex-nowrap">
                    <div
                        class="flex h-16 w-16 shrink-0 items-center justify-center rounded-full bg-violet-100 text-xl font-semibold text-violet-700">
                        {{ $initials }}
                    </div>
                    <div class="min-w-0 flex-1">
                        <h1 class="text-2xl font-bold text-slate-900">{{ $employer->company_name }}</h1>
                        <p class="text-sm text-slate-500">{{ $jobCount }} {{ Str::plural('job', $jobCount) }} posted
                        </p>
                        @if ($employer->description)
                            <p class="mt-2 text-slate-600">{{ $employer->description }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Jobs Section -->
            <x-section-title title="Jobs at {{ $employer->company_name }}" subtitle="Browse available positions"
                class="mb-8" />

            <div class="space-y-4">
                @forelse ($employer->jobPortals as $job)
                    <x-job-card :job="$job">
                        <a href="{{ route('jobs.show', $job) }}" class="shrink-0">
                            <x-button variant="primary">View Job</x-button>
                        </a>
                    </x-job-card>
                @empty
                    <div class="rounded-xl border border-slate-200 bg-white p-12 text-center shadow-sm">
                        <p class="text-slate-600">No jobs available at this company yet.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</x-layouts.landing>
