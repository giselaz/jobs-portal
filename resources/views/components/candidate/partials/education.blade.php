@props(['profile'])
<x-card class="mb-6 border border-slate-200/50 bg-white/80 backdrop-blur-sm shadow-lg">
    <x-partials.user-data-header class="!p-6 border-b border-slate-200" >
        <x-slot name="icon">
            <x-heroicon-o-academic-cap class="size-5 text-slate-600" />
        </x-slot>
    </x-partials.user-data-header>
    <x-card-body class="p-0">
        @if ($profile->educations->count() > 0)
            <div class="divide-y divide-slate-200">
                @foreach ($profile->educations->sortByDesc('start_date') as $education)
                    <div class="p-6 hover:bg-slate-50/50 transition-colors">
                        <div class="flex items-start gap-4 pb-4">
                            <div
                                class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-blue-100 to-blue-200 rounded-xl flex items-center justify-center">
                                <x-heroicon-o-academic-cap class="size-6 text-blue-600" />
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-start justify-between">
                                    <div>
                                        <h4 class="font-bold text-slate-900 text-lg leading-tight">
                                            {{ $education->degree }}</h4>
                                        <p class="text-slate-600 font-semibold mt-0.5">{{ $education->institution }}</p>
                                        @if ($education->field_of_study)
                                            <p class="text-sm text-slate-500 mt-1">{{ $education->field_of_study }}</p>
                                        @endif
                                    </div>
                                    <span class="text-sm font-medium text-slate-500 whitespace-nowrap">
                                        {{ \Carbon\Carbon::parse($education->start_date)->format('M Y') }} -
                                        {{ $education->is_current ? 'Present' : \Carbon\Carbon::parse($education->end_date)->format('M Y') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12 px-6">
                <div class="mx-auto size-20 bg-slate-100 rounded-2xl p-5 flex items-center justify-center mb-4">
                    <x-heroicon-o-academic-cap class="size-10 text-slate-400" />
                </div>
                <h3 class="text-lg font-semibold text-slate-900 mb-2">No education yet</h3>
                <p class="text-slate-600 mb-6">Add your education to complete your professional profile</p>
                <a href="{{ route('candidate.education.create') }}"
                    class="inline-flex items-center gap-2 bg-slate-900 hover:bg-slate-800 text-white font-medium py-2.5 px-6 rounded-lg transition-colors">
                    <x-heroicon-o-plus class="size-4" />
                    Add Education
                </a>
            </div>
        @endif
    </x-card-body>
</x-card>
