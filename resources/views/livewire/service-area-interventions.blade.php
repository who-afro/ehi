<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Service Area Interventions') }}
        </h2>
    </x-slot>
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-4">
            <li>
                <div>
                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <!-- Heroicon name: solid/home -->
                        <svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                        </svg>
                        <a href="/" class="sr-only">Home</a>
                    </a>
                </div>
            </li>
            @isset($parent)
            <li>
                <div class="flex items-center">
                    <!-- Heroicon name: solid/chevron-right -->
                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                    <a href="{{ route('service-area', ['service_area_id' => $parent->id ]) }}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">{{ $parent->name }}</a>
                </div>
            </li>
            @endisset

            <li>
                <div class="flex items-center">
                    <!-- Heroicon name: solid/chevron-right -->
                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                    <span class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700" aria-current="page">{{ $serviceArea->name }}</span>
                </div>
            </li>
        </ol>
    </nav>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
            <dl class="mt-5 grid grid-cols-4 gap-2 max-h-72">
                <x-filters.age-cohort></x-filters.age-cohort>
                <x-filters.conditions></x-filters.conditions>
                <x-filters.public-health-function></x-filters.public-health-function>
                <x-filters.level-of-care></x-filters.level-of-care>
            </dl>
        </div>
    </div>
    <x-search-and-export></x-search-and-export>
    <div>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase">
                                    Service Area
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase">
                                    Intervention
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase  whitespace-nowrap">
                                    Age Cohort
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase whitespace-nowrap">
                                    Public Health Function
                                </th>

                            </tr>
                            </thead>
                            <tbody>
                            @forelse($interventions as $k => $v)
                                <tr class="{{ $loop->odd ? 'bg-white' : 'bg-gray-50' }}">
                                    <td class="px-6 py-4 text-sm text-left text-gray-500">
                                        {{$v->serviceArea->name}}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-left text-gray-500">
                                        {{ $v->details}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-left text-gray-500">
                                        {{$v->intervention->ageCohort->name}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-left text-gray-500">
                                        {{$v->intervention->publicHealthFunction->name}}
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

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-16">
            {{ $interventions->links() }}
        </div>
    </div>
</div>
