@props(['value' => old('role')])

<div class="mt-6">
    <label class="block text-sm font-medium text-slate-700 mb-3">
        Register as
    </label>

    <div class="grid grid-cols-2 gap-6">

        {{-- Candidate --}}
        <label class="cursor-pointer">
            <input type="radio" name="role" value="candidate" class="peer hidden"
                {{ $value === 'candidate' ? 'checked' : '' }}>

            <div
                class="border rounded-xl p-6 text-center transition-all duration-200
                border-slate-300
                peer-checked:border-violet-600
                peer-checked:ring-2
                peer-checked:ring-violet-200
                hover:border-violet-400
                hover:shadow-md
            ">

                {{-- Icon --}}
                <div class="flex justify-center mb-4">
                    <div
                        class="bg-violet-100 text-violet-600 p-3 rounded-full
                        peer-checked:bg-violet-600 
                        peer-checked:text-white
                        transition">
                        <x-heroicon-o-user class="h-6 w-6" />
                    </div>
                </div>

                <div class="text-lg font-semibold text-slate-900">
                    Job Seeker
                </div>

                <div class="text-sm text-slate-500 mt-1">
                    Apply for jobs and build your profile
                </div>
            </div>
        </label>

        {{-- Employer --}}
        <label class="cursor-pointer">
            <input type="radio" name="role" value="employer" class="peer hidden"
                {{ $value === 'employer' ? 'checked' : '' }}>

            <div
                class="border rounded-xl p-6 text-center transition-all duration-200
                border-slate-300
                peer-checked:border-violet-600
                peer-checked:ring-2
                peer-checked:ring-violet-200
                hover:border-violet-400
                hover:shadow-md
            ">

                {{-- Icon --}}
                <div class="flex justify-center mb-4">
                    <div
                        class="bg-violet-100 text-violet-600 p-3 rounded-full
                        peer-checked:bg-violet-600 
                        peer-checked:text-white
                        transition">
                        <x-heroicon-o-briefcase class="h-6 w-6" />
                    </div>
                </div>

                <div class="text-lg font-semibold text-slate-900">
                    Employer
                </div>

                <div class="text-sm text-slate-500 mt-1">
                    Post jobs and find candidates
                </div>
            </div>
        </label>

    </div>

    @error('role')
        <p class="text-red-500 text-sm mt-3">{{ $message }}</p>
    @enderror
</div>
