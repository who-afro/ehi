@if(isset($programAreaId))
    @php
        $conditions = \App\Models\ProgramArea::find($programAreaId)->conditions()->get();
    @endphp
@else
    @php
        $conditions = \App\Models\Condition::all();
    @endphp
@endif

<div>
    <dt class="text-xl font-semibold text-iaho-dark-blue px-4 py-2 bg-iaho-map-country-background opacity-75">
        Conditions
    </dt>
    <dd class="mt-1 text-gray-700 overflow-y-scroll max-h-60 px-4">
        @forelse($conditions as $condition)
            <div class="flex items-start">
                <div class="flex items-center">
                    <!-- Zero-width space character, used to align checkbox properly -->
                    &#8203;
                    <input id="condition_{{ $condition->id }}" type="checkbox"
                           class="form-checkbox indigo-600 border-2 rounded-md shadow-sm"
                           wire:model="filters.condition_id" value="{{ $condition->id }}"/>
                </div>
                <label for="condition_{{ $condition->id }}" class="ml-2 text-gray-700">{{ $condition->name }}</label>
            </div>
        @empty
            <span class="italic text-gray-400">No conditions for {{ $programAreaName }}</span>
        @endforelse
    </dd>
</div>
