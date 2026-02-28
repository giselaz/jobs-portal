<x-layouts.landing>
    <section class="border-t border-slate-100 bg-slate-50/30 py-10">
        <div class="mx-auto max-w-4xl py-4">
            <a href="{{ route('my-jobs.index') }}"
                class="mb-6 inline-flex items-center gap-1.5 text-sm font-medium text-slate-600 hover:text-violet-600 transition">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Back to Jobs
            </a>
        </div>

        <div
            class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">

            <form action="{{ route('my-jobs.store') }}" method="POST">
                <h2 class="mb-6 text-xl font-bold tracking-tight text-slate-900">New Job</h2>
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
                        <x-button type="submit" variant="primary"> Create </x-button>
                    </div>
            </form>
        </div>
    </section>
</x-layouts.landing>
