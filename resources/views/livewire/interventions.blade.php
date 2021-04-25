<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('WHO African Region: Menu of Essential Interventions') }}
        </h2>
    </x-slot>
    <x-interventions-filter></x-interventions-filter>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 font-semibold grid grid-cols-4 gap-4">
        <div class="col-span-3">
            <x-input.text wire:model="filters.search" placeholder="Search Interventions..."
                          class="p-2 rounded border w-full appearance-none"/>
        </div>
        <div class="flex flex-row gap gap-x-2">
            <x-button.primary wire:click="applyFilter">Apply</x-button.primary>
            <x-button.secondary wire:click="resetFilters">Reset Filters</x-button.secondary>
            <x-far-file-excel class="w-6 text-green-700" /><x-far-file-pdf class="w-6 text-red-600" />
        </div>
    </div>
    <div>
        <x-interventions-display.table :interventions="$interventions"></x-interventions-display.table>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-16">
            {{ $interventions->links() }}
        </div>
    </div>
</div>
