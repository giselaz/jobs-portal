@props([
    'name' => '',
    'size' => 'md', // sm | md | lg | xl
])

@php
    $initials = strtoupper(mb_substr($name, 0, 2));

    $sizeClasses = [
        'sm' => 'h-8 w-8 text-xs',
        'md' => 'h-12 w-12 text-sm',
        'lg' => 'h-16 w-16 text-xl',
        'xl' => 'h-20 w-20 text-2xl',
    ];

    $sizeClass = $sizeClasses[$size] ?? $sizeClasses['md'];
@endphp

<div
    class="flex shrink-0 items-center justify-center rounded-full bg-violet-100 font-semibold text-violet-700 {{ $sizeClass }}">
    {{ $initials }}
</div>
