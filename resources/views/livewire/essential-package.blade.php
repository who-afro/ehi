<div class="text-lg">
    <x-slot name="header">
        Build Essential Package
    </x-slot>
    <div class="p-2">
        Follow the steps to generate the starting point for your essential package
    </div>


    <div class="flex flex-col px-2"
         x-data="{step: 1}">
        <div class="lg:border-t lg:border-b lg:border-gray-200" x-data="{step: 1}">
            <nav class="mx-auto max-w-7xl px-4" aria-label="Progress">
                <ol role="list"
                    class="rounded-md overflow-hidden flex border-l border-r border-gray-200 rounded-none">
                    <li class="relative overflow-hidden flex-1">
                        <div class="border border-gray-200 overflow-hidden border-b-0 rounded-t-md lg:border-0">
                            <!-- Completed Step -->
                            <a href="#" class="group">
                            <span
                                class="absolute top-0 left-0 w-1 h-full bg-transparent group-hover:bg-gray-200 lg:w-full lg:h-1 lg:bottom-0 lg:top-auto"
                                aria-hidden="true"></span>
                                <span class="px-6 py-5 flex items-start text-sm font-medium">
              <span class="flex-shrink-0">
                <span class="w-10 h-10 flex items-center justify-center bg-indigo-600 rounded-full">
                  <!-- Heroicon name: solid/check -->
                  <x-heroicon-s-check class="text-white"/>
                </span>
              </span>
              <span class="mt-0.5 ml-4 min-w-0 flex flex-col">
                <span class="text-xs font-semibold tracking-wide uppercase">Conditions</span>
              </span>
            </span>
                            </a>
                        </div>
                    </li>

                    <li class="relative overflow-hidden flex-1">
                        <div class="border border-gray-200 overflow-hidden border-0">
                            <!-- Current Step -->
                            <a href="#" aria-current="step">
                            <span
                                class="absolute top-0 left-0 w-1 h-full bg-indigo-600 lg:w-full lg:h-1 lg:bottom-0 lg:top-auto"
                                aria-hidden="true"></span>
                                <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
              <span class="flex-shrink-0">
                <span class="w-10 h-10 flex items-center justify-center border-2 border-indigo-600 rounded-full">
                  <span class="text-indigo-600">02</span>
                </span>
              </span>
              <span class="mt-0.5 ml-4 min-w-0 flex flex-col">
                <span class="text-xs font-semibold text-indigo-600 tracking-wide uppercase">Level of Care</span>
              </span>
            </span>
                            </a>

                            <!-- Separator -->
                            <div class="hidden absolute top-0 left-0 w-3 inset-0 lg:block" aria-hidden="true">
                                <svg class="h-full w-full text-gray-300" viewBox="0 0 12 82" fill="none"
                                     preserveAspectRatio="none">
                                    <path d="M0.5 0V31L10.5 41L0.5 51V82" stroke="currentColor"
                                          vector-effect="non-scaling-stroke"/>
                                </svg>
                            </div>
                        </div>
                    </li>

                    <li class="relative overflow-hidden flex-1">
                        <div class="border border-gray-200 overflow-hidden border-t-0 rounded-b-md border-0">
                            <!-- Upcoming Step -->
                            <a href="#" class="group">
                            <span
                                class="absolute top-0 left-0 w-1 h-full bg-transparent group-hover:bg-gray-200 lg:w-full lg:h-1 lg:bottom-0 lg:top-auto"
                                aria-hidden="true"></span>
                                <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
              <span class="flex-shrink-0">
                <span class="w-10 h-10 flex items-center justify-center border-2 border-gray-300 rounded-full">
                  <span class="text-gray-500">03</span>
                </span>
              </span>
              <span class="mt-0.5 ml-4 min-w-0 flex flex-col">
                <span class="text-xs font-semibold text-gray-500 tracking-wide uppercase">Public Health Function</span>
              </span>
            </span>
                            </a>

                            <!-- Separator -->
                            <div class="hidden absolute top-0 left-0 w-3 inset-0 lg:block" aria-hidden="true">
                                <svg class="h-full w-full text-gray-300" viewBox="0 0 12 82" fill="none"
                                     preserveAspectRatio="none">
                                    <path d="M0.5 0V31L10.5 41L0.5 51V82" stroke="currentcolor"
                                          vector-effect="non-scaling-stroke"/>
                                </svg>
                            </div>
                        </div>
                    </li>
                    <li class="relative overflow-hidden flex-1">
                        <div class="border border-gray-200 overflow-hidden border-t-0 rounded-b-md lg:border-0">
                            <!-- Upcoming Step -->
                            <a href="#" class="group">
                            <span
                                class="absolute top-0 left-0 w-1 h-full bg-transparent group-hover:bg-gray-200 lg:w-full lg:h-1 lg:bottom-0 lg:top-auto"
                                aria-hidden="true"></span>
                                <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
              <span class="flex-shrink-0">
                <span class="w-10 h-10 flex items-center justify-center border-2 border-gray-300 rounded-full">
                  <span class="text-gray-500">04</span>
                </span>
              </span>
              <span class="mt-0.5 ml-4 min-w-0 flex flex-col">
                <span class="text-xs font-semibold text-gray-500 tracking-wide uppercase">Age Cohort</span>
              </span>
            </span>
                            </a>

                            <!-- Separator -->
                            <div class="hidden absolute top-0 left-0 w-3 inset-0 lg:block" aria-hidden="true">
                                <svg class="h-full w-full text-gray-300" viewBox="0 0 12 82" fill="none"
                                     preserveAspectRatio="none">
                                    <path d="M0.5 0V31L10.5 41L0.5 51V82" stroke="currentcolor"
                                          vector-effect="non-scaling-stroke"/>
                                </svg>
                            </div>
                        </div>
                    </li>
                    <li class="relative overflow-hidden lg:flex-1">
                        <div class="border border-gray-200 overflow-hidden border-t-0 rounded-b-md lg:border-0">
                            <!-- Upcoming Step -->
                            <a href="#" class="group">
                            <span
                                class="absolute top-0 left-0 w-1 h-full bg-transparent group-hover:bg-gray-200 lg:w-full lg:h-1 lg:bottom-0 lg:top-auto"
                                aria-hidden="true"></span>
                                <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
              <span class="flex-shrink-0">
                <span class="w-10 h-10 flex items-center justify-center border-2 border-gray-300 rounded-full">
                  <span class="text-gray-500">05</span>
                </span>
              </span>
              <span class="mt-0.5 ml-4 min-w-0 flex flex-col">
                <span
                    class="text-xs font-semibold text-gray-500 tracking-wide uppercase">Save and Download Package</span>
              </span>
            </span>
                            </a>

                            <!-- Separator -->
                            <div class="hidden absolute top-0 left-0 w-3 inset-0 lg:block" aria-hidden="true">
                                <svg class="h-full w-full text-gray-300" viewBox="0 0 12 82" fill="none"
                                     preserveAspectRatio="none">
                                    <path d="M0.5 0V31L10.5 41L0.5 51V82" stroke="currentcolor"
                                          vector-effect="non-scaling-stroke"/>
                                </svg>
                            </div>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="align-middle inline-block min-w-full border-b border-gray-200">
            <div x-show="step === 1">
                @php
                    $conditions = \App\Models\Condition::all();
                @endphp
                <div class="grid grid-cols-4 p-4">
                    @foreach($conditions as $condition)
                        <div class="flex items-start">
                            <div class="flex items-center">
                                <!-- Zero-width space character, used to align checkbox properly -->
                                &#8203;
                                <input id="condition_{{ $condition->id }}" type="checkbox"
                                       class="form-checkbox indigo-600 border-2 rounded-md shadow-sm"
                                       wire:model="package.conditions" value="{{ $condition->id }}"/>
                            </div>
                            <label for="condition_{{ $condition->id }}"
                                   class="ml-2 text-gray-700">{{ $condition->name }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="flex justify-end p-4">
                    <x-button.primary x-on:click="step++"
                                      class="px-8 py-2 w-32 flex bg-iaho-light-blue border-iaho-light-blue hover:bg-iaho-dark-blue">
                        Next
                        <x-heroicon-o-chevron-right class="w-6"/>
                    </x-button.primary>
                </div>
            </div>
            <div x-show="step === 2">
                <div class="p-4">
                    @foreach(App\Models\LevelOfCare::all() as $levelOfCare)
                        <div class="flex items-start">
                            <div class="flex items-center">
                                <!-- Zero-width space character, used to align checkbox properly -->
                                &#8203;
                                <input id="level_of_care_{{ $levelOfCare->id }}" type="checkbox"
                                       class="form-checkbox text-indigo-600 border-2 rounded-md shadow-sm h4 w4"
                                       wire:model="package.levels_of_care"
                                       value="{{ $levelOfCare->id }}"/>
                            </div>
                            <label for="level_of_care_{{ $levelOfCare->id }}" class="ml-2 text-gray-700">
                                {{ $levelOfCare->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
                <div class="flex justify-between justify-end p-4">
                    <x-button.secondary x-on:click="step--"
                                        class="px-8 py-2 w-32 flex bg-iaho-red text-white hover:text-white">
                        <x-heroicon-o-chevron-left class="w-8 text-white"/>
                        Previous
                    </x-button.secondary>
                    <x-button.primary x-on:click="step++"
                                      class="px-8 py-2 w-32 flex bg-iaho-light-blue border-iaho-light-blue hover:bg-iaho-dark-blue">
                        Next
                        <x-heroicon-o-chevron-right class="w-6"/>
                    </x-button.primary>
                </div>
            </div>
            <div x-show="step === 3">
                <div class="p-4">
                    @foreach(App\Models\PublicHealthFunction::all() as $publicHealthFunction)
                        <div class="flex items-start">
                            <div class="flex items-center">
                                <!-- Zero-width space character, used to align checkbox properly -->
                                &#8203;
                                <input id="public_health_functions_{{ $publicHealthFunction->id }}" type="checkbox"
                                       class="form-checkbox text-indigo-600 border-2 rounded-md shadow-sm h4 w4"
                                       wire:model="package.public_health_functions"
                                       value="{{ $publicHealthFunction->id }}"/>
                            </div>
                            <label for="public_health_functions_{{ $publicHealthFunction->id }}"
                                   class="ml-2 text-gray-700">
                                {{ $publicHealthFunction->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
                <div class="flex justify-between justify-end p-4">
                    <x-button.secondary x-on:click="step--"
                                        class="px-8 py-2 w-32 flex bg-iaho-red text-white hover:text-white">
                        <x-heroicon-o-chevron-left class="w-8 text-white"/>
                        Previous
                    </x-button.secondary>
                    <x-button.primary x-on:click="step++"
                                      class="px-8 py-2 w-32 flex bg-iaho-light-blue border-iaho-light-blue hover:bg-iaho-dark-blue">
                        Next
                        <x-heroicon-o-chevron-right class="w-6"/>
                    </x-button.primary>
                </div>
            </div>
            <div x-show="step === 4">
                <div class="p-4">
                    @foreach(App\Models\AgeCohort::all() as $ageCohort)
                        <div class="flex items-start">
                            <div class="flex items-center">
                                <!-- Zero-width space character, used to align checkbox properly -->
                                &#8203;
                                <input id="age_cohorts_{{ $ageCohort->id }}" type="checkbox"
                                       class="form-checkbox text-indigo-600 border-2 rounded-md shadow-sm h4 w4"
                                       wire:model="package.age_cohorts"
                                       value="{{ $publicHealthFunction->id }}"/>
                            </div>
                            <label for="age_cohorts_{ $ageCohort->id }}" class="ml-2 text-gray-700">
                                {{ $ageCohort->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
                <div class="flex justify-between justify-end p-4">
                    <x-button.secondary x-on:click="step--"
                                        class="px-8 py-2 w-32 flex bg-iaho-red text-white hover:text-white">
                        <x-heroicon-o-chevron-left class="w-8 text-white"/>
                        Previous
                    </x-button.secondary>
                    <x-button.primary x-on:click="step++"
                                      class="px-8 py-2 w-32 flex bg-iaho-light-blue border-iaho-light-blue hover:bg-iaho-dark-blue">
                        Next
                        <x-heroicon-o-chevron-right class="w-6"/>
                    </x-button.primary>
                </div>
            </div>
            <div x-show="step === 5">
                <div class="w-2/3 px-4 mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="title" class="block font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Title
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input type="text" name="title" id="title"
                                   class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                                   wire:model="package.title"/>
                        </div>
                    </div>
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="description" class="block font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Description
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <textarea name="description" id="description"
                                      class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                                      wire:model="package.description" rows="5">
                            </textarea>
                        </div>
                    </div>
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="notification_emails" class="block font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Email Address(es)
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input type="text" name="notification_emails" id="notification_emails"
                                   class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                                   wire:model="package.notification_emails"/>
                        </div>
                    </div>
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label class="block font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Download
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <x-button.link wire:click="exportExcel" class="px-2 justify-center">
                                <img src="{{ asset('svg/excel.svg') }}" alt="Download to Excel" />
                            </x-button.link>
                            <x-button.link wire:click="exportPDF" class="px-2 justify-center">
                                <img src="{{ asset('svg/pdf.svg') }}" alt="Download to PDF" />
                            </x-button.link>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between justify-end p-4">
                    <x-button.secondary x-on:click="step--"
                                        class="px-8 py-2 w-32 flex bg-iaho-red text-white text-lg hover:text-white">
                        <x-heroicon-o-chevron-left class="w-6 text-black"/>
                        Previous
                    </x-button.secondary>
                    <x-button.primary wire:click="savePackage"
                                      class="px-8 py-2 whitespace-nowrap flex bg-iaho-light-blue border-iaho-light-blue text-lg hover:bg-iaho-dark-blue">
                        Save Package&nbsp;
                        <x-heroicon-o-check-circle class="w-6"/>
                    </x-button.primary>
                </div>
            </div>
        </div>
    </div>
</div>
