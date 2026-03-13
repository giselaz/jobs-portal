@props(['profile'])

<x-card class="mb-6 border" x-show="activeTab === 'education'" x-transition {{ $attributes }}>
    <x-card-header>
        <h3 class="text-lg font-semibold text-slate-900">Education</h3>
    </x-card-header>
    <x-card-body>
        @if ($profile->educations->count() > 0)
            <div class="space-y-4">
                @foreach ($profile->educations as $education)
                    <x-candidate.profile-item :item="$education" type="education" />
                @endforeach
            </div>
        @else
            <div class="text-center py-8">
                <x-heroicon-o-academic-cap class="mx-auto size-12 text-slate-400" />
                <p class="mt-4 text-sm text-slate-600">No education added yet</p>
            </div>
        @endif
    </x-card-body>
</x-card>
