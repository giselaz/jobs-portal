@props([
    'variant' => 'app', // app | landing
])
@if ($variant === 'app')
    <nav class="mb-8 flex justify-between py-4 font-medium text-xl">
        <ul class="flex space-x-2 items-center">
            <li><a href="{{ route('jobs.index') }}" class="text-slate-700 hover:text-violet-600 transition">Home</a></li>
        </ul>
        <ul class="flex space-x-3 items-center">
            @auth
                @if (!auth()->user()->employer())
                    <li>
                        <x-link-button href="{{ route('employer.create') }}">Create Jobs</x-link-button>
                    </li>
                @endif
                <li class="relative" x-data="{ open: false }">
                    <button type="button" @click="open = !open"
                        class="inline-flex items-center gap-x-1.5 rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50 hover:border-slate-300 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:ring-offset-1">
                        {{ auth()->user()->name ?? 'Anonymous' }}
                        <svg class="-mr-0.5 size-4 text-slate-400" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" fill-rule="evenodd" />
                        </svg>
                    </button>
                    <x-dropdown>
                        @if (auth()->user()->employer)
                            <li><a href="{{ route('my-jobs.index') }}" class="block px-4 py-2.5 text-sm text-slate-700 hover:bg-violet-50 hover:text-violet-700 transition">My Jobs</a></li>
                        @else
                            <li><a href="{{ route('my-job-application.index') }}" class="block px-4 py-2.5 text-sm text-slate-700 hover:bg-violet-50 hover:text-violet-700 transition">Check Applications</a></li>
                        @endif
                        <li class="border-t border-slate-100">
                            <form action="{{ route('auth.destroy') }}" method="POST" class="p-2">
                                @method('DELETE')
                                @csrf
                                <x-button type="submit" class="w-full justify-center text-left text-sm text-red-600 hover:bg-red-50 hover:text-red-700" :isLogout="true">Logout</x-button>
                            </form>
                        </li>
                    </x-dropdown>
                </li>
            @else
                <li><a href="{{ route('auth.create') }}" class="text-slate-700 hover:text-violet-600 transition">Sign In</a></li>
            @endauth
        </ul>
    </nav>
@elseif ($variant === 'landing')
    <header class="sticky top-0 z-50 border-b border-slate-200/80 bg-white/95 backdrop-blur-sm">
        <nav class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-4 py-4 sm:px-6 lg:px-8">
            <a href="{{ route('jobs.index') }}" class="text-xl font-bold tracking-tight text-slate-900">JobHunt</a>
            <ul class="hidden items-center gap-8 md:flex">
                <li><a href="#" class="text-slate-600 hover:text-violet-600">About Us</a></li>
                <li><a href="{{ route('jobs.index') }}" class="text-slate-600 hover:text-violet-600">Jobs</a></li>
                <li><a href="#" class="text-slate-600 hover:text-violet-600">Employers</a></li>
                <li><a href="#" class="text-slate-600 hover:text-violet-600">Job Seekers</a></li>
                <li><a href="#" class="text-slate-600 hover:text-violet-600">Post a Job</a></li>
            </ul>
            @auth
                <div x-data="{ open: false }" class="relative">
                    <button type="button" @click="open = !open"
                        class="inline-flex items-center gap-x-1.5 rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50 hover:border-slate-300 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:ring-offset-1">
                        {{ auth()->user()->name ?? 'Anonymous' }}
                        <svg class="-mr-0.5 size-4 text-slate-400" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" fill-rule="evenodd" />
                        </svg>
                    </button>
                    <x-dropdown>
                        @if (auth()->user()->employer)
                            <li><a href="{{ route('my-jobs.index') }}" class="block px-4 py-2.5 text-sm text-slate-700 hover:bg-violet-50 hover:text-violet-700 transition">My Jobs</a></li>
                        @else
                            <li><a href="{{ route('my-job-application.index') }}" class="block px-4 py-2.5 text-sm text-slate-700 hover:bg-violet-50 hover:text-violet-700 transition">Check Applications</a></li>
                        @endif
                        <li class="border-t border-slate-100">
                            <form action="{{ route('auth.destroy') }}" method="POST" class="p-2">
                                @method('DELETE')
                                @csrf
                                <x-button type="submit" variant="outline" :isLogout="true">Logout</x-button>
                            </form>
                        </li>
                    </x-dropdown>
                </div>
            @else
                <div class="flex items-center gap-3">
                    <x-button variant="outline" href="{{ route('auth.create') }}">Login</x-button>
                    <x-button variant="primary" href="#">Signup</x-button>
                </div>
            @endauth

        </nav>
    </header>
@endif
