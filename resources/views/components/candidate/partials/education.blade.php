@props(['profile', 'educationCount'])
<x-card class="mb-6 border border-slate-200/50 bg-white/80 backdrop-blur-sm shadow-lg">
    <x-candidate.partials.user-data-header title="Education" :subtitle="$educationCount . ' Faculties'"> 
        <x-slot name="icon">
            <x-heroicon-o-academic-cap class="size-5 text-slate-600" />
        </x-slot>
    </x-candidate.partials.user-data-header>
    <x-card-body class="p-0">
        @if ($educationCount > 0)
            <div class="divide-y divide-slate-200">
                @foreach ($profile->educations as $education)
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
            <x-candidate.partials.no-data-section title="No education yet"
                subtitle="Add your education to complete your professional profile" addTitle='Add Education'
                :route="route('candidate.education.create')">
                <x-slot name="icon">
                    <x-heroicon-o-academic-cap class="size-10 text-slate-400" />
                </x-slot>
            </x-candidate.partials.no-data-section>
        @endif
    </x-card-body>
</x-card>
