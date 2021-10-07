<x-app-layout>
    <x-slot name="header">
        <p class="px-2">Age Cohorts</p>
    </x-slot>
    <div class="max-w-7xl prose px-4">
        <div class="flex">
            <p class="text-2xl">The age Cohorts represent the different stages of the human life cycle. They represent an
                approach to health service delivery since each age cohort has special needs that relate to the development
                phase they are passing through e.g., pregnant women have different health needs as compared to elderly
                persons etc.<br/><br/>
            The interventions menu of interventions elaborated in this toolkit are based on the life cohorts while also
                considering the cross-cutting interventions, encompassing the expectations of entire population</p>
            <img src="{{ asset('svg/overview-age-cohort.svg') }}" class="h-64 justify-self-end px-6" alt="Age Cohort Overview" />
        </div>

        @foreach(App\Models\AgeCohort::all() as $ageCohort)
            <h2 class="text-2xl font-semibold">{{ $ageCohort->name }}</h2>
            <div class="flex">
                <img src="{{ $ageCohort->icon_url }}" alt="{{ $ageCohort->name }}" class="mr-4 w-96 !mt-2 self-start"/>
                <div class="text-xl px-4 !mt-1">
                    {!!  Str::markdown($ageCohort->description) !!}
                    <a href="/age-cohort/{{ $ageCohort->id }}" title="{{ $ageCohort->name }}" class="flex items-center">
                        <x-far-hand-point-right class="mr-3 h-6 w-6 text-blue-500 group-hover:text-blue-600"/>
                        Click here to view the {{ $ageCohort->name }} interventions
                    </a>
                </div>
            </div>

        @endforeach
    </div>
</x-app-layout>
