@props(['value' => old('role')])

<div class="mt-6">
    <label class="block text-sm font-medium text-slate-700 mb-3">
        Register as
    </label>

    <div class="grid grid-cols-2 gap-6">

        {{-- Candidate --}}
        <label class="cursor-pointer">
            <input 
                type="radio" 
                name="role" 
                value="candidate" 
                class="peer hidden"
                {{ $value === 'candidate' ? 'checked' : '' }}
            >

            <div class="border rounded-xl p-6 text-center transition-all duration-200
                border-slate-300
                peer-checked:border-violet-600
                peer-checked:ring-2
                peer-checked:ring-violet-200
                hover:border-violet-400
                hover:shadow-md
            ">
                
                {{-- Icon --}}
                <div class="flex justify-center mb-4">
                    <div class="bg-violet-100 text-violet-600 p-3 rounded-full
                        peer-checked:bg-violet-600 
                        peer-checked:text-white
                        transition">
                        {{-- User Icon --}}
                        <svg xmlns="http://www.w3.org/2000/svg" 
                             class="h-6 w-6" 
                             fill="none" 
                             viewBox="0 0 24 24" 
                             stroke="currentColor" 
                             stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" 
                                d="M15.75 6.75a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a7.5 7.5 0 0115 0" />
                        </svg>
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
            <input 
                type="radio" 
                name="role" 
                value="employer" 
                class="peer hidden"
                {{ $value === 'employer' ? 'checked' : '' }}
            >

            <div class="border rounded-xl p-6 text-center transition-all duration-200
                border-slate-300
                peer-checked:border-violet-600
                peer-checked:ring-2
                peer-checked:ring-violet-200
                hover:border-violet-400
                hover:shadow-md
            ">
                
                {{-- Icon --}}
                <div class="flex justify-center mb-4">
                    <div class="bg-violet-100 text-violet-600 p-3 rounded-full
                        peer-checked:bg-violet-600 
                        peer-checked:text-white
                        transition">
                        {{-- Briefcase Icon --}}
                        <svg xmlns="http://www.w3.org/2000/svg" 
                             class="h-6 w-6" 
                             fill="none" 
                             viewBox="0 0 24 24" 
                             stroke="currentColor" 
                             stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" 
                                d="M21 12.75V7.5A2.25 2.25 0 0018.75 5.25h-3.379a2.25 2.25 0 01-1.59-.659l-.902-.902A2.25 2.25 0 0011.288 3h-2.576a2.25 2.25 0 00-1.591.659l-.902.902a2.25 2.25 0 01-1.59.659H5.25A2.25 2.25 0 003 7.5v5.25m18 0v3.75A2.25 2.25 0 0118.75 18.75H5.25A2.25 2.25 0 013 16.5v-3.75m18 0H3" />
                        </svg>
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