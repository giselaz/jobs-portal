@props(['recentApplications'])
<x-ui.card class="mt-6 border border-slate-200/50 bg-white/80 backdrop-blur-sm shadow-lg">
    <x-ui.card-header class="!p-6 border-b border-slate-200">
        <div class="flex items-center gap-3">
            <div class="flex-shrink-0 p-2 bg-slate-100 rounded-lg">
                <x-heroicon-o-clipboard-document-list class="size-5 text-slate-600" />
            </div>
            <div class="flex-1 min-w-0">
                <h3 class="text-xl font-bold text-slate-900">Recent Applications</h3>
                <p class="text-sm text-slate-500">{{ $recentApplications->count() }} applications</p>
            </div>
            <a href="{{ route('candidate.my-job-application.index') }}"
                class="text-sm font-medium text-slate-700 hover:text-slate-900">View all →</a>
        </div>
    </x-ui.card-header>
    <x-ui.card-body class="p-0">
        @if ($recentApplications->count() > 0)
            <div class="divide-y divide-slate-200">
                @foreach ($recentApplications as $application)
                    <div class="p-6 hover:bg-slate-50/50 transition-colors group">
                        <div class="flex items-start gap-4">
                            <div
                                class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-violet-100 to-indigo-100 rounded-xl flex items-center justify-center mt-1">
                                <x-heroicon-o-briefcase class="size-6 text-violet-600" />
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-start justify-between mb-2">
                                    <div class="flex-1 min-w-0">
                                        <h4 class="font-semibold text-slate-900 truncate">
                                            {{ $application->jobPortal->title }}</h4>
                                        <p class="text-sm text-slate-500 mt-1">
                                            {{ $application->jobPortal->employer->company_name ?? 'Company' }}</p>
                                    </div>
                                    <span
                                        class="px-3 py-1 rounded-full text-xs font-semibold whitespace-nowrap
                                        @if ($application->status === 'pending') bg-orange-100 text-orange-800
                                        @elseif($application->status === 'accepted') bg-emerald-100 text-emerald-800
                                        @elseif($application->status === 'rejected') bg-red-100 text-red-800
                                        @else bg-slate-100 text-slate-800 @endif">
                                        {{ ucfirst($application->status) }}
                                    </span>
                                </div>
                                <p class="text-xs text-slate-500">{{ $application->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12 px-6">
                <div class="mx-auto size-20 bg-slate-100 rounded-2xl p-5 flex items-center justify-center mb-4">
                    <x-heroicon-o-inbox class="size-10 text-slate-400" />
                </div>
                <h3 class="text-lg font-semibold text-slate-900 mb-2">No applications yet</h3>
                <p class="text-slate-600 mb-6">Applications you make will appear here</p>
                <a href="{{ route('jobs.index') }}"
                    class="inline-flex items-center gap-2 bg-slate-900 hover:bg-slate-800 text-white font-medium py-2.5 px-6 rounded-lg transition-colors">
                    <x-heroicon-o-magnifying-glass class="size-4" />
                    Find Jobs
                </a>
            </div>
        @endif
    </x-ui.card-body>
</x-ui.card>
