<x-app-layout>
    <x-slot name="header">
        Age Cohorts
    </x-slot>
    <div class="max-w-7xl mx-auto prose">
        <p>The age cohorts covered in this menu of interventions are</p>
        @foreach(App\Models\AgeCohort::all() as $ageCohort)
            <h2>{{ $ageCohort->name }}</h2>
            <p>
                {{ \Illuminate\Mail\Markdown::parse($ageCohort->description) }}
            </p>
            <a href="/age-cohort/${{ $ageCohort->id }}" title="{{ $ageCohort->name }}" class="flex items-center">
                <x-far-hand-point-right class="mr-3 h-6 w-6 text-blue-500 group-hover:text-blue-600"/>
                Click here to view the {{ $ageCohort->name }} interventions
            </a>
        @endforeach
    </div>
</x-app-layout>
