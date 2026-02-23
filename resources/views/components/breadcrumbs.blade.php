@php
    $breadcrumbs = \App\View\Components\Breadcrumbs::all();
@endphp
@if (count($breadcrumbs) > 1)
    <nav {{ $attributes->merge(['class' => 'flex']) }} aria-label="Breadcrumb">
        <ol class="flex flex-wrap items-center gap-1.5 text-sm text-slate-600">
            @foreach ($breadcrumbs as $breadcrumb)
                <li class="flex items-center gap-1.5">
                    @if (!$loop->first)
                        <svg class="h-4 w-4 shrink-0 text-slate-400" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                            <path d="M5.555 17.776l8-8-8-8 1.414-1.414 8 8-8 8 1.414 1.414z" />
                        </svg>
                    @endif
                    @if ($loop->last)
                        <span class="font-semibold text-violet-600">{{ $breadcrumb['title'] }}</span>
                    @else
                        <a href="{{ $breadcrumb['url'] }}" class="hover:text-violet-600 transition">{{ $breadcrumb['title'] }}</a>
                    @endif
                </li>
            @endforeach
        </ol>
    </nav>
@endif
