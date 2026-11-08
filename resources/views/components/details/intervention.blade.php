<div>
    @foreach($interventionGroups as $condition_id => $condition_interventions)
        @if($condition_interventions->isNotEmpty())
            <div class="align-middle min-w-full border-b border-gray-200">
                <div class="bg-white text-xs">&nbsp;</div>
                <div class="text-xl font-semibold px-2 py-4 rounded-t-xl bg-iaho-deep-blue text-white">
                    Condition: {{ $conditionLabels->get($condition_id)?->name }}
                </div>
                @foreach( $referenceAgeCohorts as $age_cohort)
                    @php
                        $age_cohort_interventions = $condition_interventions->get($age_cohort->id, collect())
                    @endphp
                    <div class="text-xl font-semibold px-2 py-4 bg-iaho-dark-blue text-white">
                        Age Cohort: {{ $age_cohort->name }}
                    </div>
                        <table class="min-w-full border-t border-t-gray-200 divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        @auth
                            <th scope="col" class="px-6 py-3 text-left font-medium text-gray-900">
                                Actions
                            </th>
                        @endauth
                        @foreach( $referencePublicHealthFunctions as $public_health_function)
                            <th scope="col"
                                class="p-2 text-left font-medium text-gray-900 whitespace-nowrap">
                                {{ $public_health_function->name }}
                            </th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $referenceLevelsOfCare as $level_of_care)
                        @php
                            $level_of_care_interventions = $age_cohort_interventions->get($level_of_care->id, collect())
                        @endphp
                        <tr class="bg-iaho-dark-blue">
                            @auth
                                <td class="p-2 text-left text-white font-medium whitespace-nowrap">

                                </td>
                            @endauth
                            <td colspan="6"
                                class="p-2 text-left text-lg text-white font-medium whitespace-nowrap">{{ $level_of_care->name }}
                            </td>
                        </tr>
                        <tr>
                            @auth
                                <td class="px-6 whitespace-nowrap">
                                    <div class="flex items-center justify-center">

                                    </div>
                                </td>
                            @endauth

                            @foreach( $referencePublicHealthFunctions as $public_health_function)
                                <td class="px-6 py-4 text-left text-base align-top bg-iaho-map-country-background bg-opacity-60">
                                    @foreach($level_of_care_interventions->get($public_health_function->id, collect()) as $intervention)
                                        <span class="intervention-details{{ $intervention->confirmed_with_evidence ? ' text-iaho-green' : '' }}">{!! $intervention->rendered_details !!}</span>
                                    @endforeach
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @endforeach
            </div>
        @endif
    @endforeach
</div>
