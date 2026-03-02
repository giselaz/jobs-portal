<x-layouts.landing>
    <section class="border-t border-slate-100 bg-white py-10">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-section-title title="Browse Jobs" subtitle="Filter by keyword, salary, experience and category"
                class="mb-8" />
            <div class="mb-10 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <form x-ref="filtering-form" id="filtering-form" action="{{ route('jobs.index') }}" method="GET">
                    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                        <div>
                            <label class="mb-1.5 block text-sm font-semibold text-slate-700">Search</label> 
                            <x-text-input name="keyword" type="text" formRef="filtering-form"
                                value="{{ request('keyword') }}" placeholder="Job title or keyword" />
                        </div>
                        <div>
                            <label class="mb-1.5 block text-sm font-semibold text-slate-700">Salary</label>
                            <div class="flex gap-2">
                                <x-text-input name="min_salary" type="text" formRef="filtering-form"
                                    value="{{ request('min_salary') }}" placeholder="From" />
                                <x-text-input name="max_salary" type="text" formRef="filtering-form"
                                    value="{{ request('max_salary') }}" placeholder="To" />
                            </div>
                        </div>
                        <div>
                            <label class="mb-1.5 block text-sm font-semibold text-slate-700">Experience</label>
                            <x-radio-group name="experience" :value="request('experience')" :options="array_combine(
                                array_map('ucfirst', App\Models\JobPortal::$experience),
                                App\Models\JobPortal::$experience,
                            )" />
                        </div>
                        <div>
                            <label class="mb-1.5 block text-sm font-semibold text-slate-700">Category</label>
                            <x-radio-group name="category" :value="request('category')" :options="App\Models\JobPortal::$category" />
                        </div>
                    </div>
                    <div class="mt-6 flex justify-center">
                        <x-button type="submit" variant="primary" class="min-w-[120px]">Filter</x-button>
                    </div>
                </form>
            </div>
            <div class="space-y-4">
                @forelse ($jobs as $job)
                    <x-job-card :job="$job">
                        <a href="{{ route('jobs.show', $job) }}" class="shrink-0">
                            <x-button variant="primary">Check Job</x-button>
                        </a>
                    </x-job-card>
                @empty
                    <div class="rounded-xl border border-slate-200 bg-white p-12 text-center shadow-sm">
                        <p class="text-slate-600">No jobs match your filters.</p>
                        <a href="{{ route('jobs.index') }}" class="mt-4 inline-block">
                            <x-button variant="outline">Clear filters</x-button>
                        </a>
                    </div>
                @endforelse
            </div>

            @if ($jobs->hasPages())
                <div class="mt-10 flex justify-center">
                    {{ $jobs->links() }}
                </div>
            @endif
        </div>
    </section>
</x-layouts.landing>
