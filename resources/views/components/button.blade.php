@props([
    'variant' => null, // null = app (cyan) | primary | outline
    'href' => null,
    'type' => 'button',
    'isLogout' => false,
])
@php
    $base = 'inline-flex items-center justify-center rounded-sm px-2.5 py-1.5 text-center text-sm font-semibold shadow-sm cursor-pointer transition focus:outline-none focus:ring-2 focus:ring-offset-2';
    if ($variant === 'primary' || $variant === 'outline') {
        $base .= ' rounded-lg px-4 py-2.5 focus:ring-violet-500';
        $variants = [
            'primary' => 'bg-violet-600 text-white hover:bg-violet-700',
            'outline' => 'border-2 border-violet-600 bg-white text-violet-600 hover:bg-violet-50',
        ];
        $class = $base . ' ' . ($variants[$variant] ?? $variants['primary']);
    } else {
        $class = $base . ' border border-cyan-500 text-black ' . ($isLogout ? 'hover:text-red-500 hover:bg-transparent' : 'hover:text-white hover:bg-cyan-500');
    }
@endphp
@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $class]) }}>{{ $slot }}</a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $class]) }}>{{ $slot }}</button>
@endif
