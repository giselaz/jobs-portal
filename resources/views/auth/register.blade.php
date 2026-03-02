<x-layout>
    <section class="flex min-h-[60vh] items-center justify-center px-4 py-16">
        <div class="w-full max-w-md">
            <div class="mb-8 text-center">
                <h1 class="text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">Create Your Account</h1>
                <p class="mt-2 text-sm text-slate-600">Enter your details to get started</p>
            </div>
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    {{-- Name --}}
                    <div class="mb-6">
                        <x-label for="name" :required="true">Full Name</x-label>
                        <x-text-input type="text" name="name" id="name" value="{{ old('name') }}" required
                            class="mt-1.5" />
                    </div>

                    {{-- Email --}}
                    <div class="mb-6">
                        <x-label for="email" :required="true">Email Address</x-label>
                        <x-text-input type="email" name="email" value="{{ old('email') }}"
                            placeholder="you@example.com" class="mt-1.5" />
                    </div>

                    {{-- Role Selector --}}
                    <x-auth.role-selector :value="old('role')" />

                    {{-- Password --}}
                    <div class="mb-6 mt-4">
                        <x-label for="password" :required="true">Password</x-label>
                        <x-text-input type="password" name="password" id="password" required class="mt-1.5" />
                    </div>

                    {{-- Confirm Password --}}
                    <div class="mb-6">
                        <x-label for="password_confirmation" :required="true">Confirm Password</x-label>
                        <x-text-input type="password" name="password_confirmation" id="password_confirmation" required
                            class="mt-1.5" />
                    </div>

                    {{-- Submit Button --}}
                    <x-button type="submit" variant="primary" class="w-full py-3">
                        Create Account
                    </x-button>
                </form>
            </div>
            <p class="mt-6 text-center text-sm text-slate-600">
                Already have an account?
                <a href="{{ route('auth.create') }}"
                    class="font-medium text-violet-600 hover:text-violet-700 transition">Sign in</a>
            </p>
        </div>
    </section>
</x-layout>
