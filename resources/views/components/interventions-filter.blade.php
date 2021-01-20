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
