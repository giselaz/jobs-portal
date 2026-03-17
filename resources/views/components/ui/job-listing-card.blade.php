@props(['title', 'location' => '', 'companyInitials' => 'Co', 'applyUrl' => '#'])
<article
    {{ $attributes->merge(['class' => 'flex flex-wrap items-center gap-4 rounded-xl border border-slate-200 bg-white p-4 shadow-sm transition hover:shadow md:flex-nowrap']) }}>
    <div
        class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-violet-100 text-sm font-semibold text-violet-700">
        {{ $companyInitials }}
    </div>
    <div class="min-w-0 flex-1">
        <h3 class="font-semibold text-slate-900">{{ $title }}</h3>
        <p class="text-sm text-slate-500">{{ $location }}</p>
        <div class="mt-2 flex flex-wrap gap-2">{{ $slot }}</div>
    </div>
    @if ($isCandidate)
        <a href="{{ $applyUrl }}" class="shrink-0">
            <x-ui.button variant="primary">Apply Now</x-ui.button>
        </a>
    @endif

</article>
