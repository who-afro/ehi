<div class="bg-white shadow rounded-lg">
    <div class="px-4 py-5">
        <dt class="font-medium text-gray-500 truncate">
            Program Area
        </dt>
        <dd class="text-gray-700 overflow-y-auto max-h-60 px-1">
            @foreach(App\Models\ProgramArea::all() as $programArea)
                <div class="flex items-start">
                    <div class="flex items-center">
                        <!-- Zero-width space character, used to align checkbox properly -->
                        &#8203;
                        <input id="program_area_{ $programArea->id }}" type="checkbox"
                               class="form-checkbox text-indigo-600 border-2 rounded-md shadow-sm h4 w4"
                               wire:model="filters.program_area_id"
                               value="{{ $programArea->id }}"/>
                    </div>
                    <label for="program_area_{ $programArea->id }}" class="ml-2 text-gray-700">
                        {{ $programArea->name }}
                    </label>
                </div>
            @endforeach
        </dd>
    </div>
</div>
