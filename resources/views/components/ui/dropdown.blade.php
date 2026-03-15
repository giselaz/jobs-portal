<div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="opacity-0 scale-95"
    x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" @click.away="open = false"
    class="absolute right-0 top-full z-50 mt-1.5 min-w-48 rounded-xl border border-slate-200 bg-white py-1 shadow-lg"
    role="menu" aria-orientation="vertical">
    <ul class="py-1">
        {{ $slot }}
    </ul>
</div>
