@props(['profile'])
<x-card class="mb-6 border border-slate-200/50 bg-white/80 backdrop-blur-sm shadow-lg">
    <x-card-header class="!p-6 border-b border-slate-200">
        <div class="flex items-center gap-3">
            <div class="flex-shrink-0 p-2 bg-slate-100 rounded-lg">
                <x-heroicon-o-sparkles class="size-5 text-slate-600" />
            </div>
            <div>
                <h3 class="text-xl font-bold text-slate-900">Skills</h3>
                <p class="text-sm text-slate-500">{{ $profile->skills->count() }} skills</p>
            </div>
        </div>
    </x-card-header>
    <x-card-body class="p-6">
        @if ($profile->skills->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                @foreach ($profile->skills->take(12) as $skill)
                    <div
                        class="group relative p-4 rounded-xl border border-slate-200 hover:border-slate-300 hover:shadow-md transition-all bg-white hover:bg-slate-50">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-3 h-3 bg-gradient-to-r from-indigo-400 to-purple-500 rounded-full shadow-sm">
                                </div>
                                <span
                                    class="font-medium text-slate-900 group-hover:text-slate-800">{{ $skill->name }}</span>
                            </div>
                            @if ($skill->level)
                                <span class="text-sm font-medium text-slate-500">{{ $skill->level }}</span>
                            @endif
                        </div>
                        @if ($skill->years_experience)
                            <div class="mt-2 h-1.5 bg-slate-200 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-indigo-500 to-blue-600 rounded-full transition-all"
                                    style="width: min(100%, calc({{ $skill->years_experience * 10 }}%))"></div>
                            </div>
                            <p class="text-xs text-slate-500 mt-1">{{ $skill->years_experience }} years</p>
                        @endif
                    </div>
                @endforeach
            </div>
            @if ($profile->skills->count() > 12)
                <div class="mt-6 pt-6 border-t border-slate-200 text-center">
                    <a href="{{ route('candidate.skill.index') }}"
                        class="inline-flex items-center gap-2 text-slate-600 hover:text-slate-900 font-medium text-sm">
                        Show all {{ $profile->skills->count() }} skills
                        <x-heroicon-o-chevron-right class="size-4" />
                    </a>
                </div>
            @endif
        @else
            <div class="text-center py-12 px-6">
                <div class="mx-auto size-20 bg-slate-100 rounded-2xl p-5 flex items-center justify-center mb-4">
                    <x-heroicon-o-sparkles class="size-10 text-slate-400" />
                </div>
                <h3 class="text-lg font-semibold text-slate-900 mb-2">No skills yet</h3>
                <p class="text-slate-600 mb-6">Add your skills to stand out to recruiters</p>
                <a href="{{ route('candidate.skill.create') }}"
                    class="inline-flex items-center gap-2 bg-slate-900 hover:bg-slate-800 text-white font-medium py-2.5 px-6 rounded-lg transition-colors">
                    <x-heroicon-o-plus class="size-4" />
                    Add Skills
                </a>
            </div>
        @endif
    </x-card-body>
</x-card>
