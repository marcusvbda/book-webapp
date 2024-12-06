<div class="w-full relative" x-data="{ open: false }" x-on:click.outside="open = false">
    <div class="relative w-full border overflow-hidden rounded-md border-black">
        <input type="text" placeholder="{{ __('Find companies or services') }}" x-on:focus="open = true"
            class="block w-full border-none py-3 pl-12 pr-4 text-gray-500 placeholder:text-gray-300 focus:ring-0 rounded-md">
        <div class="pointer-events-none absolute inset-0 left-3 flex items-center">
            <x-icons.search class="size-6 text-gray-500" />
        </div>
    </div>
    <template x-if="open">
        <x-talk-balloon>
            <div class="w-full flex items-start">
                <strong class="text-sm font-semibold text-gray-500">{{ __('Popular services') }}</strong>
            </div>
        </x-talk-balloon>
    </template>
</div>
