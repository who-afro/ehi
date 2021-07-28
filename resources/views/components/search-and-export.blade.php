<div class="max-w-7xl mx-auto font-semibold grid grid-cols-5 gap-4 py-4">
    <div class="col-span-3">
        <x-input.text wire:model="filters.search" placeholder="Search Interventions..."
                      class="p-2 rounded border w-full appearance-none"/>
    </div>
    <div class="flex flex-row gap gap-x-2 col-span-2">
        <x-button.primary wire:click="applyFilter">Apply</x-button.primary>
        <x-button.secondary wire:click="resetFilters">Reset Filters</x-button.secondary>
        <x-button.link wire:click="exportExcel" class="px-2">
            <x-far-file-excel class="w-6 text-green-700" />
        </x-button.link>
        <x-button.link wire:click="exportPDF" class="px-2">
            <x-far-file-pdf class="w-6 text-red-600" />
        </x-button.link>
    </div>
    <div class="flex flex-row gap col-span-5 whitespace-nowrap">
        Filtering by:
        @foreach($filters as $key => $value)
            @if($value)
                @if(Str::contains($key, '_id'))
                    <button type="button" class="inline-flex items-center ml-3 px-3 py-1.5 border border-transparent text-sm font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ trans("messages.pill_".$key) }}
                    </button>
                @endif
            @endif
        @endforeach
    </div>
</div>
