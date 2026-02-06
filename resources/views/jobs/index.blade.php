<x-layout>
    @foreach ($jobs as $job)
    <x-job-card class="mb-4">
        <div>
            <x-link-button :href="route('jobs.show', $job)">
                Check Job
            </x-link-button>
        </div>
    </x-job-card>
    {{-- <div class="rounded-md border-slate-300 bg-white p-4 shadow-sm mb-4 ">

    </div> --}}
    @endforeach
</x-layout>