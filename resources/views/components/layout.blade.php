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
                    <li>

                        {{ auth()->user()->name ?? 'Anynomus' }}
                    </li>
                    <li>
                        <form action="{{ route('auth.destroy') }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <x-button class=" hover:font-bold cursor-pointer text-xs">Logout</x-button>
                        </form>
                    </li>
                @else
                    <li>
                        <a href="{{ route('auth.create') }}">Sign In</a>
                    </li>
                @endauth
            </ul>
        </nav>
        <x-breadcrumbs />
    @endif
    @if (session('success'))
        <div role="alert"
            class=" text-green-700 my-8 mx-3 rounded-md border-l-4 border-green-300 bg-green-100  opacity-75">
            <p class="font-bold">
                Success
            </p>
            <p>{{ session('success') }}</p>

        </div>
    @endif
    {{ $slot }}
</body>

</html>
