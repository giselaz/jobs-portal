<x-layouts.landing>
    <section class="border-t border-slate-100 bg-white py-10">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-section-title title="All Employers" subtitle="Browse companies hiring on JobHunt" class="mb-8" />

            <div class="space-y-4">
                @forelse ($employers as $employer)
                    <article
                        class="flex flex-wrap items-center gap-4 rounded-xl border border-slate-200 bg-white p-4 shadow-sm transition hover:shadow md:flex-nowrap">
                        <x-initials-avatar :name="$employer->company_name" size="md" />
                        <div class="min-w-0 flex-1">
                            <h2 class="font-semibold text-slate-900">
                                {{ $employer->company_name }}
                            </h2>
                            <p class="text-sm text-slate-500">{{ $employer->jobPortals()->count() }}
                                {{ Str::plural('job', $employer->jobPortals()->count()) }}
                                posted</p>
                        </div>
                        <div class="shrink-0">
                            <x-link-button href="{{ route('employer.show', $employer) }}" variant="primary">View
                                Jobs</x-link-button>
                        </div>
                    </article>
                @empty
                    <x-empty-collection title="No employers found" subtitle="Check back later for new opportunities" />
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
