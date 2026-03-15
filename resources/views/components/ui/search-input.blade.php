@props([
    'name' => 'search',
    'placeholder' => 'Search...',
    'icon' => 'search', // search | location
])
<div class="relative">
    <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
        @if ($icon === 'location')
            <x-heroicon-o-map-pin class="h-5 w-5" />
        @else
            <x-heroicon-o-magnifying-glass class="h-5 w-5" />
        @endif
    </span>
    <input type="text" name="{{ $name }}"
        {{ $attributes->merge([
            'class' =>
                'block w-full rounded-lg border border-slate-300 bg-white py-2.5 pl-10 pr-3 text-slate-900 placeholder-slate-500 focus:border-violet-500 focus:outline-none focus:ring-1 focus:ring-violet-500',
            'placeholder' => $placeholder,
        ]) }} />
</div>
