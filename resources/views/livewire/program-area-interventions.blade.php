<div>
    <x-slot name="header">
           Program Area Interventions for {{ $programArea->name }}
    </x-slot>
    <div>
        <div class="mx-auto pb-4">
            <dl class="mt-5 grid grid-cols-5 gap-2 max-h-72">
                <x-filters.age-cohort />
                <x-filters.condition :programAreaId="$programArea->id" />
                <x-filters.public-health-function />
                <x-filters.level-of-care />
            </dl>
        </div>
    </div>
    <x-search-and-export :filters="$filters"/>
    <x-loading-indicator/>
    <div class="flex flex-col" wire:loading.remove>
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
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
                                Public Health Function
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
                            <tr class="{{ $loop->odd ? 'bg-white' : 'bg-gray-50' }} @php  $text_color = $v->confirmed_with_evidence ? 'text-iaho-green':'{{ $text_color }}' @endphp">
                                @auth
                                    <td class="px-6 whitespace-nowrap text-left {{ $text_color }} whitespace-no-wrap">
                                        <a href="/nova/resources/interventions/{{ $v->id }}/edit?viaResource&viaResourceId&viaRelationship" title="Edit Intervention" target="_blank"><x-heroicon-o-pencil class="h-6 w-6 text-indigo-600" />
                                        </a>
                                    </td>
                                @endauth
                                    <td class="px-6 py-4 text-left {{ $text_color }}">
                                        <a href="{{ route('condition', ['condition_id' => $v->condition->id, 'program_area_id' => $v->condition->programAreas[0]->id]) }}" class="{{ $text_color }} group-hover:text-blue-900">{{$v->condition->name}}</a>
                                </td>
                                <td class="px-6 py-4 text-left {{ $text_color }}">
                                    <a href="{{ route('age-cohort', ['age_cohort_id' => $v->ageCohort->id]) }}" class="{{ $text_color }} group-hover:text-blue-900">{{$v->ageCohort->name}}</a>
                                </td>
                                <td class="px-6 py-4 text-left {{ $text_color }}">
                                    <a href="{{ route('public-health-function', ['public_health_function_id' => $v->publicHealthFunction->id]) }}" class="{{ $text_color }} group-hover:text-blue-900">{{$v->publicHealthFunction->name}}</a>
                                </td>
                                <td class="px-6 py-4 text-left {{ $text_color }}">
                                    <a href="{{ route('level-of-care', ['level_of_care_id' => $v->levelOfCare->id]) }}" class="{{ $text_color }} group-hover:text-blue-900">{{$v->levelOfCare->name}}</a>
                                </td>
                                <td class="px-6 py-4 text-left {{ $text_color }}">
                                    <a href="{{ route('service-area', ['service_area_id' => $v->serviceArea->id]) }}" class="{{ $text_color }} group-hover:text-blue-900">{{$v->serviceArea->fullName}}</a>
                                </td>
                                <td class="px-6 py-4 text-left {{ $text_color }}">
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

    <div class="mx-auto sm:px-6 lg:px-8 mb-16 my-2">
        {{ $interventions->links() }}
    </div>
</div>
