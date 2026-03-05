<x-layout>
    <x-card class="mb-4">
        <form action="{{ route('my-jobs.update', ['my_job' => $job]) }}" method="POST">
            @csrf
            @method('PATCH')
            <x-card-body class="mt-0">
                <div class="mb-4 grid grid-cols-2 gap-4">
                    <div>
                        <x-label for="title" :required="true">Job Title</x-label>
                        <x-text-input name="title" type="text" value="{{ $job->title }}" />
                    </div>
                    <div>
                        <x-label for="location" :required="true">Location</x-label>
                        <x-text-input name="location" type="text" value="{{ $job->location }}" />
                    </div>
                    <div class="col-span-2">
                        <x-label for="salary" :required="true">Salary</x-label>
                        <x-text-input name="salary" type="number" min="0" value="{{ $job->salary }}" />
                    </div>
                    <div class="col-span-2">
                        <x-label for="description" :required="true">Description</x-label>
                        <x-text-input name="description" type="textarea" value="{{ $job->description }}" />
                    </div>
                    <div>
                        <x-label for="Experience" :required="true" class="font-bold">Experience</x-label>
                        <x-radio-group name="experience" :allOption='false' :value="$job->experience" :options="array_combine(
                            array_map('ucfirst', App\Models\JobPortal::$experience),
                            App\Models\JobPortal::$experience,
                        )" />
                    </div>
                    <div>
                        <x-label for="Category" :required="true" class="font-bold">Category</x-label>
                        <x-radio-group name="category" :value="$job->category" :allOption='false' :options="array_combine(
                            array_map('ucfirst', App\Models\JobPortal::$category),
                            App\Models\JobPortal::$category,
                        )"
                            checked="{{ $job->category }}" />
                    </div>
                </div>
            </x-card-body>
            <x-card-body class="mt-0">
                <div class="col-span-2 flex justify-center">
                    <x-button>Update</x-button>
                </div>
            </x-card-body>
        </form>
    </x-card>
</x-layout>
