<div x-show="open" x-transition
    class=" absolute top-8 right-2 w-56 origin-top-right rounded-md bg-white shadow-lg outline-1 outline-black/5 transition transition-discrete">
    <ul class="py-1" class="flex flex-col space-y-5">
        {{ $slot }}
    </ul>
</div>
