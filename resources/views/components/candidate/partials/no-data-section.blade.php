@props(['title', 'subtitle', 'route', 'addTitle'])
<div class="text-center py-12 px-6">
    <div class="mx-auto size-20 bg-slate-100 rounded-2xl p-5 flex items-center justify-center mb-4">
        {{ $icon }}
    </div>
    <h3 class="text-lg font-semibold text-slate-900 mb-2">{{ $title }}</h3>
    <p class="text-slate-600 mb-6">{{ $subtitle }}</p>
    <a href="{{ $route }}"
        class="inline-flex items-center gap-2 bg-slate-900 hover:bg-slate-800 text-white font-medium py-2.5 px-6 rounded-lg transition-colors">
        <x-heroicon-o-plus class="size-4" />
        {{ $addTitle }}
    </a>
</div>
{{-- No education yet --}}
{{-- Add your education to complete your professional profile --}}
{{-- Add Education --}}
{{-- {{ route('candidate.education.create') }} --}}
{{-- <x-heroicon-o-academic-cap class="size-10 text-slate-400" /> --}}
