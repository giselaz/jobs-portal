@props(['employer', 'showDescription' => true])

@php
    $jobCount = $employer->jobPortals()->count();
@endphp

<div class="mb-10 rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
    <div class="flex flex-wrap items-center gap-4 md:flex-nowrap">
        <x-initials-avatar :name="$employer->company_name" size="lg" />
        <div class="min-w-0 flex-1">
            <h1 class="text-2xl font-bold text-slate-900">{{ $employer->company_name }}</h1>
            <p class="text-sm text-slate-500">{{ $jobCount }} {{ Str::plural('job', $jobCount) }} posted</p>
            @if ($showDescription && $employer->description)
                <p class="mt-2 text-slate-600">{{ $employer->description }}</p>
            @endif
        </div>
    </div>
</div>
