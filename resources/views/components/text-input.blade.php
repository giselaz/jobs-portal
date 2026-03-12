<div class="relative">
    @if ($type !== 'textarea')
        @if ($formRef)
            <button type="button" class=" absolute right-0 top-0 flex h-full items-center pr-2"
                x-on:click="$refs['input-{{ $name }}'].value=''; $refs['{{ $formRef }}'].submit();">
                <x-heroicon-o-x-circle class="size-4" />

            </button>
        @endif
        {{-- {{ dd($errors); }} --}}
        <input x-ref="input-{{ $name }}" type="{{ $type }}" placeholder="{{ $placeholder }}"
            name="{{ $name }}" value="{{ old($name, $value) }}" id="{{ $name }}"
            {{ $attributes->merge([
                'class' =>
                    'w-full rounded-md border-0 py-1.5 px-2.5 pr-8 text-sm ring-1 placeholder:text-slate-400 focus:ring-violet-600 ' .
                    (!$errors->has($name) ? 'ring-slate-300 focus:ring-violet-600' : 'ring-red-500 focus:ring-red-500'),
            ]) }} />

    @else 
        <textarea name="{{ $name }}" id="{{ $name }}" cols="30" rows="10"
            @class([
                'w-full rounded-md border-0 py-1.5 px-2.5 pr-8 text-sm ring-1 placeholder:text-slate-400 focus:ring-2',
                // default
                'ring-slate-300 focus:ring-slate-400' => !$errors->has($name),
            
                // error
                'ring-red-500 focus:ring-red-500' => $errors->has($name),
            ])>{{ old($name, $value) }}</textarea>
    @endif
    @error($name)
        <div class="mt-1 text-xs text-red-500">
            {{ $message }}
        </div>
    @enderror
</div>
