<div>
    <dt class="text-lg font-semibold text-iaho-dark-blue py-2 px-4 bg-iaho-map-country-background opacity-75">
        Public Health Function
    </dt>
    <dd class="text-gray-700 text-base px-4">
        @foreach(App\Models\PublicHealthFunction::all()->sortBy('sort_order') as $publicHealthFunction)
            <div class="flex items-start">
                <div class="flex items-center">
                    <!-- Zero-width space character, used to align checkbox properly -->
                    &#8203;
                    <input id="public_health_function_{{ $publicHealthFunction->id }}" type="checkbox"
                           class="form-checkbox indigo-600 border-2 rounded-md shadow-sm"
                           wire:model="filters.public_health_function_id" value="{{ $publicHealthFunction->id }}"/>
                </div>
                <label for="public_health_function_{{ $publicHealthFunction->id }}"
                       class="ml-2 text-gray-700">{{ $publicHealthFunction->name }}</label>
            </div>
        @endforeach
    </dd>
</div>
