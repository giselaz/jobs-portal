<x-layout>
    <x-job-card :job="$job" class="mb-5">
        <p class=" text-sm text-slate-500 mb-4">
            {!! nl2br(e($job->description)) !!}
        </p>
    </x-job-card>
    <x-card class="mb-4">
        <h2 class="font-medium text-lg mb-5">
            More {{ $job->employer->company_name }} Jobs
        </h2>
        <div class="text-sm text-slate-500">
            @foreach ($job->employer->jobPortals as $otherJob)
                <div class="flex justify-between mb-4">
                    <div class="text-slate-700">
                        <a class=" hover:text-cyan-500" href="{{ route('jobs.show', ['job' => $otherJob]) }}">
                            {{ $otherJob->title }}
                        </a>
                        <p>
                            {{ $otherJob->created_at->diffForHumans() }}
                        </p>
                    </div>
                    <div class="text-xs">${{ number_format($otherJob->salary) }}</div>
                </div>
            @endforeach
        </div>

    </x-card>
</x-layout>
