<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome to the Digital Menu of Essential Interventions ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-intervention-stats></x-intervention-stats>
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Conditions
                    </h3>
                    <p>The conditions covered in this digital menu of interventions are listed in the table below</p>

                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Condition
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Program Areas
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Number of Interventions
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach(App\Models\Condition::withCount('interventions')->get() as $condition)
                                            <tr class="bg-white">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    {{$condition->name}}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    @forelse($condition->programAreas as $i => $p)
                                                        <li>{{$p->name}}</li>
                                                    @empty

                                                    @endforelse
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    {{$condition->interventions_count }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
