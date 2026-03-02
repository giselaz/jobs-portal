<x-layouts-landing>
    <section class="border-t border-slate-100 bg-white py-10">
        <div class="max-w-md mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
            <h2 class="text-2xl font-semibold mb-6 text-center">Create Your Account</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- Name --}}
                <div class="mb-4">
                    <x-label for="name">Full Name</x-label>
                    <x-text-input type="text" name="name" id="name" value="{{ old('name') }}" required>
                </div>

                {{-- Email --}}
                <div class="mb-4">
                    <x-label for="email">Email Address</x-label>
                    <x-text-input type="email" name="email" id="email" value="{{ old('email') }}"required>
                </div>

                {{-- Role Selector --}}
                <x-auth.role-selector :value="old('role')" />

                {{-- Password --}}
                <div class="mb-4 mt-4">
                    <x-label for="password">Password</x-label>
                    <x-text-input type="password" name="password" id="password" required>
                </div>

                {{-- Confirm Password --}}
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm
                        Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required>
                </div>

                {{-- Submit Button --}}
                <div class="mb-4">
                    <x-button type="submit">
                        Register
                    </x-button>
                </div>

                {{-- Login Link --}}
                <div class="text-center text-sm text-gray-600">
                    Already have an account? <a href="{{ route('login') }}"
                        class="text-blue-600 hover:underline">Login</a>
                </div>
            </form>
        </div>
    </section>
</x-layouts-landing>
