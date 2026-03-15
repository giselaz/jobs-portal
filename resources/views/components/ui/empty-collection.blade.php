@props([
    'title' => 'null',
    'subtitle' => 'null',
    'url' => 'null',
])

<div class="rounded-md border border-dashed border-slate-300 p-8 ">
    <div class="text-center font-medium">
        {{ $title }}
    </div>
    <div class="text-center">
        {{ $subtitle }} <a href="{{ $url }}" class=" text-cyan-500 hover:underline">here</a>

    </div>
</div>
