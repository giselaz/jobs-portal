<x-layout>
    @foreach ($jobs as $job)
        <x-card class="mb-4">
            <div class="mb-4 flex justify-between">
                <h2 class="text-lg font-medium">{{ $job->title }}</h2>
                <div class="text-slate-500">
                    ${{ number_format($job->salary) }}
                </div>
            </div>
            <div class="mb-4 flex justify-between text-sm text-slate-500">
                <div class="flex space-x-4  items-center ">
                    <div>Company name</div>
                    <div>{{ $job->location }}</div>
                </div>
                <div class="flex space-x-1 text-xs items-center ">
                    <x-tag class=" bg-cyan-500 text-white ">{{ Str::ucfirst($job->experience) }}</x-tag>
                    <x-tag class="bg-indigo-500 text-white">{{ $job->category }}</x-tag>
                </div>
            </div>
            <p class=" text-sm text-slate-500 mb-4">
                {!! nl2br(e($job->description)) !!}
            </p>
            <div>
                <a href="{{route('jobs.show',$job)}}" class="">
                    Check Job
                </a>
            </div>
        </x-card>
        {{-- <div class="rounded-md border-slate-300 bg-white p-4 shadow-sm mb-4 ">
            
        </div> --}}
    @endforeach
</x-layout>
