<x-app-layout>
    <x-slot name="header">
            {{ __('Service Areas') }}
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 prose">
        The services areas are in the categories listed below:
        <ol>
            @foreach(App\Models\ServiceArea::whereNull('parent_id')->with('childServiceAreas')->get() as $serviceArea)
                <li>
                    {{ $serviceArea->name }} - <span class="text-gray-400">{{ $serviceArea->description }}</span>
                    <ul>
                        @forelse($serviceArea->childServiceAreas as $i => $childServiceArea)
                            <li><a href="{{ route('service-area', ['service_area_id' => $serviceArea->id]) }}">{{ $childServiceArea->name }}</a> - <span class="text-gray-400">{{ $childServiceArea->description }}</span></li>
                        @empty
                        @endforelse
                    </ul>
                </li>
            @endforeach
        </ol>
    </div>
</x-app-layout>
