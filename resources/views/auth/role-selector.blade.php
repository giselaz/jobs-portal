@props(['value' => old('role')])

<div class="mt-4">
    <label class="block text-sm font-medium text-gray-700 mb-2">
        Register as
    </label>

    <div class="grid grid-cols-2 gap-4">
        {{-- Candidate --}}
        <x-label
            class="cursor-pointer border rounded-lg p-4 hover:border-blue-500 transition
            {{ $value === 'candidate' ? 'border-blue-500 bg-blue-50' : 'border-gray-300' }}">

            <input type="radio" name="role" value="candidate" class="hidden"
                {{ $value === 'candidate' ? 'checked' : '' }}>

            <div class="text-center">
                <div class="text-lg font-semibold">Job Seeker</div>
                <div class="text-sm text-gray-500">
                    Apply for jobs and build your profile
                </div>
            </div>
        </x-label>

        {{-- Employer --}}
        <x-label
            class="cursor-pointer border rounded-lg p-4 hover:border-blue-500 transition
            {{ $value === 'employer' ? 'border-blue-500 bg-blue-50' : 'border-gray-300' }}">

            <input type="radio" name="role" value="employer" class="hidden"
                {{ $value === 'employer' ? 'checked' : '' }}>

            <div class="text-center">
                <div class="text-lg font-semibold">Employer</div>
                <div class="text-sm text-gray-500">
                    Post jobs and find candidates
                </div>
            </div>
        </x-label>
    </div>

    @error('role')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror
</div>
