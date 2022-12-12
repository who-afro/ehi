<div>
    @php
        $group_interventions = $condition->interventions;
        $all_age_cohorts = \App\Models\AgeCohort::all();
       $age_cohorts = $group_interventions->unique('age_cohort_id')->pluck('age_cohort_id');
       $levels_of_care = \App\Models\LevelOfCare::all();
       $public_health_functions = \App\Models\PublicHealthFunction::all();
    @endphp

    @foreach($age_cohorts as $age_cohort_id)
        @php
            $age_cohort_interventions = $group_interventions->where('age_cohort_id', $age_cohort_id)
        @endphp
        @if($age_cohort_interventions->isNotEmpty())
            <div class="align-middle min-w-full border-b border-gray-200">
                <div class="bg-white text-xs">&nbsp;</div>
                <div class="text-xl font-semibold px-2 py-4 rounded-t-xl bg-iaho-deep-blue text-white"> Age
                    Cohort: {{ $all_age_cohorts->find($age_cohort_id)->name }}
                </div>
                <table class="min-w-full border-t border-t-gray-200 divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        @auth
                            <th scope="col" class="px-6 py-3 text-left font-medium text-gray-900">
                                Actions
                            </th>
                        @endauth
                        @foreach( $public_health_functions as $public_health_function)
                            <th scope="col"
                                class="p-2 text-left font-medium text-gray-900 whitespace-nowrap">
                                {{ $public_health_function->name }}
                            </th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $levels_of_care as $level_of_care)
                        @php
                            $level_of_care_interventions = $age_cohort_interventions->where('level_of_care_id', $level_of_care->id)
                        @endphp
                        @if($level_of_care_interventions->isNotEmpty())
                            <tr class="bg-iaho-dark-blue">
                                @auth
                                    <td class="p-2 text-left text-white font-medium whitespace-nowrap">

                                    </td>
                                @endauth
                                <td colspan="5"
                                    class="p-2 text-left text-white font-medium whitespace-nowrap">{{ $level_of_care->name }}
                                </td>
                            </tr>

                            <tr>
                                @auth
                                    <td class="px-6 whitespace-nowrap {{ $text_color }}">
                                        <div class="flex items-center justify-center">
                                            <a href="/nova/resources/interventions/{{ $v->id }}/edit?viaResource&viaResourceId&viaRelationship"
                                               title="Edit Intervention" target="_blank">
                                                <x-heroicon-o-pencil class="h-6 w-6 text-indigo-600"/>
                                            </a>
                                            <button type="button" class="cursor-pointer w-12 px-4"
                                                    onclick="confirm('Are you sure you want to delete this Intervention?') || stopImmediatePropagation()"
                                                    wire:click="deleteIntervention({{$v->id}})">
                                                <x-heroicon-o-trash class="h-6 w-6 text-indigo-600"
                                                                    title="Delete Intervention"/>
                                            </button>
                                        </div>
                                    </td>
                                @endauth
                                @foreach( $public_health_functions as $public_health_function)
                                    <td class="px-6 py-4 text-left align-top bg-iaho-map-country-background bg-opacity-60">
                                        @foreach($level_of_care_interventions->where('public_health_function_id', $public_health_function->id) as $intervention)
                                            {!! Str::markdown($intervention->details)!!}
                                        @endforeach
                                    </td>
                                @endforeach
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    @endforeach
</div>
