<div>
    <x-slot name="header">
            {{ $levelOfCare->name }} Interventions
    </x-slot>
    <div class="mx-auto mb-2" x-data="{ refine_search: true }">
        <div class="flex justify-between text-white font-semibold bg-iaho-dark-blue rounded-t-xl">
            <p class="text-2xl px-4 py-2">Refine your search</p>
            <p class="w-32 cursor-pointer flex justify-end x-4 py-2" x-show="!refine_search" x-on:click="refine_search = true">
                <x-heroicon-o-chevron-down class="w-10"/>
            </p>
            <p class="w-32 cursor-pointer flex justify-end px-4 py-2" x-show="refine_search" x-cloak x-on:click="refine_search = false">
                <x-heroicon-o-chevron-up class="w-10"/>
            </p>
        </div>
        <dl class="grid grid-cols-3 max-h-80 bg-white divide-x divide-iaho-dark-blue"
            x-cloak x-show="refine_search">
                <x-filters.condition />
                <x-filters.age-cohort />
                <x-filters.public-health-function />
            </dl>
        </div>
    <x-search-and-export :filters="$filters"/>
    <x-loading-indicator/>
    <div class="flex flex-col" wire:loading.remove>
        <div class="align-middle inline-block min-w-full border-b border-gray-200">
            <div class="text-xl font-semibold py-4 px-2 rounded-t-xl bg-iaho-dark-blue text-white">Results</div>
                    <table class="min-w-full border-t border-t-gray-200 divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            @auth
                                <th scope="col" class="px-6 py-3 text-left font-medium text-gray-900">
                                    Actions
                                </th>
                            @endauth
                            <th scope="col"
                                class="px-6 py-3 text-left font-medium text-gray-900 whitespace-nowrap">
                                Condition
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left font-medium text-gray-900 whitespace-nowrap">
                                Age Cohort
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left font-medium text-gray-900 whitespace-nowrap">
                                Public Health Function
                            </th>
                            <th scope="col" class="px-6 py-3 text-left font-medium text-gray-900">
                                Intervention
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($interventions as $k => $v)
                            <tr class="{{ $loop->odd ? 'bg-white' : 'bg-gray-50' }}">
                                @auth
                                    <td class="px-6 whitespace-nowrap text-left text-gray-500 whitespace-no-wrap">
                                        <a href="/nova/resources/interventions/{{ $v->id }}/edit?viaResource&viaResourceId&viaRelationship" title="Edit Intervention" target="_blank"><x-heroicon-o-pencil class="h-6 w-6 text-indigo-600" />
                                        </a>
                                    </td>
                                @endauth
                                <td class="px-6 py-4 text-left text-gray-500">
                                    <a href="{{ route('condition', ['condition_id' => $v->condition->id]) }}" class="text-blue-700 group-hover:text-blue-900">{{$v->condition->name}}</a>
                                </td>
                                <td class="px-6 py-4 text-left text-gray-500">
                                    <a href="{{ route('age-cohort', ['age_cohort_id' => $v->ageCohort->id]) }}" class="text-blue-700 group-hover:text-blue-900">{{$v->ageCohort->name}}</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-left text-gray-500">
                                    <a href="{{ route('public-health-function', ['public_health_function_id' => $v->publicHealthFunction->id]) }}" class="text-blue-700 group-hover:text-blue-900">{{$v->publicHealthFunction->name}}</a>
                                </td>
                                <td class="px-6 py-4 text-left text-gray-500 bg-iaho-map-country-background {{ $loop->odd ? 'bg-opacity-30' : 'bg-opacity-60' }}">
                                    {!! Str::markdown($v->details)!!}
                                </td>
                            </tr>
                        @empty
                        @endforelse
                        </tbody>
                    </table>
        </div>
    </div>
    <div class="mx-auto sm:px-6 lg:px-8 mb-16 my-4">
        {{ $interventions->links() }}
    </div>
</div>
