<div>
    <dt class="text-xl font-semibold text-iaho-dark-blue py-2 px-4 bg-iaho-map-country-background opacity-75">
        Level of Care
    </dt>
    <dd class="text-gray-700 px-4">
        @foreach(App\Models\LevelOfCare::all() as $levelOfCare)
            <div class="flex items-start">
                <div class="flex items-center">
                    <!-- Zero-width space character, used to align checkbox properly -->
                    &#8203;
                    <input id="level_of_care_{ $levelOfCare->id }}" type="checkbox"
                           class="form-checkbox text-indigo-600 border-2 rounded-md shadow-sm h4 w4"
                           wire:model="filters.level_of_care_id"
                           value="{{ $levelOfCare->id }}"/>
                </div>
                <label for="level_of_care_{ $levelOfCare->id }}" class="ml-2 text-gray-700">
                    {{ $levelOfCare->name }}
                </label>
            </div>
        @endforeach
    </dd>
</div>
