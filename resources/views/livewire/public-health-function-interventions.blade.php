<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $publicHealthFunction->name }}
        </h2>
    </x-slot>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
            <dl class="mt-5 grid grid-cols-4 gap-2 max-h-72">
                <x-filters.age-cohort></x-filters.age-cohort>
                <x-filters.conditions></x-filters.conditions>
                <x-filters.level-of-care></x-filters.level-of-care>
            </dl>
        </div>
    </div>
    <x-search-and-export/>
    <x-loading-indicator/>
    <div class="flex flex-col" wire:loading.remove>
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-sm font-medium text-gray-900 uppercase whitespace-nowrap">
                                Program Area
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-sm font-medium text-gray-900 uppercase whitespace-nowrap">
                                Condition
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-sm font-medium text-gray-900 uppercase  whitespace-nowrap">
                                Age Cohort
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-900 uppercase">
                                Service Area
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-900 uppercase">
                                Intervention
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($interventions as $k => $v)
                            <tr class="{{ $loop->odd ? 'bg-white' : 'bg-gray-50' }}">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-left text-gray-500">
                                    <ul class="list-disc">
                                        @forelse($v->intervention->condition->programAreas as $i => $p)
                                            <li>{{$p->name}}</li>
                                        @empty

                                        @endforelse
                                    </ul>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-left text-gray-500">
                                    {{$v->intervention->condition->name}}
                                </td>
                                <td class="px-6 py-4 text-sm text-left text-gray-500">
                                    {{$v->intervention->ageCohort->name}}
                                </td>
                                <td class="px-6 py-4 text-sm text-left text-gray-500">
                                    {{$v->serviceArea->name}}
                                </td>
                                <td class="px-6 py-4 text-sm text-left text-gray-500">
                                    {{ $v->details}}
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


    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-16">
        {{ $interventions->links() }}
    </div>
</div>
