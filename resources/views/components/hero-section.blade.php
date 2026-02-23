@props([
    'userCount' => '45+',
    'headline' => 'Find Your Dream Job And Make Your Goal',
    'subheadline' => 'Connecting talent with opportunities worldwide. Start your journey to career success today.',
])
<section class="relative overflow-hidden bg-white">
    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
        <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-16">
            <div>
                <p class="mb-4 flex items-center gap-2 text-sm font-medium text-slate-600">
                    <span class="flex -space-x-2">
                        @for ($i = 0; $i < 4; $i++)
                            <span class="inline-flex h-8 w-8 items-center justify-center rounded-full border-2 border-white bg-violet-100 text-xs font-semibold text-violet-700">U</span>
                        @endfor
                    </span>
                    {{ $userCount }} Regular Users
                </p>
                <h1 class="text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl lg:text-5xl">{{ $headline }}</h1>
                <p class="mt-4 text-lg text-slate-600">{{ $subheadline }}</p>
                <div class="mt-8">{{ $slot }}</div>
            </div>
            <div class="relative flex justify-center lg:justify-end">
                <div class="relative h-64 w-64 rounded-full bg-gradient-to-br from-violet-100 to-violet-200/80 p-1 shadow-xl sm:h-80 sm:w-80">
                    <div class="flex h-full w-full items-center justify-center rounded-full bg-white text-slate-400">
                        <svg class="h-32 w-32 sm:h-40 sm:w-40" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
