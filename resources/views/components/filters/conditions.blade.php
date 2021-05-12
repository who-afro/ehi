<div class="bg-white shadow rounded-lg">
    <div class="py-5 px-4">
        <dt class="font-medium text-gray-500 truncate">
            Conditions
        </dt>
        <dd class="mt-1 text-gray-700 overflow-y-auto max-h-60 px-1">
            @foreach(App\Models\Condition::all() as $condition)
                <div class="flex items-start">
                    <div class="flex items-center">
                        <!-- Zero-width space character, used to align checkbox properly -->
                        &#8203;
                        <input id="condition_{{ $condition->id }}" type="checkbox" class="form-checkbox indigo-600 border-2 rounded-md shadow-sm" wire:model="filters.condition_id" value="{{ $condition->id }}" />
                    </div>
                    <label for="condition_{{ $condition->id }}" class="ml-2 text-gray-700">{{ $condition->name }}</label>
                </div>
            @endforeach
        </dd>
    </div>
</div>
