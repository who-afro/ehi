<x-app-layout>
    <x-slot name="header">
            {{ __('Public Health Function') }}
    </x-slot>

    <div class="max-w-7xl mx-auto prose">
        <p>This thematic area covers public health based interventions</p>
        @foreach(App\Models\PublicHealthFunction::all() as $publicHealthFunction)
            <h2>{{ $publicHealthFunction->name }}</h2>
            <p>
                {!! Str::markdown($publicHealthFunction->description) !!}
            </p>
            <a href="/public-health-function/${{ $publicHealthFunction->id }}" title="{{ $publicHealthFunction->name }}" class="flex items-center">
                <x-far-hand-point-right class="mr-3 h-6 w-6 text-blue-500 group-hover:text-blue-600"/>
                Click here to view the {{ $publicHealthFunction->name }} interventions
            </a>
        @endforeach
    </div>
</x-app-layout>
