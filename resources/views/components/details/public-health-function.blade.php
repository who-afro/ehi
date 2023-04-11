<div>
    @php
        $conditions = $interventions->unique('condition_id')->pluck('condition_id');
        $age_cohorts = \App\Models\AgeCohort::all();
        $levels_of_care = \App\Models\LevelOfCare::all();
    @endphp

    @foreach($conditions as $condition_id)
        @php
            $condition_interventions = $interventions->where('condition_id', $condition_id)
        @endphp
        @if($condition_interventions->isNotEmpty())
            <div class="align-middle min-w-full border-b border-gray-200">
                <div class="bg-white text-xs">&nbsp;</div>
                <div class="text-xl font-semibold px-2 py-4 rounded-t-xl bg-iaho-deep-blue text-white">
                    Condition: {{ \App\Models\Condition::find($condition_id)->name }}
                </div>
                <table class="min-w-full border-t border-t-gray-200 divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        @auth
                            <th scope="col" class="px-6 py-3 text-left font-medium text-gray-900">
                                Actions
                            </th>
                        @endauth
                        @foreach( $levels_of_care as $level_of_care)
                            <th scope="col"
                                class="p-2 text-left font-medium text-gray-900 whitespace-nowrap">
                                {{ $level_of_care->name }}
                            </th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $age_cohorts as $age_cohort)
                        @php
                            $age_cohort_interventions = $condition_interventions->where('age_cohort_id', $age_cohort->id)
                        @endphp
                        <tr class="bg-iaho-dark-blue">
                            @auth
                                <td class="p-2 text-left text-white font-medium whitespace-nowrap">

                                </td>
                            @endauth
                            <td colspan="6"
                                class="p-2 text-left text-lg text-white font-medium whitespace-nowrap">{{ $age_cohort->name }}
                            </td>
                        </tr>
                        <tr>
                            @auth
                                <td class="px-6 whitespace-nowrap">
                                    <div class="flex items-center justify-center">

                                    </div>
                                </td>
                            @endauth

                            @foreach( $levels_of_care as $level_of_care)
                                @php
                                    $public_health_interventions = $age_cohort_interventions->where('level_of_care_id', $level_of_care->id);
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
                                <td class="px-6 py-4 text-left text-base align-top bg-iaho-map-country-background bg-opacity-60">
                                    {!! Arr::get($interventions_data, $level_of_care->id, '')!!}
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    @endforeach
</div>
