<div>
    <div class="mx-auto px-6 py-4">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Intervention Statistics
        </h3>
        <p>This section provides a summary of the statistics for the digital menu of interventions</p>
        <dl class="mt-5 grid grid-cols-4 gap-4">
            <div class="bg-white shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <dt class="font-medium text-gray-500 truncate">
                        Program Areas
                    </dt>
                    <dd class="mt-1 text-3xl font-semibold text-gray-900">
                        {{ $program_areas }}
                    </dd>
                </div>
            </div>
            <div class="bg-white shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <dt class="font-medium text-gray-500 truncate">
                        Conditions
                    </dt>
                    <dd class="mt-1 text-3xl font-semibold text-gray-900">
                        {{ $conditions }}
                    </dd>
                </div>
            </div>
            <div class="bg-white shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <dt class="font-medium text-gray-500 truncate">
                        Service Areass
                    </dt>
                    <dd class="mt-1 text-3xl font-semibold text-gray-900">
                        {{ $service_areas }}
                    </dd>
                </div>
            </div>
            <div class="bg-white shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <dt class="font-medium text-gray-500 truncate">
                        Total interventions
                    </dt>
                    <dd class="mt-1 text-3xl font-semibold text-gray-900">
                        {{ $interventions }}
                    </dd>
                </div>
            </div>
        </dl>
    </div>
</div>
