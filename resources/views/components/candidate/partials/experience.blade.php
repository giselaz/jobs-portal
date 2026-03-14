@props(['profile'])
<x-card class="mb-6 border border-slate-200/50 bg-white/80 backdrop-blur-sm shadow-lg">
    <x-candidate.partials.user-data-header title="Experience" :subtitle="$profile->experiences->count() . ' Experiences'">
        <x-slot name="icon">
            <x-heroicon-o-briefcase class="size-5 text-slate-600" />
        </x-slot>
    </x-candidate.partials.user-data-header>
    <x-card-body class="p-0">
        @if ($profile->experiences->count() > 0)
            <div class="divide-y divide-slate-200">
                @foreach ($profile->experiences->sortByDesc('start_date') as $experience)
                    <div class="p-6 hover:bg-slate-50/50 transition-colors">
                        <div class="flex items-start gap-4 pb-4">
                            <div
                                class="shrink-0 w-12 h-12 bg-linear-to-br from-slate-100 to-slate-200 rounded-xl flex items-center justify-center">
                                <x-heroicon-o-building-office class="size-6 text-slate-600" />
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-start justify-between">
                                    <div>
                                        <h4 class="font-bold text-slate-900 text-lg leading-tight">
                                            {{ $experience->job_title }}</h4>
                                        <p class="text-slate-600 font-semibold mt-0.5">{{ $experience->company_name }}
                                        </p>
                                    </div>
                                    <span class="text-sm font-medium text-slate-500 whitespace-nowrap">
                                        {{ \Carbon\Carbon::parse($experience->start_date)->format('M Y') }} -
                                        {{ $experience->is_current ? 'Present' : \Carbon\Carbon::parse($experience->end_date)->format('M Y') }}
                                    </span>
                                </div>
                                @if ($experience->location)
                                    <p class="flex items-center gap-1 text-sm text-slate-500 mt-1">
                                        <x-heroicon-o-map-pin class="size-4" />
                                        {{ $experience->location }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        @if ($experience->description)
                            <ul class="text-slate-700 space-y-2 ml-4 mt-3">
                                <li>• {{ $experience->description }}</li>
                            </ul>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <x-candidate.partials.no-data-section title="No experience yet"
                subtitle='Add your work experience to showcase your professional journey' addTitle="Add Experience"
                :route="route('candidate.experience.create')">
                <x-slot name="icon">
                    <x-heroicon-o-briefcase class="size-10 text-slate-400" />
                </x-slot>
            </x-candidate.partials.no-data-section>
        @endif
    </x-card-body>
</x-card>
