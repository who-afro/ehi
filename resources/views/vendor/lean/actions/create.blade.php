<div class="flex flex-col">
    <h1 class="text-2xl font-semibold text-gray-900">{{ $this->resource()::trans('create.title') }}</h1>

    <div class="sm:divide-y divide-solid divide-gray-200">
        @foreach($this->fields as $field)
            <div>
                <x-lean::field-group :field="$field" :errors="$errors->get($field->name)">
                    <x-lean::field
                        :field="$field"
                        :wire:model.lazy='"fieldMetadata.{$field->name}.value"'
                    />
                </x-lean::field-group>
            </div>
        @endforeach
    </div>

    <div class="flex justify-end">
        <x-lean::button design="secondary" @click="window.history.back()">
            {{ $this->resource()::trans('back') }}
        </x-lean::button>

        <div class="ml-2">
            <x-lean::button wire:click="submit">
                {{ $this->resource()::trans('create.submit') }}
            </x-lean::button>
        </div>
    </div>
</div>
