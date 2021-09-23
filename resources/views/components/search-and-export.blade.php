<div class="mx-auto font-semibold grid grid-cols-6 py-2 px-2">
    <div class="flex col-span-4">
        Download: <x-button.link wire:click="exportExcel" class="px-2 justify-center">
            <img src="{{ asset('svg/excel.svg') }}" alt="Download to Excel" />
        </x-button.link>
        <x-button.link wire:click="exportPDF" class="px-2 justify-center">
            <img src="{{ asset('svg/pdf.svg') }}" alt="Download to PDF" />
        </x-button.link>
        <p class="ml-4">Filtering by:</p>
        @foreach($filters as $key => $value)
            @if($value)
                @if(Str::contains($key, '_id'))
                    <button type="button" class="inline-flex items-center ml-2 px-2 py-1 border border-transparent text-base font-medium rounded-full shadow-sm text-black bg-iaho-yellow focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-iaho-yellow">
                        {{ trans("messages.pill_".$key) }}
                    </button>
                @endif
            @endif
        @endforeach
    </div>
    <div class="flex col-span-2 justify-around">
        <x-input.text wire:model="filters.search" placeholder="Search Interventions..."
                      class="px-2 rounded border appearance-none flex-1 w-80 placeholder-gray-300"/>
        <x-button.primary class="flex-initial bg-iaho-light-blue border-bg-iaho-light-blue text-white font-semibold text-lg rounded-xl ring-iaho-light-blue hover:bg-iaho-dark-blue focus:bg-iaho-dark-blue" wire:click="applyFilter">Search</x-button.primary>
    </div>
</div>
