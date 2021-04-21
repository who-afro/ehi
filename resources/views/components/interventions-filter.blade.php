<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
        <dl class="mt-5 grid grid-cols-4 gap-4">
            <div class="bg-white shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <dt class="text-sm font-medium text-gray-500 truncate">
                        Age Cohort
                    </dt>
                    <dd class="mt-1 text-3xl font-semibold text-gray-900">
                        <x-input.select-multiple class="p-2 rounded border w-full appearance-none" wire:model="filters.age_cohort_id" id="filter-age_cohort_id" placeholder="Select an Age Cohort">

                            @foreach(App\Models\AgeCohort::all() as $ageCohort)
                                <option value="{{$ageCohort->id}}">{{$ageCohort->name}}</option>
                            @endforeach
                        </x-input.select-multiple>
                    </dd>
                </div>
            </div>
            <div class="bg-white shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <dt class="text-sm font-medium text-gray-500 truncate">
                        Conditions
                    </dt>
                    <dd class="mt-1 text-3xl font-semibold text-gray-900">
                        <x-input.select-multiple class="p-2 rounded border w-full appearance-none" wire:model="filters.condition_id" id="filter-condition_id" placeholder="Select a Condition">

                            @foreach(App\Models\Condition::all() as $condition)
                                <option value="{{$condition->id}}">{{$condition->name}}</option>
                            @endforeach
                        </x-input.select-multiple>
                    </dd>
                </div>
            </div>
            <div class="bg-white shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <dt class="text-sm font-medium text-gray-500 truncate">
                        Public Health Function
                    </dt>
                    <dd class="mt-1 text-3xl font-semibold text-gray-900">
                        <x-input.select-multiple class="p-2 rounded border w-full appearance-none" wire:model="filters.public_health_function_id" id="filter-public_health_function_id" placeholder="Select Public Health Function">

                            @foreach(App\Models\PublicHealthFunction::all() as $publicHealthFunction)
                                <option value="{{$publicHealthFunction->id}}">{{$publicHealthFunction->name}}</option>
                            @endforeach
                        </x-input.select-multiple>
                    </dd>
                </div>
            </div>
            <div class="bg-white shadow rounded-lg">
                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate">
                            Program Area
                        </dt>
                        <dd class="mt-1 text-3xl font-semibold text-gray-900">
                            <x-input.select-multiple class="p-2 rounded border w-full appearance-none" wire:model="filters.program_area_id" id="filter-program_area_id" placeholder="Select an Program Area">

                                @foreach(App\Models\ProgramArea::all() as $programArea)
                                    <option value="{{$programArea->id}}">{{$programArea->name}}</option>
                                @endforeach
                            </x-input.select-multiple>
                        </dd>
                    </div>
                </div>
                <!-- TODO: Determine if we need to keep hiding the level of care especially for the page filters -->
                <div class="px-4 py-5 sm:p-6 hidden">
                    <dt class="text-sm font-medium text-gray-500 truncate">
                        Level of Care
                    </dt>
                    <dd class="mt-1 text-3xl font-semibold text-gray-900">
                        <x-input.select class="p-2 rounded border w-full appearance-none" wire:model="filters.level_of_care_id" id="filter-level_of_care_id" placeholder="Select Level of Care">

                            @foreach(App\Models\LevelOfCare::all() as $interventionLevel)
                                <option value="{{$interventionLevel->id}}">{{$interventionLevel->name}}</option>
                            @endforeach
                        </x-input.select>
                    </dd>
                </div>
            </div>
        </dl>

    </div>
</div>
