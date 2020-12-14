<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Intervention Statistics
        </h3>
        <dl class="mt-5 grid grid-cols-3 gap-4">
            <div class="bg-white shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <dt class="text-sm font-medium text-gray-500 truncate">
                        Total interventions
                    </dt>
                    <dd class="mt-1 text-3xl font-semibold text-gray-900">
                        {{ $interventions }}
                    </dd>
                </div>
            </div>

            <div class="bg-white shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <dt class="text-sm font-medium text-gray-500 truncate">
                        Conditions
                    </dt>
                    <dd class="mt-1 text-3xl font-semibold text-gray-900">
                        {{ $conditions }}
                    </dd>
                </div>
            </div>

            <div class="bg-white shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <dt class="text-sm font-medium text-gray-500 truncate">
                        Avg. Click Rate
                    </dt>
                    <dd class="mt-1 text-3xl font-semibold text-gray-900">
                        24.57%
                    </dd>
                </div>
            </div>
        </dl>
    </div>
</div>
