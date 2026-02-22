<label {{ $attributes->class([' font-medium mb-2 block text-sm text-slate-900 ']) }} $for={{ $for }}>
    {{ $slot }}
    @if ($required)
        <span class="text-red-500">*</span>
    @endif
</label>
