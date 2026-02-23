<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Error') - {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="min-h-screen bg-slate-50 text-slate-700 antialiased">
    <div class="flex min-h-screen flex-col items-center justify-center px-4 py-16">
        <div class="w-full max-w-md text-center">
            <p class="text-6xl font-bold tracking-tight text-violet-600">@yield('code')</p>
            <h1 class="mt-4 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">@yield('title')</h1>
            <p class="mt-2 text-slate-600">@yield('message')</p>
            @hasSection('action_url')
                <a href="@yield('action_url')" class="mt-8 inline-flex items-center justify-center rounded-lg border-2 border-violet-600 bg-white px-4 py-2.5 text-sm font-semibold text-violet-600 transition hover:bg-violet-50 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:ring-offset-2">
                    @yield('action_text', 'Go back')
                </a>
            @else
                <a href="{{ url()->previous() }}" class="mt-8 inline-flex items-center justify-center rounded-lg border-2 border-violet-600 bg-white px-4 py-2.5 text-sm font-semibold text-violet-600 transition hover:bg-violet-50 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:ring-offset-2">
                    Go back
                </a>
            @endif
        </div>
    </div>
</body>
</html>
