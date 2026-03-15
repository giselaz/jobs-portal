@props([
    'variant' => null, // null = cyan (default) | primary | outline
    'href' => '#',
])
@php
    $base =
        'inline-flex items-center justify-center rounded-lg px-4 py-2.5 text-center text-sm font-semibold shadow-sm transition focus:outline-none focus:ring-2 focus:ring-offset-2';

    $variants = [
        'primary' => 'bg-violet-600 text-white hover:bg-violet-700 focus:ring-violet-500',
        'outline' => 'border-2 border-violet-600 bg-white text-violet-600 hover:bg-violet-50 focus:ring-violet-500',
    ];

    if ($variant && isset($variants[$variant])) {
        $class = $base . ' ' . $variants[$variant];
    } else {
        // Default cyan styling for backward compatibility
        $class = $base . ' border border-cyan-500 text-black hover:text-white hover:bg-cyan-500 focus:ring-cyan-500';
    }
@endphp
<a href="{{ $href }}" {{ $attributes->merge(['class' => $class]) }}>
    {{ $slot }}
</a>
