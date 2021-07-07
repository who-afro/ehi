<div>
    <x-slot name="header">
            {{ $publicHealthFunction->name }} Interventions
    </x-slot>
    <div>
        <div class="max-w-7xl mx-auto p-4">
            <dl class="mt-5 grid grid-cols-4 gap-2 max-h-72">
                <x-filters.condition />
                <x-filters.age-cohort />
                <x-filters.level-of-care />
                <x-filters.service-area />
            </dl>
        </div>
    </div>
    <x-search-and-export :filters="$filters"></x-search-and-export>
    <x-loading-indicator/>
    <div class="flex flex-col" wire:loading.remove>
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg mx-4">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            @auth
                            <th scope="col" class="px-6 py-3 text-left font-medium text-gray-900 uppercase">
                                Actions
                            </th>
                            @endauth
                            <th scope="col"
                                class="px-6 py-3 text-left font-medium text-gray-900 uppercase">
                                Condition
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left font-medium text-gray-900 uppercase">
                                Age Cohort
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left font-medium text-gray-900 uppercase">
                               Level of Care
                            </th>
                            <th scope="col" class="px-6 py-3 text-left font-medium text-gray-900 uppercase">
                                Service Area
                            </th>
                            <th scope="col" class="px-6 py-3 text-left font-medium text-gray-900 uppercase">
                                Intervention
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($interventions as $k => $v)
                            <tr class="{{ $loop->odd ? 'bg-white' : 'bg-gray-50' }}">
                                @auth
                                    <td class="px-6 whitespace-nowrap text-left text-gray-500 whitespace-no-wrap">
                                        <a href="/nova/resources/intervention-service-areas/{{ $v->id }}/edit?viaResource&viaResourceId&viaRelationship" title="Edit Intervention" target="_blank"><x-heroicon-o-pencil class="h-6 w-6 text-indigo-600" />
                                        </a>
                                    </td>
                                @endauth
                                <td class="px-6 py-4 whitespace-nowrap text-left text-gray-500">
                                    {{$v->intervention->condition->name}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-left text-gray-500">
                                    {{$v->intervention->ageCohort->name}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-left text-gray-500">
                                    {{$v->intervention->levelOfCare->name}}
                                </td>
                                <td class="px-6 py-4 text-left text-gray-500">
                                    {{$v->serviceArea->fullName}}
                                </td>
                                <td class="px-6 py-4 text-left text-gray-500">
                                    {!! Str::markdown($v->details)!!}
                                </td>
                            </tr>
                        @empty
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-16 my-2">
        {{ $interventions->links() }}
    </div>
</div>
