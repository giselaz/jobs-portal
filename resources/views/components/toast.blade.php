@props([
    'type' => 'success', // success | error
    'message' => '',
])
@php
    $styles = [
        'success' => [
            'bg' => 'bg-emerald-50 border-emerald-200 text-emerald-800',
            'icon' => 'text-emerald-500',
            'iconPath' =>
                'M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z',
        ],
        'error' => [
            'bg' => 'bg-red-50 border-red-200 text-red-800',
            'icon' => 'text-red-500',
            'iconPath' =>
                'M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z',
        ],
    ];
    $s = $styles[$type] ?? $styles['success'];
@endphp
<div x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0"
    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-x-0"
    x-transition:leave-end="opacity-0 translate-x-4" role="alert"
    {{ $attributes->merge(['class' => 'fixed right-4 bottom-4 z-50 flex max-w-sm items-start gap-3 rounded-xl border p-4 shadow-lg ' . $s['bg']]) }}>
    <svg class="h-5 w-5 shrink-0 {{ $s['icon'] }}" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
        <path fill-rule="evenodd" d="{{ $s['iconPath'] }}" clip-rule="evenodd" />
    </svg>
    <p class="flex-1 text-sm font-medium">{{ $message }}</p>
    <button type="button" @click="show = false"
        class="shrink-0 rounded p-1 opacity-70 hover:opacity-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-slate-400"
        aria-label="Dismiss">
        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
            <path
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" />
        </svg>
    </button>
</div>
