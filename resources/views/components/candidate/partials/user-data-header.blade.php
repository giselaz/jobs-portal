@props(['title', 'subtitle'])
<x-card-header class="!p-6 border-b border-slate-200">
    <div class="flex items-center gap-3">
        <div class="flex-shrink-0 p-2 bg-slate-100 rounded-lg">
            {{-- <x-heroicon-o-academic-cap class="size-5 text-slate-600" /> --}}
            {{ $icon }}
        </div>
        <div>
            <h3 class="text-xl font-bold text-slate-900">{{ $title }}</h3>
            <p class="text-sm text-slate-500"> {{ $subtitle }}</p>
        </div>
    </div>
</x-card-header>
