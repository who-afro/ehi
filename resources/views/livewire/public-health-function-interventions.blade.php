<div>
    <x-slot name="header">
        {{ $publicHealthFunction->name }} Interventions
    </x-slot>
    <div class="mx-auto mb-2" x-data="{ refine_search: true }">
        <div class="flex justify-between text-white font-semibold bg-iaho-dark-blue rounded-t-xl">
            <p class="text-2xl px-4 py-2">Refine your search</p>
            <p class="w-32 cursor-pointer flex justify-end x-4 py-2" x-show="!refine_search" x-on:click="refine_search = true">
                <x-heroicon-o-chevron-down class="w-10"/>
            </p>
            <p class="w-32 cursor-pointer flex justify-end px-4 py-2" x-show="refine_search" x-cloak x-on:click="refine_search = false">
                <x-heroicon-o-chevron-up class="w-10"/>
            </p>
        </div>
        <dl class="grid grid-cols-4 max-h-80 bg-white divide-x divide-iaho-dark-blue"
            x-cloak x-show="refine_search">
            <x-filters.condition/>
            <x-filters.age-cohort/>
            <x-filters.level-of-care/>
            <x-filters.confirmed-with-evidence/>
        </dl>
    </div>
    <x-search-and-export :filters="$filters"></x-search-and-export>
    <x-loading-indicator/>
    <div class="flex flex-col overflow-y-auto" wire:loading.remove>
        <x-details.public-health-function :filters="$filters" :interventions="$interventions"></x-public-health-function-deta>
    </div>
    <div class="mx-auto sm:px-6 lg:px-8 mb-16 my-4">
        {{ $interventions->links() }}
    </div>
</div>
