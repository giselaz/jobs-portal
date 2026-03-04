<x-layouts.landing>
    <section class="border-t border-slate-100 bg-white py-10">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <!-- Employer Header -->
            <x-employer-header :employer="$employer" />

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
                    <x-empty-collection title="No jobs available" subtitle="This company hasn't posted any jobs yet" />
                @endforelse
            </div>
        </div>
    </section>
</x-layouts.landing>
