@php
    $breadcrumbs = \App\View\Components\Breadcrumbs::all();
    // dd($breadcrumbs);
@endphp
@if (count($breadcrumbs) > 1)
    <nav {{ $attributes->class(['flex']) }} aria-label="breadcrumb">
        <ul class="flex space-x-2 text-slate-500 font-semibold items-center">
            @foreach ($breadcrumbs as $breadcrumb)
                <li class="{{ $loop->last ? 'breadcrumb-active' : '' }}">
                    <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['title'] }}</a>
                </li>
                @if (!$loop->last)
                    <li class=" text-lg font-bold">
                        →
                    </li>
                @endif
            @endforeach

        </ul>
    </nav>
@endif
