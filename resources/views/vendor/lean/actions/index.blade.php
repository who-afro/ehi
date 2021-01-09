<div class="flex flex-col">
    <div class="flex flex-row justify-between">
        <h1 class="text-2xl font-semibold text-gray-900">{{ $this->resource()::pluralLabel() }}</h1>
        <x-lean::button href="{{ $this->createRoute }}" icon="heroicon-o-plus">
            {{ $this->resource()::trans('index.new') }}
        </x-lean::button>
    </div>

    <div class="mt-1">
        <div class="mt-1 relative rounded-md shadow-sm">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <input wire:model="search" type="text" class="form-input block w-full pl-10 sm:text-sm sm:leading-5" placeholder="{{ $this->resource()::trans('index.search') }}">
        </div>
    </div>


    <div class="flex flex-col mt-4">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block w-full sm:px-6 lg:px-8">
                @if($results->isEmpty())
                    {{ $this->resource()::trans('index.no_results') }}
                @else
                <div class="shadow overflow-auto border-b border-gray-200 sm:rounded-lg">
                    <table class="w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                @foreach($this->fields as $field)
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        {{ $field->getLabel() }}
                                    </th>
                                @endforeach
                                <th class="px-6 py-3 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    {{-- Actions --}}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($results as $result)
                                @if($loop->odd)
                                    <tr class="bg-white">
                                @else
                                    <tr class="bg-gray-50">
                                @endif
                                    @foreach($this->fieldsFor($result) as $field)
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            {{-- The reason we always pass :attributes is that the you may want
                                                 to set attributes on a field, and they should be merged with
                                                 the other attributes that will be in the shared $attributes
                                                 variable inside the child component.

                                                For example:

                                                Pikaday::make('created_at')->attributes(['class' => 'my custom styles'])

                                                That said, any state directly related to the field's behavior
                                                should be accessed using the $field property. Attributes
                                                should not be used for accessing the field's data.
                                            --}}

                                            <x-lean::field
                                                :field="$field"
                                                class="text-sm leading-5 font-medium text-gray-900"
                                            />
                                        </td>
                                    @endforeach

                                    {{-- Buttons --}}
                                    <td class="px-6 py-4 whitespace-no-wrap flex items-center justify-end">
                                        {{-- Show --}}
                                        <x-lean::link
                                            :href="route('lean.resource.show', ['resource' => $resource, 'id' => $result->getKey()])"
                                            class="flex items-center text-gray-500 group"
                                        >
                                            @svg('heroicon-o-eye', ['class' => 'w-4 h-4 text-gray-400 group-hover:text-purple-400'])
                                            <span class="ml-1 text-sm group-hover:text-purple-600">
                                                {{ $this->resource()::trans('index.show') }}
                                            </span>
                                        </x-lean::link>

                                        {{-- Edit --}}
                                        <x-lean::link
                                            :href="route('lean.resource.edit', ['resource' => $resource, 'id' => $result->getKey()])"
                                            class="flex items-center text-gray-500 group ml-4"
                                        >
                                            @svg('heroicon-o-pencil-alt', ['class' => 'w-4 h-4 text-gray-400 group-hover:text-purple-400'])
                                            <span class="ml-1 text-sm group-hover:text-purple-600">
                                                {{ $this->resource()::trans('index.edit') }}
                                            </span>
                                        </x-lean::link>

                                        {{-- Delete --}}
                                        <x-lean::link
                                            wire:click="delete({{ $result->id }})"
                                            class="flex items-center text-gray-500 group ml-4 cursor-pointer"
                                        >
                                            @svg('heroicon-o-trash', ['class' => 'w-4 h-4 text-gray-400 group-hover:text-purple-400'])
                                            <span class="ml-1 text-sm group-hover:text-purple-600">
                                                {{ $this->resource()::trans('index.delete') }}
                                            </span>
                                        </x-lean::link>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="mt-6">
        {{ $results->links('lean::pagination') }}
    </div>
</div>
