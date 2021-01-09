<div class="flex flex-col">
    <div class="flex flex-row justify-between">
        <h1 class="text-2xl font-semibold text-gray-900">{{ $title }}</h1>

        <div>
            <x-lean::button design="danger" wire:click="delete">
                {{ $this->resource()::trans('show.delete') }}
            </x-lean::button>

            <x-lean::button href="{{ $editRoute }}">
                {{ $this->resource()::trans('show.edit') }}
            </x-lean::button>
        </div>
    </div>

    <div class="sm:divide-y divide-solid divide-gray-200">
        @foreach($this->fields as $field)
            <div>
                <x-lean::field-group :field="$field">
                    <x-dynamic-component
                        :component="$field->getComponent()"
                        :field="$field"
                        :attributes="$field->getAttributes()"
                    />
                </x-lean::field-group>
            </div>
        @endforeach
    </div>

    <div>
        <x-lean::button design="secondary" @click="window.history.back()">
            {{ $this->resource()::trans('back') }}
        </x-lean::button>
    </div>
</div>
