<!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase ">
                            Condition
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase">
                            Age Cohort
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase">
                            Public Health Function
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase">
                            Program Area
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase">
                            Services
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($interventions as $k => $v)
                        <tr class="{{ $loop->odd ? 'bg-white' : 'bg-gray-50' }}">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-left text-gray-500">
                                {{$v->condition->name}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-left text-gray-500">
                                {{$v->ageCohort->name}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-left text-gray-500">
                                {{$v->publicHealthFunction->name}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-left text-gray-500">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-left text-gray-500">
                                <ul class="list-disc">

                                @forelse($v->services as $s => $service)
                                    <li>{{$service->name}} - {{ $service->pivot->details }}</li>
                                @empty
                                        <li>There are no services</li>
                                @endforelse
                                </ul>

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
