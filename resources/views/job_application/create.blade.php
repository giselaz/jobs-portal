<x-layout>
    <x-job-card :job="$job" class="mb-4" />
    <x-card class="">
        <h2 class=" font-bold text-slate-900">Your Job Application</b></h2>
        <form action="{{ route('job.application.store', $job) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <x-label for="expected_salary" :required="true">Expected
                    Salary</x-label>
                <x-text-input name="expected_salary" required type="number" class=" w-100" min="0" />
            </div>
            <div class="mb-4">
                <x-label for="cv" :required="true">CV</x-label>
                <x-text-input name="cv" required type="file" class=" w-100" />
            </div>
            <x-button class="cursor-pointer">Submit Application</x-button>
        </form>
    </x-card>
</x-layout>
