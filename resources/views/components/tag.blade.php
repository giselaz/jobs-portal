@props([
    'active' => false,
    'variant' => null, // null = default (border) | pill (violet-50 / violet-600 when active)
])
@php
    if ($active) {
        $base = 'inline-flex items-center rounded-lg px-3 py-1.5 text-sm font-medium bg-violet-600 text-white border border-violet-600';
    } elseif ($variant === 'pill') {
        $base = 'inline-flex cursor-pointer items-center rounded-lg px-3 py-1.5 text-sm font-medium bg-violet-50 text-violet-700 hover:bg-violet-100 transition';
    } else {
        $base = 'rounded-md border px-2 py-1';
    }
@endphp
<div {{ $attributes->merge(['class' => $base]) }}>
    {{ $slot }}
</div>
