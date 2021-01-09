<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('WHO Menu of Essential Interventions') }}
        </h2>
    </x-slot>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
            <dl class="mt-5 grid grid-cols-4 gap-4">
                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate">
                            Age Cohort
                        </dt>
                        <dd class="mt-1 text-3xl font-semibold text-gray-900">
                            <x-input.select class="p-2 rounded border w-full appearance-none" wire:model="filters.age_cohort_id" id="filter-age_cohort_id" placeholder="Select an Age Cohort">

                                @foreach(App\Models\AgeCohort::all() as $ageCohort)
                                    <option value="{{$ageCohort->id}}">{{$ageCohort->name}}</option>
                                @endforeach
                            </x-input.select>
                        </dd>
                    </div>
                </div>
                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate">
                            Conditions
                        </dt>
                        <dd class="mt-1 text-3xl font-semibold text-gray-900">
                            <x-input.select class="p-2 rounded border w-full appearance-none" wire:model="filters.condition_id" id="filter-condition_id" placeholder="Select a Condition">

                                @foreach(App\Models\Condition::all() as $condition)
                                    <option value="{{$condition->id}}">{{$condition->name}}</option>
                                @endforeach
                            </x-input.select>
                        </dd>
                    </div>
                </div>
                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate">
                            Public Health Function
                        </dt>
                        <dd class="mt-1 text-3xl font-semibold text-gray-900">
                            <x-input.select class="p-2 rounded border w-full appearance-none" wire:model="filters.public_health_function_id" id="filter-public_health_function_id" placeholder="Select Public Health Function">

                                @foreach(App\Models\PublicHealthFunction::all() as $publicHealthFunction)
                                    <option value="{{$publicHealthFunction->id}}">{{$publicHealthFunction->name}}</option>
                                @endforeach
                            </x-input.select>
                        </dd>
                    </div>
                </div>
                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate">
                            Intervention Level
                        </dt>
                        <dd class="mt-1 text-3xl font-semibold text-gray-900">
                            <x-input.select class="p-2 rounded border w-full appearance-none" wire:model="filters.intervention_level_id" id="filter-intervention_level_id" placeholder="Select Intervention Level">

                                @foreach(App\Models\InterventionLevel::all() as $interventionLevel)
                                    <option value="{{$interventionLevel->id}}">{{$interventionLevel->name}}</option>
                                @endforeach
                            </x-input.select>
                        </dd>
                    </div>
                </div>
            </dl>
        </div>
    </div>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between my-5">
                <div class="w-2/4 flex space-x-4">
                    <x-input.text wire:model="filters.search" placeholder="Search Interventions..."/>
                </div>
            </div>
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
                                        Intervention Level
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
                            </dl>
                        </div>
                    </div>
                </div>
            @empty
                No Interventions found for the specified criteria
            @endforelse
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{ $interventions->links() }}
        </div>
    </div>
</div>
