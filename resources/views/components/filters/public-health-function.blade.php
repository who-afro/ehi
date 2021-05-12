<div class="bg-white shadow rounded-lg">
    <div class="px-4 py-5">
        <dt class="font-medium text-gray-500 truncate">
            Public Health Function
        </dt>
        <dd class="mt-1 text-gray-700 px-1">
            @foreach(App\Models\PublicHealthFunction::all() as $publicHealthFunction)
                <div class="flex items-start">
                    <div class="flex items-center">
                        <!-- Zero-width space character, used to align checkbox properly -->
                        &#8203;
                        <input id="public_health_function_{{ $publicHealthFunction->id }}" type="checkbox" class="form-checkbox indigo-600 border-2 rounded-md shadow-sm" wire:model="filters.public_health_function_id" value="{{ $publicHealthFunction->id }}"/>
                    </div>
                    <label for="public_health_function_{{ $publicHealthFunction->id }}" class="ml-2 text-gray-700">{{ $publicHealthFunction->name }}</label>
                </div>
            @endforeach
        </dd>
    </div>
</div>
