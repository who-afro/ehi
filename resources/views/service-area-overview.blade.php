<x-app-layout>
    <x-slot name="header">
            {{ __('Service Areas') }}
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 prose">
        The services areas are in the categories listed below:
        <ol>
            @foreach(App\Models\ServiceArea::whereNull('parent_id')->with('childServiceAreas')->get() as $serviceArea)
                <li>
                    <a href="{{ route('service-area', ['service_area_id' => $serviceArea->id]) }}">{{ $serviceArea->name }}</a>
                    <ul>
                        @forelse($serviceArea->childServiceAreas as $i => $childServiceArea)
                            <li><a href="{{ route('service-area', ['service_area_id' => $childServiceArea->id]) }}">{{ $childServiceArea->name }}</a></li>
                        @empty
                        @endforelse
                    </ul>
                </li>
            @endforeach
        </ol>
    </div>
</x-app-layout>
