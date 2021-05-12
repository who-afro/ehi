<div class="bg-white shadow rounded-lg">
    <div class="px-4 py-5">
        <dt class="font-medium text-gray-500 truncate">
            Age Cohort
        </dt>
        <dd class="mt-1 text-gray-700 px-1">
            @foreach(App\Models\AgeCohort::all() as $ageCohort)
                <div class="flex items-start">
                    <div class="flex items-center">
                        <!-- Zero-width space character, used to align checkbox properly -->
                        &#8203;
                        <input id="age_cohort_{{$ageCohort->id}}" type="checkbox" class="form-checkbox indigo-600 border-2 rounded-md shadow-sm" wire:model="filters.age_cohort_id" value="{{ $ageCohort->id }}" /></div>
                    <label for="age_cohort_{{$ageCohort->id}}" class="ml-2 text-gray-700">{{ $ageCohort->name }}</label>
                </div>
            @endforeach
        </dd>
    </div>
</div>
