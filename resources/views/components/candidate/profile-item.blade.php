@props([
    'type' => 'education', // education | experience | language | skill
    'item' => null,
])

@switch($type)
    @case('education')
        <div class="rounded-lg border border-slate-200 bg-white p-4">
            <div class="flex items-start justify-between">
                <div>
                    <h4 class="font-semibold text-slate-900">{{ $item->degree }}</h4>
                    <p class="text-sm text-slate-600">{{ $item->institution }}</p>
                    @if ($item->field_of_study)
                        <p class="text-xs text-slate-500">{{ $item->field_of_study }}</p>
                    @endif
                </div>
                <span class="text-xs text-slate-500">
                    {{ \Carbon\Carbon::parse($item->start_date)->format('M Y') }} -
                    {{ $item->is_current ? 'Present' : \Carbon\Carbon::parse($item->end_date)->format('M Y') }}
                </span>
            </div>
        </div>
    @break

    @case('experience')
        <div class="rounded-lg border border-slate-200 bg-white p-4">
            <div class="flex items-start justify-between">
                <div>
                    <h4 class="font-semibold text-slate-900">{{ $item->job_title }}</h4>
                    <p class="text-sm text-slate-600">{{ $item->company_name }}</p>
                    @if ($item->location)
                        <p class="text-xs text-slate-500 flex items-center gap-1">
                            <x-heroicon-o-map-pin class="size-3" />
                            {{ $item->location }}
                        </p>
                    @endif
                    @if ($item->description)
                        <p class="mt-2 text-sm text-slate-600">{{ $item->description }}</p>
                    @endif
                </div>
                <span class="text-xs text-slate-500">
                    {{ \Carbon\Carbon::parse($item->start_date)->format('M Y') }} -
                    {{ $item->is_current ? 'Present' : \Carbon\Carbon::parse($item->end_date)->format('M Y') }}
                </span>
            </div>
        </div>
    @break

    @case('language')
        <div class="rounded-lg border border-slate-200 bg-white p-4">
            <div class="flex items-center justify-between">
                <div>
                    <h4 class="font-semibold text-slate-900">{{ $item->language }}</h4>
                    <p class="text-sm text-slate-600">{{ $item->proficiency }}</p>
                </div>
            </div>
        </div>
    @break

    @case('skill')
        <div class="rounded-lg border border-slate-200 bg-white p-4">
            <div class="flex items-center justify-between">
                <div>
                    <h4 class="font-semibold text-slate-900">{{ $item->name }}</h4>
                    @if ($item->level)
                        <p class="text-sm text-slate-600">{{ $item->level }}</p>
                    @endif
                </div>
                @if ($item->years_experience)
                    <span class="text-xs text-slate-500">{{ $item->years_experience }} years</span>
                @endif
            </div>
        </div>
    @break

    @default
        <div class="rounded-lg border border-slate-200 bg-white p-4">
            {{ $slot }}
        </div>
@endswitch
