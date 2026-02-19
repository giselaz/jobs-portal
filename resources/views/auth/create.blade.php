<x-layout>
    <h1 class="text-slate-600 font-medium py-16 text-center text-4xl">Sign in to your account</h1>
    <x-card>
        <form action="{{ route('auth.store') }}" method="POST">
            @csrf
            <div class="mb-8">
                <x-label for="email" :required="true">E-mail</x-label>
                <x-text-input type="email" name="email" />
            </div>
            <div class="mb-8">
                <x-label for="password" :required="true">Password</x-label>
                <x-text-input type="password" name="password" />
            </div>
            <div class="mb-8 flex justify-between items-center text-sm font-medium">
                <div>
                    <div class="flex  items-center   gap-2">
                        <input type="checkbox" name="remember" class="rounded-sm border border-slate-400 text-2xl" />
                        <label for="rembemer">Remember Me</label>
                    </div>
                </div>
                <div>
                    <a href="#" class=" text-indigo-600 hover:underline">Forgot Password</a>
                </div>
            </div>
            <div class="flex w-full justify-center">
                <x-button class="w-full p-10">Login</x-button>
            </div>
            @if (session('error'))
                <div class="text-red-500">
                    {{ session('error') }}
                </div>
            @endif

        </form>
    </x-card>
</x-layout>
