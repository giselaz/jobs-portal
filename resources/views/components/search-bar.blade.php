@props([
    'action' => '#',
])
<form
    {{ $attributes->merge(['class' => 'flex flex-col gap-4 rounded-2xl border border-slate-200 bg-white p-2 shadow-lg sm:flex-row sm:items-center sm:gap-2', 'method' => 'GET', 'action' => $action]) }}>
    <div class="flex-1">
        <x-search-input name="keyword" placeholder="Job title, Keyword" icon="search" />
    </div>
    <div class="flex-1">
        <x-search-input name="location" placeholder="Location" icon="location" />
    </div>
    <x-button type="submit" variant="primary" class="shrink-0">Find Job</x-button>
</form>
