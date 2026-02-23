<x-layout>
    <x-card class="mb-4">
        <form action="{{ route('my-jobs.store') }}" method="POST">
            @csrf
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <x-label for="title" :required="true">Job Title</x-label>
                    <x-text-input name="title" type="text" />
                </div>
                <div>
                    <x-label for="location" :required="true">Location</x-label>
                    <x-text-input name="location" type="text" />
                </div>
                <div class="col-span-2">
                    <x-label for="salary" :required="true">Salary</x-label>
                    <x-text-input name="salary" type="number" min="0" />
                </div>
                <div class="col-span-2">
                    <x-label for="description" :required="true">Description</x-label>
                    <x-text-input name="description" type="textarea" />
                </div>
                <div>
                    <x-label for="Experience" :required="true" class="font-bold">Experience</x-label>
                    <x-radio-group name="experience" :allOption='false' :options="array_combine(
                        array_map('ucfirst', App\Models\JobPortal::$experience),
                        App\Models\JobPortal::$experience,
                    )" />
                </div>
                <div>
                    <x-label for="Category" :required="true" class="font-bold">Category</x-label>
                    <x-radio-group name="category" :allOption='false' :options="array_combine(
                        array_map('ucfirst', App\Models\JobPortal::$category),
                        App\Models\JobPortal::$category,
                    )" />
                </div>
                <div class="col-span-2 flex justify-center">
                  <x-button type="button" variant="primary"> Create </x-button>
                    
            </div>
        </form>
    </x-card>
</x-layout>
