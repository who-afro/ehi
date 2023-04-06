<div>
    @php
       $age_cohorts = $interventions->unique('age_cohort_id')->pluck('age_cohort_id');
       # $interventions = $interventions->groupBy(['condition_id', 'age_cohort_id', 'level_of_care_id', 'public_health_function_id']);
       $levels_of_care = \App\Models\LevelOfCare::all();
       $public_health_functions = \App\Models\PublicHealthFunction::all();
    @endphp

    @foreach($age_cohorts as $age_cohort_id)
        @php
            $age_cohort_interventions = $interventions->where('age_cohort_id', $age_cohort_id)
        @endphp
        @if($age_cohort_interventions->isNotEmpty())
            <div class="align-middle min-w-full border-b border-gray-200">
                <div class="bg-white text-xs">&nbsp;</div>
                <div class="text-xl font-semibold px-2 py-4 rounded-t-xl bg-iaho-deep-blue text-white"> Age
                    Cohort: {{ \App\Models\AgeCohort::find($age_cohort_id)->name }}
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
                            <tr class="bg-iaho-dark-blue">
                                @auth
                                    <td class="p-2 text-left text-white font-medium whitespace-nowrap">

                                    </td>
                                @endauth
                                <td colspan="6"
                                    class="p-2 text-left text-white font-medium whitespace-nowrap">{{ $level_of_care->name }}
                                </td>
                            </tr>
                            <tr>
                                @auth
                                    <td class="px-6 whitespace-nowrap">
                                        <div class="flex items-center justify-center">

                                        </div>
                                    </td>
                                @endauth
                                @foreach( $public_health_functions as $public_health_function)
                                    @php
                                        # $public_health_interventions = $level_of_care_interventions->where('public_health_function_id', $public_health_function->id)->groupBy(['condition_id', 'age_cohort_id', 'level_of_care_id', 'public_health_function_id']);
                                        $public_health_interventions = $level_of_care_interventions->where('public_health_function_id', $public_health_function->id);
                                        $interventions_data = array();
                                        foreach ($public_health_interventions as $intervention) {
                                            $detail = '<span class="intervention-details'.($intervention->confirmed_with_evidence? ' text-iaho-green':'').'">'.Str::markdown($intervention->details)."</span>";
                                            if (array_key_exists($intervention->public_health_function_id, $interventions_data)) {
                                                $interventions_data[$intervention->public_health_function_id] = $interventions_data[$intervention->public_health_function_id].$detail;
                                            } else {
                                                $interventions_data[$intervention->public_health_function_id] = $detail;
                                            }
                                        }

                                    @endphp
                                        @foreach($interventions_data as $data )
                                            <td class="px-6 py-4 text-left align-top bg-iaho-map-country-background bg-opacity-60">
                                              {!! $data!!}
                                            </td>
                                        @endforeach
                                @endforeach
                            </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    @endforeach
</div>
