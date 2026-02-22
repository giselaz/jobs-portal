<x-layout>
    <div class="w-full flex mb-8 justify-end">
        <x-link-button href="{{ route('my-jobs.create') }}"> + Add New Job</x-link-button>
    </div>
    @forelse ($jobs as $job)
        <x-job-card :job="$job">
            <p>{{ $job->description }}</p>
            <div class="text-xs text-slate-500">
                @forelse ($job->jobApplications as $application)
                    <div class="mb-4 flex items-center justify-between">
                        <div>
                            <div>{{ $application->user->name }}</div>
                            <div>Applied {{ $application->created_at->diffForHumans() }}</div>
                            <div>Download CV</div>
                        </div>
                        <div>
                            ${{ number_format($application->expected_salary) }}
                        </div>
                    </div>
                @empty
                    <div>No applications yet</div>
                @endforelse
                <div class="flex space-x-2">
                    <x-link-button href="{{ route('my-jobs.edit', ['my_job' => $job]) }}">Edit</x-link-button>
                </div>
            </div>
        </x-job-card>

    @empty
        <x-empty-collection title="No jobs yet" subtitle="go create some jobs" :url="route('my-jobs.create')" />
    @endforelse
</x-layout>
