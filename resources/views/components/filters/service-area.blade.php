<div class="bg-white shadow rounded-lg">
    <div class="px-4 py-5">
        <dt class="font-medium text-gray-500 truncate">
            Service Area
        </dt>
        <dd class="text-gray-700 overflow-y-auto max-h-60 px-1">
            @foreach(App\Models\ServiceArea::all() as $serviceArea)
                <div class="flex items-start">
                    <div class="flex items-center">
                        <!-- Zero-width space character, used to align checkbox properly -->
                        &#8203;
                        <input id="service_area_{ $serviceArea->id }}" type="checkbox"
                               class="form-checkbox text-indigo-600 border-2 rounded-md shadow-sm h4 w4"
                               wire:model="filters.service_area_id"
                               value="{{ $serviceArea->id }}"/>
                    </div>
                    <label for="service_area_{ $serviceArea->id }}" class="ml-2 text-gray-700">
                        {{ $serviceArea->fullName }}
                    </label>
                </div>
            @endforeach
        </dd>
    </div>
</div>
