@props(['job'])
@php
    $initials = strtoupper(mb_substr($job->employer->company_name, 0, 2));
@endphp
<article {{ $attributes->merge(['class' => 'flex flex-wrap items-center gap-4 rounded-xl border border-slate-200 bg-white p-4 shadow-sm transition hover:shadow md:flex-nowrap']) }}>
    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-violet-100 text-sm font-semibold text-violet-700">
        {{ $initials }}
    </div>
    <div class="min-w-0 flex-1">
        <h2 class="font-semibold text-slate-900">
            <a href="{{ route('jobs.show', $job) }}" class="hover:text-violet-600">{{ $job->title }}</a>
        </h2>
        <p class="text-sm text-slate-500">{{ $job->employer->company_name }} · {{ $job->location }}</p>
        <p class="mt-1 text-sm font-medium text-slate-600">${{ number_format($job->salary) }}</p>
        <div class="mt-2 flex flex-wrap gap-2">
            <x-tag variant="pill">{{ Str::ucfirst($job->experience) }}</x-tag>
            <x-tag variant="pill">{{ $job->category }}</x-tag>
        </div>
    </div>
    <div class="shrink-0">
        {{ $slot }}
    </div>
</article>
