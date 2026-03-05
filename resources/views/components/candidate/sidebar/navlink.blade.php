@props(['route'])
<a href="{{ $route }}"
    {{ $attributes->class(['flex items-center gap-3 rounded-lg px-4 py-2.5 text-sm font-medium text-slate-700 hover:bg-violet-50 hover:text-violet-700 transition']) }}>
    {{ $slot }}
</a>
