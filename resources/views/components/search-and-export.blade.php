<div class="max-w-7xl mx-auto font-semibold grid grid-cols-5 py-4 px-2">
    <div class="flex col-span-3">
        Download: <x-button.link wire:click="exportExcel" class="px-2 justify-center">
            <x-far-file-excel class="w-8 text-green-700" />
        </x-button.link>
        <x-button.link wire:click="exportPDF" class="px-2 justify-center">
            <x-far-file-pdf class="w-8 text-red-600" />
        </x-button.link>
        <p class="ml-4">Filtering by:</p>
        @foreach($filters as $key => $value)
            @if($value)
                @if(Str::contains($key, '_id'))
                    <button type="button" class="inline-flex items-center ml-2 px-2 py-1 border border-transparent text-sm font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ trans("messages.pill_".$key) }}
                    </button>
                @endif
            @endif
        @endforeach
    </div>
    <div class="flex col-span-2 justify-between">
        <x-input.text wire:model="filters.search" placeholder="Search Interventions..."
                      class="p-2 rounded border appearance-none flex-1 w-80"/>
        <x-button.primary class="flex-initial" wire:click="applyFilter">Apply</x-button.primary>
        <x-button.secondary class="flex-initial" wire:click="resetFilters">Reset Filters</x-button.secondary>
    </div>
</div>
