@props([
    'title',
    'openPositions' => 0,
    'active' => false,
])
@php
    $cardClass = $active
        ? 'border-violet-600 bg-violet-600 text-white shadow-md'
        : 'border-slate-200 bg-white text-slate-700 shadow-sm hover:border-violet-300 hover:shadow';
@endphp
<article {{ $attributes->merge(['class' => 'flex flex-col items-center gap-4 rounded-xl border p-6 transition ' . $cardClass]) }}>
    <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-full {{ $active ? 'bg-white/20' : 'bg-violet-50' }}">
        {{ $slot }}
    </div>
    <div class="text-center">
        <h3 class="font-semibold">{{ $title }}</h3>
        <p class="mt-1 text-sm {{ $active ? 'text-white/90' : 'text-slate-500' }}">{{ $openPositions }} Open Positions</p>
    </div>
</article>
