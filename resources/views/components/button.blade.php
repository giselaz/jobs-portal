@props([
    'isLogout' => false,
])
<button
    {{ $attributes->class([
        'rounded-sm border border-cyan-500  px-2.5 py-1.5 text-center text-sm font-semibold cursor-pointer text-black shadow-sm',
        'hover:text-red-500  hover:bg-transparent' => $isLogout,
        'hover:text-white hover:bg-cyan-500' => !$isLogout,
    ]) }}>
    {{ $slot }}
</button>
