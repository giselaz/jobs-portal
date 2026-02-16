<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Job Board</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class=" mx-auto mt-10 max-w-2xl bg-gradient-to-r from-indigo-100 via-purple-100 to-pink-100 text-slate-700">


    @if (!request()->routeIs('auth.create'))
        <nav class="mb-8 flex justify-between font-medium text-xl py-4">
            <ul class="flex space-x-2">
                <li>
                    <a href="{{ route('jobs.index') }}">Home</a>
                </li>
            </ul>
            <ul class="flex space-x-3 items-center">
                @auth
                    <li x-data="{ open: false }" class="relative">
                        <button x-on:click="open = ! open" type="button"
                            class=" cursor-pointer inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white/10 px-3 py-2 text-sm font-semibold  text-slate-600 inset-ring-1 inset-ring-white/5 hover:bg-white/20">
                            {{ auth()->user()->name ?? 'Anynomus' }}
                            <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true"
                                class="-mr-1 size-5 text-gray-400">
                                <path
                                    d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                    clip-rule="evenodd" fill-rule="evenodd" />
                            </svg>
                        </button>

                        <x-dropdown>
                    <li> <a href="{{ route('my-job-application.index') }}"
                            class=" block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:text-gray-900 focus:outline-hidden ">
                            Check Applications
                        </a>
                    </li>
                    <li class="px-4 py-2">
                        <form action="{{ route('auth.destroy') }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <x-button
                                class=" hover:font-bold cursor-pointer text-xs border-0 hover:text-black hover:bg-transparent">Logout</x-button>
                        </form>
                    </li>
                    </x-dropdown>
                    </li>
                @else
                    <li>
                        <a href="{{ route('auth.create') }}">Sign In</a>
                    </li>
                @endauth
            </ul>
        </nav>
        <x-breadcrumbs class="mb-4" />
    @endif
    @if (session('success'))
        <div role="alert"
            class=" text-green-700 my-8  px-2 py-3 rounded-md border-l-4 border-green-300 bg-green-100  opacity-75">
            <p class="font-bold">
                Success
            </p>
            <p>{{ session('success') }}</p>

        </div>
    @endif
    {{ $slot }}
</body>

</html>
