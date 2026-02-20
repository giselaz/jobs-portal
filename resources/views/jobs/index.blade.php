<x-layout>
    <x-card class="mb-4 text-sm " x-data=''>
        <form x-ref="filters" id="filtering-form" action="{{ route('jobs.index') }}" method="GET">
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <div class="mb-1 font-semibold">
                        Search
                    </div>
                    <x-text-input name='search' type="text" formRef="filters" value="{{ request('search') }}"
                        placeholder="Search for any text" />
                </div>
                <div>
                    <div class="mb-1 font-semibold">
                        Salary
                    </div>
                    <div class="flex space-x-2">
                        <x-text-input name='min_salary' type="text" formRef="filters"
                            value="{{ request('min_salary') }}" placeholder="From" />
                        <x-text-input name='max_salary' type="text" formRef="filters"
                            value="{{ request('max_salary') }}" placeholder="To" />
                    </div>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Experience</div>
                    <x-radio-group name="experience" :options="array_combine(
                        array_map('ucfirst', App\Models\JobPortal::$experience),
                        App\Models\JobPortal::$experience,
                    )" />
                </div>
                <div>
                    <div class="mb-1 font-semibold">Categories</div>
                    <x-radio-group name="category" :options="App\Models\JobPortal::$category" />
                </div>
            </div>
            <div class="flex justify-center">
                <x-button class=" p-3 cursor-pointer font-semibold ">Filter</x-button>
            </div>

        </form>
 
    </x-card>
    @foreach ($jobs as $job)
        <x-job-card class="mb-4" :job="$job">
            <div>
                <x-link-button :href="route('jobs.show', $job)">
                    Check Job
                </x-link-button>
            </div>
        </x-job-card>
    @endforeach
    <div class="text-white">
        {{ $jobs->links() }}

    </div>
</x-layout>
