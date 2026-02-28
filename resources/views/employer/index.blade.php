<x-layouts.landing>
    <section class="border-t border-slate-100 bg-white py-10">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-section-title title="All Employers" subtitle="Browse companies hiring on JobHunt" class="mb-8" />

            <div class="space-y-4">
                @forelse ($employers as $employer)
                    @php
                        $initials = strtoupper(mb_substr($employer->company_name, 0, 2));
                        $jobCount = $employer->jobPortals()->count();
                    @endphp
                    <article
                        class="flex flex-wrap items-center gap-4 rounded-xl border border-slate-200 bg-white p-4 shadow-sm transition hover:shadow md:flex-nowrap">
                        <div
                            class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-violet-100 text-sm font-semibold text-violet-700">
                            {{ $initials }}
                        </div>
                        <div class="min-w-0 flex-1">
                            <h2 class="font-semibold text-slate-900">
                                {{ $employer->company_name }}
                            </h2>
                            <p class="text-sm text-slate-500">{{ $jobCount }} {{ Str::plural('job', $jobCount) }}
                                posted</p>
                        </div>
                        <div class="shrink-0">
                            <x-button variant="primary">View Jobs</x-button>
                        </div>
                    </article>
                @empty
                    <div class="rounded-xl border border-slate-200 bg-white p-12 text-center shadow-sm">
                        <p class="text-slate-600">No employers found.</p>
                    </div>
                @endforelse
            </div>
{{-- 
            @if ($employers->hasPages())
                <div class="mt-10 flex justify-center">
                    {{ $employers->links() }}
                </div>
            @endif --}}
        </div>
    </section>
</x-layouts.landing>
