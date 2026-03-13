@props(['profile'])
<x-card class="mb-6 border" x-show="activeTab === 'experience'" {{ $attributes }}>
    <x-card-header>
        <h3 class="text-lg font-semibold text-slate-900">Experience</h3>
    </x-card-header>
    <x-card-body>
        @if ($profile->experiences->count() > 0)
            <div class="space-y-4">
                @foreach ($profile->experiences as $experience)
                    <x-candidate.profile-item :item="$experience" type="experience" />
                @endforeach
            </div>
        @else
            <div class="text-center py-8">
                <x-heroicon-o-briefcase class="mx-auto size-12 text-slate-400" />
                <p class="mt-4 text-sm text-slate-600">No work experience added yet</p>
            </div>
        @endif
    </x-card-body>
</x-card>
