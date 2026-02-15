<x-layout>
    <x-job-card :job="$job" class="mb-4" />
    <x-card class="">
        <h2 class=" font-bold text-slate-900">Your Job Application</b></h2>
        <form action="{{ route('job.application.store', $job) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="expected_salary" class="mb-2 block text-sm font-medium text-slate-900 ">Expected
                    Salary</label>
                <x-text-input name="expected_salary"  required type="number" class=" w-100" min="0" />
            </div>
            <x-button>Submit Application</x-button>
        </form>
    </x-card>
</x-layout>
