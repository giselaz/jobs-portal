@props([
    'type' => 'success', // success | error
    'message' => '',
])
<div x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0"
    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-x-0"
    x-transition:leave-end="opacity-0 translate-x-4" role="alert"
    {{ $attributes->merge(['class' => 'fixed right-4 bottom-4 z-50 flex max-w-sm items-start gap-3 rounded-xl border p-4 shadow-lg ' . ($type === 'error' ? 'bg-red-50 border-red-200 text-red-800' : 'bg-emerald-50 border-emerald-200 text-emerald-800')]) }}>
    @if ($type === 'error')
        <x-heroicon-o-x-circle class="h-5 w-5 shrink-0 text-red-500" />
    @else
        <x-heroicon-o-check-circle class="h-5 w-5 shrink-0 text-emerald-500" />
    @endif
    <p class="flex-1 text-sm font-medium">{{ $message }}</p>
    <button type="button" @click="show = false"
        class="shrink-0 rounded p-1 opacity-70 hover:opacity-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-slate-400"
        aria-label="Dismiss">
        <x-heroicon-o-x-mark class="h-4 w-4" />
    </button>
</div>
