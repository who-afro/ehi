<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('WHO African Region: Menu of Essential Interventions') }}
        </h2>
    </x-slot>
    <x-interventions-filter></x-interventions-filter>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 font-semibold grid grid-cols-4 gap-4">
        <div class="col-span-3">
            <x-input.text wire:model="filters.search" placeholder="Search Interventions..." class="p-2 rounded border w-full appearance-none"/>
        </div>
        <div class="">
            <x-button.primary wire:click="applyFilter">Apply</x-button.primary>
            <x-button.secondary wire:click="resetFilters">Reset Filters</x-button.secondary>
        </div>
    </div>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @forelse($interventions as $k => $v)
                <div>
                    <div class="bg-white shadow overflow-hidden sm:rounded-lg my-5">
                        <div class="px-4 py-5 sm:px-6">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Intervention
                            </h3>
                        </div>
                        <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                            <dl class="sm:divide-y sm:divide-gray-200">
                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Condition
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{$v->condition->name}}
                                    </dd>
                                </div>
                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Age Cohort
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{$v->ageCohort->name}}
                                    </dd>
                                </div>
                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Public Health Function
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{$v->publicHealthFunction->name}}
                                    </dd>
                                </div>
                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Level of Care
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{$v->interventionLevel->name}}
                                    </dd>
                                </div>
                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Details
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {!! $v["details"]  !!}
                                    </dd>
                                </div>
                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Program Areas
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <ul class="list-disc">
                                        @forelse($v->programAreas as $k => $p)
                                            <li>{{$p->name}}</li>
                                            @empty
                                                <i>No assigned program areas</i>
                                        @endforelse
                                        </ul>

                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            @empty
                <div class="mt-8">No Interventions found for the specified criteria</div>
            @endforelse
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{ $interventions->links() }}
        </div>
    </div>
</div>
