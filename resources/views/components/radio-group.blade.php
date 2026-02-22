<div>
    @if ($allOption)
        <x-label for="{{ $name }}" class="mb-1 flex items-center ">
            <input type="radio" name="{{ $name }}" value="" @checked(!request($name))>
            <span class="ml-2">All</span>
        </x-label>
    @endif

    @foreach ($optionsWithLabels as $label => $option)
        <x-label for="{{ $name }}" class="mb-1 flex items-center ">
            <input type="radio" name="{{ $name }}" value="{{ $option }}"  @checked($option === ($value ?? request($name)))>
            <span class="ml-2">{{ $label }}</span>
        </x-label>
    @endforeach

    @error($name)
        <div class="mt-1 text-xs text-red-500">
            {{ $message }}
        </div>
    @enderror

</div>
