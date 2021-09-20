<nav class="flex items-center justify-between bg-iaho-deep-blue text-iaho-yellow text-xl">
    <a href="{{ route("home") }}"
       class="px-4 hover:bg-iaho-yellow hover:text-iaho-dark-blue inline-flex items-center justify-center">
        <x-heroicon-o-home class="h-8"/>
    </a>
    <div x-data="{open_condition: false}" class="inline-block relative">
        <button class="inline-flex items-center font-semibold"
            x-on:click="open_condition = true; open_age_cohort = false; open_level_of_care = false; open_public_health_function = false"
            type="button">
            Disease Condition<x-heroicon-o-chevron-down class="w-4 ml-1"/>
        </button>
        <div class="absolute origin-bottom-left mt-2 z-10 shadow-xl w-[540px]"
             x-cloak
             x-show="open_condition">
            <div class="bg-iaho-yellow text-iaho-deep-blue px-2 text-lg font-light flex">
                Condition grouping from the WHO Global burden of diseases
                <a class="text-base font-semibold justify-end whitespace-nowrap px-2 py-1" href="{{ route('condition-overview')}}">Learn more</a>
            </div>
            @foreach(\App\Models\ProgramGroup::all() as $group)
                @php
                    $conditions = DB::table('conditions')
                        ->select(['conditions.id', DB::raw('JSON_UNQUOTE(JSON_EXTRACT(conditions.name, "$.en")) as condition_name'), 'program_area_conditions.condition_id', 'program_area_conditions.program_area_id', 'program_areas.program_group_id'])
                        ->join('program_area_conditions', 'conditions.id', '=', 'program_area_conditions.condition_id')
                        ->join('program_areas', 'program_area_conditions.program_area_id', '=', 'program_areas.id')
                        ->where('program_areas.program_group_id', $group->id)
                        ->orderBy('condition_name')
                        ->get();
                @endphp
                @if(count($conditions) > 0)
            <!-- This width here prevents the relative blocks for the group names from breaking the scrolling of the conditions -->
                <div class="grid grid-cols-2 dropdown relative text-lg w-[240px]">
                    <span class="p-2 w-[240px] text-left bg-iaho-map-country-background text-iaho-dark-blue focus:outline-none hover:bg-iaho-dark-blue hover:text-iaho-yellow focus:bg-blue-700 focus:text-white dropdown inline-block"
                        type="button">
                        {{ $group->name }}
                    </span>
                    <div class="dropdown-content absolute hidden ml-[240px] w-[300px] h-96 overflow-y-scroll">
                        @foreach($conditions as $condition)
                            <a class="bg-iaho-dark-blue text-white block p-2 hover:bg-iaho-light-blue hover:font-semibold"
                               href="{{ route('condition', ['condition_id' => $condition->id]) }}">{{ $condition->condition_name }}</a>
                        @endforeach
                    </div>
                </div>
            @endif
            @endforeach
        </div>
    </div>
    <div class="relative flex px-4 text-lg" x-data="{open_age_cohort: false}">
        <button
            class="inline-flex justify-start text-left p-2 font-semibold tracking-tight transition hover:bg-iaho-yellow hover:text-iaho-dark-blue focus:bg-iaho-yellow focus:outline-none focus:ring-offset-2 focus:ring-offset-iaho-dark-blue focus:ring-2 focus:ring-white focus:ring-inset"
            x-on:click="open_age_cohort = true; open_condition = false; open_level_of_care = false; open_public_health_function = false"
            type="button">Age Cohort<x-heroicon-o-chevron-down class="w-4 ml-1"/>
        </button>
        <div class="absolute origin-bottom-left shadow-xl w-[320px]"
             x-cloak
             x-show="open_age_cohort">
            <div class="bg-iaho-yellow text-iaho-deep-blue px-2 font-light mt-11 flex">
                Age based grouping of patients
                <a class="text-base font-semibold justify-end whitespace-nowrap" href="{{ route('age-cohort-overview') }}">Learn more</a>
            </div>
            <div class="text-left flex flex-col">
                @foreach(\App\Models\AgeCohort::all() as $agecohort)
                    <a class="p-2 bg-iaho-map-country-background text-iaho-dark-blue hover:bg-iaho-dark-blue hover:text-iaho-yellow"
                       href="{{ route('age-cohort', ['age_cohort_id' => $agecohort->id]) }}">{{ $agecohort->name }}</a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="relative flex px-4 text-lg" x-data="{open_level_of_care: false}">
        <button
            class="inline-flex justify-start text-left p-2 font-semibold tracking-tight transition hover:bg-iaho-yellow hover:text-iaho-dark-blue focus:bg-iaho-yellow focus:outline-none focus:ring-offset-2 focus:ring-offset-iaho-dark-blue focus:ring-2 focus:ring-white focus:ring-inset"
            x-on:click="open_level_of_care = true; open_condition = false; open_age_cohort = false; open_public_health_function = false"
            type="button">Level of Care<x-heroicon-o-chevron-down class="w-4 ml-1"/>
        </button>
        <div class="absolute origin-bottom-left shadow-xl w-[320px]"
             x-cloak
             x-show="open_level_of_care">
            <div class="bg-iaho-yellow text-iaho-deep-blue px-2 font-light mt-11 flex">
                Locations where service delivery occurs
                <a class="text-base font-semibold justify-end whitespace-nowrap" href="{{ route('level-of-care-overview') }}">Learn more</a>
            </div>
            <div class="text-left flex flex-col">
                @foreach(\App\Models\LevelOfCare::all() as $level_of_care)
                    <a class="p-2 bg-iaho-map-country-background text-iaho-dark-blue text-xl hover:bg-iaho-dark-blue hover:text-iaho-yellow"
                       href="{{ route('level-of-care', ['level_of_care_id' => $level_of_care->id]) }}">{{ $level_of_care->name }}</a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="relative flex px-4 text-lg" x-data="{open_public_health_function: false}">
        <button
            class="inline-flex justify-start text-left p-2 font-semibold tracking-tight transition hover:bg-iaho-yellow hover:text-iaho-dark-blue focus:text-iaho-dark-blue focus:bg-iaho-yellow focus:outline-none focus:ring-offset-2 focus:ring-offset-iaho-dark-blue focus:ring-2 focus:ring-white focus:ring-inset"
            x-on:click="open_public_health_function = true; open_level_of_care = false; open_condition = false; open_age_cohort = false"
            type="button">Public Health Function<x-heroicon-o-chevron-down class="w-4 ml-1"/>
        </button>
        <div class="absolute origin-bottom-left shadow-xl w-[320px] right-4"
             x-cloak
             x-show="open_public_health_function">
            <div class="bg-iaho-yellow text-iaho-deep-blue px-2 font-light mt-11 flex">
                Groupings of interventions within the scope of public health response
                <a class="text-base font-semibold justify-end whitespace-nowrap" href="{{ route('public-health-function-overview') }}">Learn more</a>
            </div>
            <div class="text-left flex flex-col">
                @foreach(\App\Models\PublicHealthFunction::all() as $public_health_function)
                    <a class="p-2 bg-iaho-map-country-background text-iaho-dark-blue hover:bg-iaho-dark-blue hover:text-iaho-yellow"
                       href="{{ route('public-health-function', ['public_health_function_id' => $public_health_function->id]) }}">{{ $public_health_function->name }}</a>
                @endforeach
            </div>
        </div>
    </div>
</nav>
