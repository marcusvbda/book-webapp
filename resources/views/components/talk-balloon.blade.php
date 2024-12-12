<div class="absolute top-full left-0 w-full rounded-md bg-white border border-gray-200 transition-all duration-200 mt-5">
    <div class="relative w-full">
        <div class="absolute top-[-20px] left-7 w-8 h-5 overflow-hidden">
            <div class="size-6 bg-white border border-gray-200 rotate-45 transform origin-bottom-left"></div>
        </div>
        <div class="w-full max-h-72 overflow-y-auto px-4 py-4 modern-scrollbar scroll-auto-hide">
            {{ $slot }}
        </div>
    </div>
</div>
