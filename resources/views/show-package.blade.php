<div class="text-lg">
    <x-slot name="header">
        Download Essential Package
    </x-slot>
    <div class="p-2">
        Download the package you have created
    </div>


    <div class="flex flex-col px-2">
        <div class="flex justify-between justify-end p-4">
            <x-button.secondary x-on:click="step--"
                                class="px-8 py-2 w-40 flex bg-iaho-red text-white text-lg hover:text-white">
                <x-heroicon-o-chevron-left class="w-6 text-white"/>
                Previous
            </x-button.secondary>
            <x-button.primary wire:click="save"
                              class="px-8 py-2 whitespace-nowrap flex bg-iaho-light-blue border-iaho-light-blue text-lg hover:bg-iaho-dark-blue">
                Save Package
                <x-heroicon-o-check-circle class="w-6"/>
            </x-button.primary>
        </div>
    </div>
</div>
