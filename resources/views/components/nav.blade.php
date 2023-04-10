<nav class="flex items-center justify-between bg-iaho-deep-blue text-iaho-yellow text-xl"
     x-data="{open_age_cohort: false, open_level_of_care: false, open_public_health_function: false, open_condition: false}">
    <a href="{{ route("home") }}"
       class="px-4 py-2 hover:bg-iaho-yellow hover:text-iaho-dark-blue">
        <x-heroicon-o-home class="h-11"/>
    </a>
    @auth
        <a href="{{ url("nova") }}"
           class="px-4 py-2 hover:bg-iaho-yellow hover:text-iaho-dark-blue">
            <x-heroicon-o-cog class="h-11"/>
        </a>
    @endauth
    <div class="relative flex">
        <button
            class="px-8 py-4 inline-flex justify-start items-center font-semibold hover:bg-iaho-yellow hover:text-iaho-dark-blue focus:text-iaho-dark-blue focus:bg-iaho-yellow focus:outline-none"
            x-on:click="open_condition = true"
            type="button">
            Disease Condition
            <x-heroicon-o-chevron-down class="w-4 ml-1"/>
        </button>
        <div class="absolute top-full left-0 bottom-0 z-10 shadow-xl bg-iaho-dark-blue w-[540px]"
             x-cloak
             x-show="open_condition">
            <div class="bg-iaho-yellow text-iaho-deep-blue px-2 font-light flex">
                Condition grouping from the WHO Global burden of diseases
                <a class="text-base font-semibold justify-end whitespace-nowrap px-2 py-1"
                   href="{{ route('condition-overview')}}">Learn more</a>
            </div>
        @foreach(\App\Models\ProgramGroup::all() as $group)
            @if(count($group->conditions) > 0)
                <!-- This width here prevents the relative blocks for the group names from breaking the scrolling of the conditions -->
                    <div class="grid grid-cols-2 dropdown relative w-[240px] bg-iaho-map-country-background" x-on:click.away="open_condition = false">
                    <span class="p-2 w-[240px] text-left bg-iaho-map-country-background text-iaho-dark-blue focus:outline-none hover:bg-iaho-dark-blue hover:text-iaho-yellow focus:bg-blue-700 focus:text-white dropdown inline-block"
                        type="button">
                        {{ $group->name }}
                    </span>
                        <div class="absolute ml-[240px] w-[606px] bg-iaho-map-country-background"></div>
                        <div class="dropdown-content absolute hidden ml-[240px] w-[606px] overflow-y-scroll flex flex-row bg-iaho-dark-blue align-top">
                            @foreach($group->conditions->sortBy('name') as $condition)
                                <a class="text-white p-2 inline-block hover:bg-iaho-light-blue hover:font-semibold w-[300px]"
                                   href="{{ route('condition', ['condition_id' => $condition->id]) }}">
                                    {{ $condition->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <div class="relative flex">
        <button
            class="px-8 py-4 inline-flex justify-start items-center font-semibold hover:bg-iaho-yellow hover:text-iaho-dark-blue focus:text-iaho-dark-blue focus:bg-iaho-yellow focus:outline-none"
            x-on:click="open_age_cohort = true"
            type="button">Age Cohort
            <x-heroicon-o-chevron-down class="w-4 ml-1"/>
        </button>
        <div class="absolute left-0 top-full -mt-11 z-10 shadow-xl w-[400px]"
             x-cloak
             x-show="open_age_cohort"
             x-on:click.away="open_age_cohort = false">
            <div class="bg-iaho-yellow text-iaho-deep-blue px-4 font-light mt-11 flex justify-between">
                Age based grouping of patients
                <a class="text-base font-semibold justify-end whitespace-nowrap ml-6"
                   href="{{ route('age-cohort-overview') }}">Learn more</a>
            </div>
            <div class="text-left flex flex-col">
                @foreach(\App\Models\AgeCohort::all() as $agecohort)
                    <a class="p-2 bg-iaho-map-country-background text-iaho-dark-blue hover:bg-iaho-dark-blue hover:text-iaho-yellow"
                       href="{{ route('age-cohort', ['age_cohort_id' => $agecohort->id]) }}">{{ $agecohort->name }}</a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="relative flex">
        <button
            class="px-8 py-4 inline-flex justify-start items-center font-semibold hover:bg-iaho-yellow hover:text-iaho-dark-blue focus:text-iaho-dark-blue focus:bg-iaho-yellow focus:outline-none"
            x-on:click="open_level_of_care = true"
            type="button">Level of Care
            <x-heroicon-o-chevron-down class="w-4 ml-1"/>
        </button>
        <div class="absolute top-full left-0 -mt-11 z-10 shadow-xl w-[400px]"
             x-cloak
             x-show="open_level_of_care"
             x-on:click.away="open_level_of_care = false">
            <div class="bg-iaho-yellow text-iaho-deep-blue px-4 font-light mt-11 flex justify-between">
                Locations where service delivery occurs
                <a class="text-base font-semibold justify-end whitespace-nowrap ml-6"
                   href="{{ route('level-of-care-overview') }}">Learn more</a>
            </div>
            <div class="text-left flex flex-col">
                @foreach(\App\Models\LevelOfCare::all() as $level_of_care)
                    <a class="p-2 bg-iaho-map-country-background text-iaho-dark-blue hover:bg-iaho-dark-blue hover:text-iaho-yellow"
                       href="{{ route('level-of-care', ['level_of_care_id' => $level_of_care->id]) }}">{{ $level_of_care->name }}</a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="relative flex">
        <button
            class="px-8 py-4 inline-flex justify-start items-center font-semibold hover:bg-iaho-yellow hover:text-iaho-dark-blue focus:text-iaho-dark-blue focus:bg-iaho-yellow focus:outline-none"
            x-on:click="open_public_health_function = true"
            type="button">Public Health Function
            <x-heroicon-o-chevron-down class="w-4 ml-1"/>
        </button>
        <div class="absolute right-0 top-full -mt-11 z-10 shadow-xl w-[420px]"
             x-cloak
             x-show="open_public_health_function"
             x-on:click.away="open_public_health_function = false">
            <div class="bg-iaho-yellow text-iaho-deep-blue px-4 font-light mt-11 flex justify-between">
                Groupings of interventions within the scope of public health response
                <a class="text-base font-semibold justify-end whitespace-nowrap ml-6"
                   href="{{ route('public-health-function-overview') }}">Learn more</a>
            </div>
            <div class="text-left flex flex-col">
                @foreach(\App\Models\PublicHealthFunction::sorted()->get() as $public_health_function)
                    <a class="p-2 bg-iaho-map-country-background text-iaho-dark-blue hover:bg-iaho-dark-blue hover:text-iaho-yellow"
                       href="{{ route('public-health-function', ['public_health_function_id' => $public_health_function->id]) }}">{{ $public_health_function->name }}</a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="relative flex">
        <a href="{{ route('build-essential-package') }}"
            class="px-8 py-4 inline-flex justify-start items-center font-semibold hover:bg-iaho-yellow hover:text-iaho-dark-blue focus:text-iaho-dark-blue focus:bg-iaho-yellow focus:outline-none"
            type="button">Build Package
            <x-zondicon-box class="w-4 ml-1"/>
        </a>
    </div>
</nav>
