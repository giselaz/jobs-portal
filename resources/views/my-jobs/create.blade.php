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
                    <x-label for="title" :required="true">Location</x-label>
                    <x-text-input name="title" type="text" />
                </div>
                <div class="col-span-2">
                    <x-label for="description" :required="true">Description</x-label>
                    <x-text-input name="description" type="textarea" />
                </div>
                <div class="col-span-2">
                    <x-label for="salary" :required="true">Salary</x-label>
                    <x-text-input name="salary" type="number" min="0" />
                </div>
            </div>
        </form>
    </x-card>
</x-layout>
