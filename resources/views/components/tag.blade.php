@props([
    'active' => false,
    'variant' => null, // null = default (border) | pill (violet-50 / violet-600 when active)
])
@php
    $base = 'inline-flex items-center px-3 py-1.5 text-sm font-medium';
    $variants = [
        'pill' => ' rounded-lg bg-violet-50 text-violet-700 hover:bg-violet-100 transition',
        'success' => 'rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-700',
    ];
  
    if ($active) {
        $base =
            'inline-flex items-center rounded-lg px-3 py-1.5 text-sm font-medium bg-violet-600 text-white border border-violet-600';
    } elseif ($variant && isset($variants[$variant])) {
        $class = $base . ' ' . $variants[$variant];
    } else {
        $base = 'rounded-md border px-2 py-1';
    }
@endphp
<div {{ $attributes->merge(['class' => $class]) }}>
    {{ $slot }}
</div>
