<x-layout class="mb-4">
    @forelse ($applications as $jobApplication)
        <x-job-card :job="$jobApplication->jobPortal" class="mb-4 ">
            <div class="flex items-end justify-between text-slate-500 text-sm">
                <div>
                    <p>Applied: {{ $jobApplication->created_at->diffForHumans() }}</p>
                    <p>Expected Salary: ${{ $jobApplication->expected_salary }}</p>
                    <p> Other {{ Str::plural('applicant', $jobApplication->jobPortal->job_applications_count - 1) }}:
                        {{ $jobApplication->jobPortal->job_applications_count - 1 }}
                    </p>
                    <p> Average Salary Expectency:
                        ${{ number_format($jobApplication->jobPortal->job_applications_avg_expected_salary) }}</p>
                </div>
                <div>
                    <form action="{{ route('my-job-application.destroy', ['my_job_application' => $jobApplication]) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <x-button class="danger-button">
                            Cancel Application
                        </x-button>
                    </form>

                </div>
            </div>
            @if ($jobApplication->cv_path !== null)
                <div class="mt-4">
                    <iframe src="{{ route('cv.view', $jobApplication) }}" frameborder="0"></iframe>
                    <a href="{{ route('cv.view', $jobApplication) }}" target="_blank" class="font-bold">
                        View CV
                    </a>

                </div>
            @endif

        </x-job-card>
    @empty
        <div class="rounded-md border border-dashed border-slate-300 p-8 ">
            <div class="text-center font-medium">
                No job application yet
            </div>
            <div class="text-center">
                Go find some jobs <a href="{{ route('jobs.index') }}" class=" text-cyan-500 hover:underline">here</a>
            </div>
        </div>
    @endforelse

</x-layout>
