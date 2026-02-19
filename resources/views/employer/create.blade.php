<x-layout>
    <x-card>
        <form action="{{ route('employer.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <x-label for="company_name" :required="true">
                    Company Name
                </x-label>
                <x-text-input name="company_name" required type="text" class=" w-100" />
            </div>
            <x-button>Create</x-button>
        </form>
    </x-card>


</x-layout>
