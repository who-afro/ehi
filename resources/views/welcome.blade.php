<x-app-layout>
    <div class="max-w-7xl mx-auto bg-local bg-cover h-[720px]"
         style="background-image: url({{ asset('img/home-page-background.svg') }})">
        <div class="grid grid-cols-6">
            <div class="h-full"
                 style="background-image: url({{ asset('img/iaho-pattern.svg') }}); transform:scaleX(-1); background-repeat: repeat-y">
            </div>
            <div class="col-span-3 flex text-2xl">
                <x-input.text wire:model="filters.search" placeholder="Search Interventions..."
                              class="p-4 rounded border appearance-none flex-1 w-72 h-8 mt-[600px] text-2xl"/>
                <x-button.primary class="flex-none mx-4 mt-[600px] text-xl p-4">Apply</x-button.primary>
            </div>
            <div class="flex flex-col justify-end col-span-2 h-full">
                <span class="text-6xl text-iaho-yellow font-extrabold my-10">
                    Welcome to the iAHO digital toolkit of essential health services
                </span>
                <span class="text-4xl text-white my-18">
                    Your one-stop shop to help you search and compile health interventions across the WHO African Region
                </span>
            </div>
        </div>
    </div>
</x-app-layout>
