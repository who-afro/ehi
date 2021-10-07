<x-app-layout>
    <style>
        /* TODO: Find a way of overriding prose styles without having to add custom styles in the page like here*/
        .prose p {
            margin-top: 0;
        }
    </style>
    <x-slot name="header">
        {{ __('Level of Care (Service Delivery)') }}
    </x-slot>
    <div class="max-w-7xl prose px-4">
        <p class="text-2xl">This thematic area covers the areas in which service delivery occurs</p>
        @foreach(App\Models\LevelOfCare::all() as $levelOfCare)
            <h2 class="text-2xl font-semibold">{{ $levelOfCare->name }}</h2>
            <div class="flex">
                <img src="{{ $levelOfCare->icon_url }}" alt="{{ $levelOfCare->name }}" class="mr-4 w-96 !mt-2 self-start"/>
                <div class="text-xl px-4 !mt-1">
                    {!! Str::markdown($levelOfCare->description) !!}
                    <a href="/level-of-care/{{ $levelOfCare->id }}" title="{{ $levelOfCare->name }}"
                       class="flex items-center">
                        <x-far-hand-point-right class="mr-3 h-6 w-6 text-blue-500 group-hover:text-blue-600"/>
                        Click here to view the {{ $levelOfCare->name }} interventions
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
