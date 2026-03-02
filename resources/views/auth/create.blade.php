<x-layout>
    <section class="flex min-h-[60vh] items-center justify-center px-4 py-16">
        <div class="w-full max-w-md">
            <div class="mb-8 text-center">
                <h1 class="text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">Sign in to your account</h1>
                <p class="mt-2 text-sm text-slate-600">Enter your credentials to access your account</p>
            </div>
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                <form action="{{ route('auth.store') }}" method="POST">
                    @csrf
                    <div class="mb-6">
                        <x-label for="email" :required="true">Email</x-label>
                        <x-text-input type="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" class="mt-1.5" />
                    </div>
                    <div class="mb-6">
                        <x-label for="password" :required="true">Password</x-label>
                        <x-text-input type="password" name="password" placeholder="••••••••" class="mt-1.5" />
                    </div>
                    <div class="mb-6 flex flex-wrap items-center justify-between gap-3 text-sm">
                        <label class="flex cursor-pointer items-center gap-2 text-slate-700">
                            <input type="checkbox" name="remember" value="1" {{ old('remember') ? 'checked' : '' }}
                                class="h-4 w-4 rounded border-slate-300 text-violet-600 focus:ring-violet-500" />
                            <span>Remember me</span>
                        </label>
                        <a href="#" class="font-medium text-violet-600 hover:text-violet-700 transition">Forgot password?</a>
                    </div>
                    <x-button type="submit" variant="primary" class="w-full py-3">Sign in</x-button>
                </form>
            </div>
            <p class="mt-6 text-center text-sm text-slate-600">
                Don't have an account?
                <a href="#" class="font-medium text-violet-600 hover:text-violet-700 transition">Sign up</a>
            </p>
        </div>
    </section>
</x-layout>
 