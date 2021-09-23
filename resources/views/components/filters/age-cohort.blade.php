<div>
    <dt class="text-xl font-semibold text-iaho-dark-blue py-2 px-4 bg-iaho-map-country-background opacity-75">
        Age Cohort
    </dt>
    <dd class="text-gray-700 px-4">
        @foreach(App\Models\AgeCohort::all() as $ageCohort)
            <div class="flex items-start">
                <div class="flex items-center">
                    <!-- Zero-width space character, used to align checkbox properly -->
                    &#8203;
                    <input id="age_cohort_{{$ageCohort->id}}" type="checkbox"
                           class="form-checkbox indigo-600 border-2 rounded-md shadow-sm"
                           wire:model="filters.age_cohort_id" value="{{ $ageCohort->id }}"/></div>
                <label for="age_cohort_{{$ageCohort->id}}" class="ml-2 text-gray-700">{{ $ageCohort->name }}</label>
            </div>
        @endforeach
    </dd>
</div>
