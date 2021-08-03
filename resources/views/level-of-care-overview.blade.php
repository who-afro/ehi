<x-app-layout>
    <x-slot name="header">
            {{ __('Level of Care (Service Delivery)') }}
    </x-slot>
    <div class="max-w-7xl prose">
        <p>This thematic area covers the areas in which service delivery occurs</p>
        @foreach(App\Models\LevelOfCare::all() as $levelOfCare)
            <h2>{{ $levelOfCare->name }}</h2>
            <p>
                {{ \Illuminate\Mail\Markdown::parse($levelOfCare->description) }}
            </p>
            <a href="/level-of-care/${{ $levelOfCare->id }}" title="{{ $levelOfCare->name }}" class="flex items-center">
                <x-far-hand-point-right class="mr-3 h-6 w-6 text-blue-500 group-hover:text-blue-600"/>
                Click here to view the {{ $levelOfCare->name }} interventions
            </a>
        @endforeach
    </div>
</x-app-layout>
