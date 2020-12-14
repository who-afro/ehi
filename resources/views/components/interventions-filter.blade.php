<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
        <form wire:submit.prevent="save" method="post">
            <dl class="mt-5 grid grid-cols-4 gap-4">
                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate">
                            Age Cohort
                        </dt>
                        <dd class="mt-1 text-3xl font-semibold text-gray-900">
                            <select name="age_cohort_id" class="p-2 rounded border w-full appearance-none"
                                    wire:model="filter.age_cohort_id">

                                <option value="">
                                    Select an Age Cohort
                                </option>

                                <option value="2">
                                    &lt; 5 years
                                </option>
                                <option value="4">
                                    12 - 24 years
                                </option>
                                <option value="5">
                                    25 - 59 years
                                </option>
                                <option value="3">
                                    5 - 11 years
                                </option>
                                <option value="6">
                                    60+ years
                                </option>
                                <option value="1">
                                    Reproductive and newborn
                                </option>
                            </select>
                        </dd>
                    </div>
                </div>

                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate">
                            Conditions
                        </dt>
                        <dd class="mt-1 text-3xl font-semibold text-gray-900">
                            <select name="condition_id" class="p-2 rounded border w-full appearance-none"
                                    wire:model="filter.condition_id">

                                <option value="">
                                    Select a Condition
                                </option>

                                <option value="3">
                                    Encephalitis
                                </option>
                                <option value="4">
                                    Measles
                                </option>
                                <option value="1">
                                    Meningitis
                                </option>
                                <option value="2">
                                    Whooping Cough
                                </option>
                            </select>
                        </dd>
                    </div>
                </div>
                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate">
                            Public Health Function
                        </dt>
                        <dd class="mt-1 text-3xl font-semibold text-gray-900">
                            <select name="public_health_function_id" class="p-2 rounded border w-full appearance-none"
                                    wire:model="filter.public_health_function_id">

                                <option value="">
                                    Select Public Health Function
                                </option>

                                <option value="3">
                                    Curative
                                </option>
                                <option value="2">
                                    Disease Prevention
                                </option>
                                <option value="1">
                                    Health Promotion
                                </option>
                                <option value="5">
                                    Pallative
                                </option>
                                <option value="4">
                                    Rehabilitative
                                </option>
                            </select>
                        </dd>
                    </div>
                </div>

                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate">
                            Intervention Level
                        </dt>
                        <dd class="mt-1 text-3xl font-semibold text-gray-900">
                            <select name="intervention_level_id" class="p-2 rounded border w-full appearance-none"
                                    wire:model="filter.intervention_level_id">

                                <option value="">
                                    Select an Intervention Level
                                </option>

                                <option value="1">
                                    Community Level Interventions
                                </option>
                                <option value="3">
                                    Hospital Interventions
                                </option>
                                <option value="2">
                                    Primary Care Interventions
                                </option>
                            </select>
                        </dd>
                    </div>
                </div>
            </dl>
        </form>
    </div>
</div>
