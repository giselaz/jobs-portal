<x-layouts.landing>
    <section class="border-t border-slate-100 bg-slate-50/30 py-10">
        <div class="mx-auto max-w-2xl px-4 sm:px-6 lg:px-8">
            <a href="{{ route('jobs.show', $job) }}"
                class="mb-6 inline-flex items-center gap-1.5 text-sm font-medium text-slate-600 hover:text-violet-600 transition">
                <x-heroicon-o-arrow-left class="h-4 w-4" />
                Back to Job
            </a>
            <div class="mb-8 rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
                <div class="flex gap-4">
                    <div
                        class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-violet-100 text-sm font-semibold text-violet-700">
                        {{ strtoupper(mb_substr($job->employer->company_name, 0, 2)) }}
                    </div>
                    <div class="min-w-0 flex-1">
                        <h1 class="font-semibold text-slate-900">{{ $job->title }}</h1>
                        <p class="text-sm text-slate-500">{{ $job->employer->company_name }} · {{ $job->location }}</p>
                        <p class="mt-1 text-sm font-medium text-violet-600">${{ number_format($job->salary) }}</p>
                    </div>
                </div>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                <h2 class="mb-6 text-xl font-bold tracking-tight text-slate-900">Your application</h2>
                <form method="POST" action="{{ route('candidate.job.application.store', $job) }}"></form>
                    @csrf
                <div class="mb-6">
                    <x-ui.label for="expected_salary" :required="true">Expected salary</x-ui.label>
                    <x-ui.text-input name="expected_salary" type="number" value="{{ old('expected_salary') }}"
                        placeholder="e.g. 50000" min="0" class="mt-1.5 w-full" />
                </div>
                <div class="mb-6">
                    <x-ui.label for="cv" :required="true">CV (PDF or document)</x-ui.label>
                    <x-ui.file-input type="file" name="cv" id="cv" required accept=".pdf,.doc,.docx" />
                    @error('cv')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <x-ui.button type="submit" variant="primary" class="w-full py-3">Submit application</x-ui.button>
                </form>
            </div>
        </div>
    </section>
</x-layouts.landing>
