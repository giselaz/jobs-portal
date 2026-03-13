@props(['profile'])

<x-card class="mb-6 border" x-show="activeTab === 'skills'" {{ $attributes }}>>
    <x-card-header>
        <h3 class="text-lg font-semibold text-slate-900">Skills</h3>
    </x-card-header>
    <x-card-body>
        @if ($profile->skills->count() > 0)
            <div class="space-y-4">
                @foreach ($profile->skills as $skill)
                    <x-candidate.profile-item :item="$skill" type="skill" />
                @endforeach
            </div>
        @else
            <div class="text-center py-8">
                <x-heroicon-o-sparkles class="mx-auto size-12 text-slate-400" />
                <p class="mt-4 text-sm text-slate-600">No skills added yet</p>
            </div>
        @endif
    </x-card-body>
</x-card>
