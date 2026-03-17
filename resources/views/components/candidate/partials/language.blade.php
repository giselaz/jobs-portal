@props(['profile','languageCount'])
<x-ui.card class="mb-6 border border-slate-200/50 bg-white/80 backdrop-blur-sm shadow-lg">
    <x-ui.card-header class="!p-6 border-b border-slate-200">
        <div class="flex items-center gap-3">
            <div class="flex-shrink-0 p-2 bg-slate-100 rounded-lg">
                <x-heroicon-o-language class="size-5 text-slate-600" />
            </div>
            <div>
                <h3 class="text-xl font-bold text-slate-900">Languages</h3>
                <p class="text-sm text-slate-500">{{ $languageCount }} languages</p>
            </div>
        </div>
    </x-ui.card-header>
    <x-ui.card-body class="p-6">
        @if ($languageCount > 0)
            <div class="space-y-3">
                @foreach ($profile->languages as $language)
                    <div
                        class="group flex items-center justify-between p-4 rounded-xl border border-slate-200 hover:border-slate-300 hover:shadow-md hover:bg-slate-50 transition-all">
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 bg-gradient-to-br from-emerald-100 to-teal-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <x-heroicon-o-globe-alt class="size-5 text-emerald-600" />
                            </div>
                            <div>
                                <h4 class="font-semibold text-slate-900">{{ $language->language }}</h4>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            @php
                                $level = strtolower($language->proficiency ?? 'beginner');
                                $colors = [
                                    'beginner' => 'bg-orange-100 text-orange-800',
                                    'intermediate' => 'bg-yellow-100 text-yellow-800',
                                    'advanced' => 'bg-emerald-100 text-emerald-800',
                                    'native' => 'bg-blue-100 text-blue-800',
                                    'fluent' => 'bg-indigo-100 text-indigo-800',
                                ];
                            @endphp
                            <span
                                class="px-3 py-1 rounded-full text-xs font-medium {{ $colors[$level] ?? 'bg-slate-100 text-slate-800' }}">
                                {{ ucfirst($language->proficiency ?? 'Beginner') }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12 px-6">
                <div class="mx-auto size-20 bg-slate-100 rounded-2xl p-5 flex items-center justify-center mb-4">
                    <x-heroicon-o-globe-alt class="size-10 text-slate-400" />
                </div>
                <h3 class="text-lg font-semibold text-slate-900 mb-2">No languages yet</h3>
                <p class="text-slate-600 mb-6">Add the languages you speak to reach international opportunities</p>
                <a href="{{ route('candidate.language.create') }}"
                    class="inline-flex items-center gap-2 bg-slate-900 hover:bg-slate-800 text-white font-medium py-2.5 px-6 rounded-lg transition-colors">
                    <x-heroicon-o-plus class="size-4" />
                    Add Language
                </a>
            </div>
        @endif
    </x-ui.card-body>
</x-ui.card>
