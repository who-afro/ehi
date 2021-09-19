<x-app-layout>
    <x-slot name="header">
        {{ __('Disease Condition') }}
    </x-slot>

    <div class="max-w-7xl mx-auto">
        <p class="text-2xl">
            The program areas in the digital toolkit are derived from the WHO Global burden of diseases, click on a
            program area to show details
        </p>
        <div class="mt-4 text-xl">
            @foreach(App\Models\ProgramArea::has('conditions')->get() as $programArea)
                <div class="grid grid-cols-3 border-t-2 border-iaho-light-blue py-4">
                    <div class="align-top text-2xl font-semibold flex flex-col">
                        {{ $programArea->name }}
                        <img src="{{ $programArea->icon_url }}" alt="{{ $programArea->name }}" class="w-20 align-middle" />
                    </div>

                    <div class="col-span-2 grid grid-cols-2">
                        @foreach($programArea->conditions as $condition)
                            <a class="font-semibold text-iaho-light-blue p-2" href="{{ route('condition', ['program_area_id' => $programArea->id, 'condition_id' => $condition->id]) }}">{{ $condition->name }}</a>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
