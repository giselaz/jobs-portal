@if ($type == 'button')
    <button type="button" @click="activeTab = '{{ $tab }}' console.log('heree');"
        :class="activeTab === ($attrs.tab || '{{ $type ?? 'profile' }}') ? 'bg-violet-50 text-violet-600 font-semibold' :
            'text-gray-600 hover:bg-gray-50'"
        {{ $attributes->merge(['class' => 'w-full cursor-pointer flex items-center gap-3 rounded-lg px-4 py-2.5 text-sm font-medium text-slate-700 hover:bg-violet-50 hover:text-violet-700 transition']) }}
        x-bind="$attrs" x-ignore>
        {{ $slot }}
    </button>
@else
    <a href="{{ $route }}"
        {{ $attributes->class(['flex items-center gap-3 rounded-lg px-4 py-2.5 text-sm font-medium text-slate-700 hover:bg-violet-50 hover:text-violet-700 transition']) }}>
        {{ $slot }}
    </a>
@endif
