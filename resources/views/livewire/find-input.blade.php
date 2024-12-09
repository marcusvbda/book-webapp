<div class="w-full relative" x-data="filterInputData" x-on:click.outside="open = false">
    <div class="relative w-full border overflow-hidden rounded-md border-gray-200">
        <input type="text" placeholder="{{ __('Find companies or services') }}" x-on:focus="open = true"
            x-on:input.debounce.500ms="filter = $event.target.value"
            class="block w-full border-none py-3 pl-12 pr-4 text-gray-500 placeholder:text-gray-300 focus:ring-0 rounded-md">
        <div class="pointer-events-none absolute inset-0 left-3 flex items-center">
            <x-icons.search class="size-6 text-gray-500" />
        </div>
    </div>
    <template x-if="open">
        <x-talk-balloon>
            <template x-if="loading">
                <div class="w-full flex items-center justify-center py-4 pb-6">
                    <x-spinner />
                </div>
            </template>
            <template x-if="!loading && !Object.keys(result).length">
                <div class="w-full">
                    <div class="w-full flex items-start">
                        <strong class="text-sm font-semibold text-gray-500">
                            {{ __('Popular services') }}
                        </strong>
                    </div>
                    <div class="flex flex-wrap gap-2 mt-2">
                        @foreach ($popularServiceList as $service)
                            <a href="#"
                                wire:click.prevent="$dispatchSelf('on-selected-service',['{{ __($service->value) }}'])"
                                class="text-sm font-semibold text-gray-600 bg-gray-200 rounded-md px-4 py-1">
                                {{ __($service->value) }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </template>
            <template x-if="!loading && Object.keys(result)">
                <template x-for="(resultKey, key) in Object.keys(result)" :key="key">
                    <div class="w-full">
                        <div class="w-full flex items-start">
                            <strong class="text-sm font-semibold text-gray-500">
                                <span x-text="resultKey"></span>
                            </strong>
                        </div>
                        <div class="flex flex-wrap gap-2 mt-2">
                            <template x-for="service in result[resultKey]">
                                <a href="#" x-on:click.prevent ="onSelectedService(service)"
                                    class="text-sm font-semibold text-gray-600 bg-gray-200 rounded-md px-4 py-1"
                                    x-text="service">
                                </a>
                            </template>
                        </div>
                    </div>
                </template>
            </template>
        </x-talk-balloon>
    </template>
</div>
@script
    <script>
        Alpine.data('filterInputData', () => {
            return {
                filter: '',
                open: false,
                loading: false,
                result: {},
                init() {
                    this.$watch('filter', () => {
                        if (this.filter == '') return this.result = {};
                        this.loading = true;
                        this.$wire.filterResults(this.filter).then((res) => {
                            this.result = res;
                            this.loading = false;
                        })
                    });
                },
                onSelectedService(service) {
                    this.$wire.selectService(service)
                }
            }
        })
    </script>
@endscript