<x-interventions-filter></x-interventions-filter>
<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    @if(!empty($objects))
        @foreach($objects as $k => $v)
            <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="bg-white shadow overflow-hidden sm:rounded-lg my-5">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Intervention
                        </h3>
                    </div>
                    <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                        <dl class="sm:divide-y sm:divide-gray-200">
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Condition
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{$v->condition->name}}

                                </dd>
                            </div>
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Age Cohort
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{$v->ageCohort->name}}
                                </dd>
                            </div>
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Public Health Function
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{$v->publicHealthFunction->name}}
                                </dd>
                            </div>
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Intervention Level
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{$v->interventionLevel->name}}
                                </dd>
                            </div>
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Details
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {!! $v["details"]  !!}
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>

            @endforeach
        @else
            No Interventions found for the specified criteria
        @endif
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="pagination-container">
            <ul class="pagination">
                <li class="page-item
                    @if($page == 1)
                    disabled
@endif
                    ">
                    <a class="page-link" href="javascript:void(0)"
                       wire:click="applyPagination('previous_page', {{ $page-1 }})">
                        Previous
                    </a>
                </li>

                <li class="page-item
                    @if($page == $paginator['last_page'])
                    disabled
@endif

                    ">
                    <a class="page-link" href="javascript:void(0)"
                       @if($page <= $paginator['last_page'])
                       wire:click="applyPagination('next_page', {{ $page+1 }})"
                        @endif
                    >
                        Next
                    </a>
                </li>

                <li class="page-item" style="margin: 0 5px">
                    Jump to Page
                </li>

                <li class="page-item" style="margin: 0 5px">
                    <select class="form-control" title="" style="width: 80px" wire:model="page">
                        @for($i=1;$i<=$paginator['last_page'];$i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </li>

                <li class="page-item" style="margin: 0 5px">
                    Items Per Page
                </li>

                <li class="page-item" style="margin: 0 5px">
                    <select class="form-control" title="" style="width: 80px" wire:model="items_per_page"
                            wire:change="loadList">
                        <option value="5">05</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                    </select>
                </li>
            </ul>
        </div>
    </div>`
</div>
