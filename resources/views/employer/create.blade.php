<x-layout>
    <x-card>
        <form action="{{ route('employer.store') }}" method="POST">
            @csrf
            <x-card-body class="mt-0">
                <div class="mb-4">
                    <x-label for="company_name" :required="true">
                        Company Name
                    </x-label>
                    <x-text-input name="company_name" required type="text" class=" w-100" />
                </div>
            </x-card-body>
            <x-card-body class="mt-0">
                <x-button>Create</x-button>
            </x-card-body>
        </form>
    </x-card>


</x-layout>
