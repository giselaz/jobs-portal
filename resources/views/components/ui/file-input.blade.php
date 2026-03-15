   <input type="file" name="{{ $name }}" id="{{ $name }}" accept="{{ $accept }}"
       {{ $attributes->class([
           "mt-1.5 block w-full text-sm text-slate-500
                                          file:mr-4 file:py-2 file:px-4
                                          file:rounded-md file:border-0
                                          file:text-sm file:font-semibold
                                          file:bg-violet-50 file:text-violet-700
                                          hover:file:bg-violet-100
                                          ",
           'opacity-50 cursor-not-allowed pointer-events-none' => isset($processing) && $processing,
       ]) }}
       {{ isset($processing) && $processing ? 'disabled' : '' }} />
