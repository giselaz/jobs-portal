<x-layouts.landing>
    <section class="border-t border-slate-100 bg-slate-50/30 py-10">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <x-section-title title="My Jobs" subtitle="Track your job and their status" class="mb-8" />
            <div class="w-full flex mb-8 justify-end">
                <x-button href="{{ route('my-jobs.create') }}" variant="outline"> + Add New Job</x-button>
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
                            <x-link-button href="{{ route('my-jobs.edit', ['my_job' => $job]) }}"
                                variant="primary">Edit</x-link-button>
                            <form action="{{ route('my-jobs.destroy', ['my_job' => $job]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-button class="danger-button">
                                    Delete
                                </x-button>
                            </form>
                        </div>
                    </div>
                </x-job-card>

            @empty
                <x-empty-collection title="No jobs yet" subtitle="go create some jobs" :url="route('my-jobs.create')" />
            @endforelse
        </div>
    </section>
</x-layouts.landing>
