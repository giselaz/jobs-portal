@props([
    'title' => 'We Are Supported By',
])
<section {{ $attributes->merge(['class' => 'border-t border-slate-200 bg-slate-50/50 py-12']) }}>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <h2 class="text-center text-lg font-bold text-slate-900">{{ $title }}</h2>
        <div class="mt-8 flex flex-wrap items-center justify-center gap-8 grayscale opacity-80">
            {{ $slot }}
        </div>
    </div>
</section>
