<div class="text-lg">
    <x-slot name="header">
        Build Essential Package
    </x-slot>
    <div class="p-2">
        Follow the steps to generate the starting point for your essential package
    </div>


    <div class="flex flex-col px-2"
         x-data="{step: 1}">
        <div class="lg:border-t lg:border-b lg:border-gray-200">
            <nav aria-label="Progress">
                <ol role="list"
                    class="flex border border-gray-300 rounded-md divide-y divide-gray-300 md:flex md:divide-y-0 text-xl">
                    <li class="relative md:flex-1 md:flex cursor-pointer" x-on:click="step = 1">
                        <!-- Completed Step -->
                        <div class="group flex items-center w-full">
        <span class="px-4 py-4 flex items-center font-medium"  x-show="step > 1">
          <span
              class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-iaho-light-blue rounded-full">
            <!-- Heroicon name: solid/check -->
            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                 aria-hidden="true">
              <path fill-rule="evenodd"
                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                    clip-rule="evenodd"/>
            </svg>
          </span>
          <span class="ml-4 font-medium text-iaho-deep-blue uppercase">CONDITIONS</span>
        </span>
                            <div class="px-4 py-4 flex items-center font-medium" aria-current="step" x-show="step === 1">
        <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-iaho-dark-blue rounded-full">
          <span class="text-iaho-dark-blue">01</span>
        </span>
                                <span class="ml-4 font-medium text-iaho-dark-blue">CONDITIONS</span>
                            </div>
                        </div>

                        <div class="md:block absolute top-0 right-0 h-full w-5" aria-hidden="true">
                            <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none"
                                 preserveAspectRatio="none">
                                <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor"
                                      stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </li>

                    <li class="relative md:flex-1 md:flex cursor-pointer" x-on:click="if (step > 2) {step = 2}">
                        <!-- Completed Step -->
                        <div class="group flex items-center w-full">
        <span class="px-4 py-4 flex items-center font-medium"  x-show="step > 2">
          <span
              class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-iaho-light-blue rounded-full">
            <!-- Heroicon name: solid/check -->
            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                 aria-hidden="true">
              <path fill-rule="evenodd"
                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                    clip-rule="evenodd"/>
            </svg>
          </span>
          <span class="ml-4 font-medium text-iaho-deep-blue uppercase">LEVEL OF CARE</span>
        </span>
                            <div class="px-4 py-4 flex items-center font-medium" aria-current="step" x-show="step === 2 ">
        <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-iaho-dark-blue rounded-full">
          <span class="text-iaho-dark-blue">02</span>
        </span>
                                <span class="ml-4 font-medium text-iaho-dark-blue">LEVEL OF CARE</span>
                            </div>
                            <div class="px-4 py-4 flex items-center font-medium" aria-current="step" x-show="step < 2 ">
        <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-gray-400 rounded-full">
          <span class="text-gray-400">02</span>
        </span>
                                <span class="ml-4 font-medium text-gray-400">LEVEL OF CARE</span>
                            </div>
                        </div>

                        <div class="md:block absolute top-0 right-0 h-full w-5" aria-hidden="true">
                            <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none"
                                 preserveAspectRatio="none">
                                <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor"
                                      stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </li>
                    <li class="relative md:flex-1 md:flex cursor-pointer" x-on:click="if (step > 3) {step = 3}">
                        <!-- Completed Step -->
                        <div class="group flex items-center w-full">
        <span class="px-4 py-4 flex items-center font-medium"  x-show="step > 3">
          <span
              class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-iaho-light-blue rounded-full">
            <!-- Heroicon name: solid/check -->
            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                 aria-hidden="true">
              <path fill-rule="evenodd"
                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                    clip-rule="evenodd"/>
            </svg>
          </span>
          <span class="ml-4 font-medium text-iaho-deep-blue uppercase whitespace-nowrap">PUBLIC HEALTH FUNCTION</span>
        </span>
                            <div class="px-4 py-4 flex items-center font-medium" aria-current="step" x-show="step === 3 ">
        <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-iaho-dark-blue rounded-full">
          <span class="text-iaho-dark-blue">03</span>
        </span>
                                <span class="ml-4 font-medium text-iaho-dark-blue whitespace-nowrap">PUBLIC HEALTH FUNCTION</span>
                            </div>
                            <div class="px-4 py-4 flex items-center font-medium" aria-current="step" x-show="step < 3 ">
        <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-gray-400 rounded-full">
          <span class="text-gray-400">03</span>
        </span>
                                <span class="ml-4 font-medium text-gray-400 whitespace-nowrap">PUBLIC HEALTH FUNCTION</span>
                            </div>
                        </div>

                        <div class="md:block absolute top-0 right-0 h-full w-5" aria-hidden="true">
                            <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none"
                                 preserveAspectRatio="none">
                                <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor"
                                      stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </li>

                    <li class="relative md:flex-1 md:flex cursor-pointer" x-on:click="if (step > 4) {step = 4}">
                        <!-- Completed Step -->
                        <div class="group flex items-center w-full">
        <span class="px-4 py-4 flex items-center font-medium"  x-show="step > 4">
          <span
              class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-iaho-light-blue rounded-full">
            <!-- Heroicon name: solid/check -->
            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                 aria-hidden="true">
              <path fill-rule="evenodd"
                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                    clip-rule="evenodd"/>
            </svg>
          </span>
          <span class="ml-4 font-medium text-iaho-deep-blue uppercase">AGE COHORT</span>
        </span>
                            <div class="px-4 py-4 flex items-center font-medium" aria-current="step" x-show="step === 4 ">
        <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-iaho-dark-blue rounded-full">
          <span class="text-iaho-dark-blue">04</span>
        </span>
                                <span class="ml-4 font-medium text-iaho-dark-blue">AGE COHORT</span>
                            </div>
                            <div class="px-4 py-4 flex items-center font-medium" aria-current="step" x-show="step < 4 ">
        <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-gray-400 rounded-full">
          <span class="text-gray-400">04</span>
        </span>
                                <span class="ml-4 font-medium text-gray-400">AGE COHORT</span>
                            </div>
                        </div>

                        <div class="md:block absolute top-0 right-0 h-full w-5" aria-hidden="true">
                            <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none"
                                 preserveAspectRatio="none">
                                <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor"
                                      stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </li>
                    <li class="relative md:flex-1 md:flex">
                        <!-- Completed Step -->
                        <div class="group flex items-center w-full">
        <span class="px-4 py-4 flex items-center font-medium"  x-show="step > 5">
          <span
              class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-iaho-light-blue rounded-full">
            <!-- Heroicon name: solid/check -->
            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                 aria-hidden="true">
              <path fill-rule="evenodd"
                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                    clip-rule="evenodd"/>
            </svg>
          </span>
          <span class="ml-4 font-medium text-iaho-deep-blue uppercase">SUMMARY</span>
        </span>
                            <div class="px-4 py-4 flex items-center font-medium" aria-current="step" x-show="step === 5 ">
        <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-iaho-dark-blue rounded-full">
          <span class="text-iaho-dark-blue">05</span>
        </span>
                                <span class="ml-4 font-medium text-iaho-dark-blue">SUMMARY</span>
                            </div>
                            <div class="px-4 py-4 flex items-center font-medium" aria-current="step" x-show="step < 5 ">
        <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-gray-400 rounded-full">
          <span class="text-gray-400">05</span>
        </span>
                                <span class="ml-4 font-medium text-gray-400">SUMMARY</span>
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
                                       class="form-checkbox text-iaho-dark-blue border-2 rounded-md shadow-sm"
                                       wire:model="conditions.{{ $condition->id }}" value="{{ $condition->id }}"/>
                            </div>
                            <label for="condition_{{ $condition->id }}"
                                   class="ml-2 text-gray-700">{{ $condition->name }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="flex justify-end p-4">
                    <x-button.primary x-on:click="step++"
                                      class="px-8 py-2 w-32 flex">
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
                                       class="form-checkbox text-iaho-dark-blue border-2 rounded-md shadow-sm"
                                       wire:model="levels_of_care.{{ $levelOfCare->id }}"
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
                                        class="px-8 py-2 w-40 flex bg-iaho-red text-white hover:text-white">
                        <x-heroicon-o-chevron-left class="w-6 text-white"/>
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
                                       class="form-checkbox text-iaho-dark-blue border-2 rounded-md shadow-sm"
                                       wire:model="public_health_functions.{{ $publicHealthFunction->id }}"
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
                                        class="px-8 py-2 w-40 flex bg-iaho-red text-white hover:text-white">
                        <x-heroicon-o-chevron-left class="w-6 text-white"/>
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
                                       class="form-checkbox text-iaho-dark-blue border-2 rounded-md shadow-sm"
                                       wire:model="age_cohorts.{{ $ageCohort->id }}"
                                       value="{{ $ageCohort->id }}"/>
                            </div>
                            <label for="age_cohorts_{{ $ageCohort->id }}" class="ml-2 text-gray-700">
                                {{ $ageCohort->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
                <div class="flex justify-between justify-end p-4">
                    <x-button.secondary x-on:click="step--"
                                        class="px-8 py-2 w-40 flex bg-iaho-red text-white hover:text-white">
                        <x-heroicon-o-chevron-left class="w-6 text-white"/>
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
                            Title <span class="text-red-600">*</span>
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input type="text" name="title" id="title"
                                   class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-lg border-gray-300 rounded-md"
                                   wire:model="title"/>
                        </div>
                        @error('title') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="description" class="block font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Description
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <textarea name="description" id="description"
                                      class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-lg border-gray-300 rounded-md"
                                      wire:model="description" rows="5">
                            </textarea>
                        </div>
                    </div>
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="notification_emails" class="block font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Email Address(es)
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input type="text" name="notification_emails" id="notification_emails"
                                   class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-lg border-gray-300 rounded-md"
                                   wire:model="notification_emails"/>
                        </div>
                        @error('notification_emails') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="flex justify-between justify-end p-4">
                    <x-button.secondary x-on:click="step--"
                                        class="px-8 py-2 w-40 flex bg-iaho-red text-white text-lg hover:text-white">
                        <x-heroicon-o-chevron-left class="w-6 text-white"/>
                        Previous
                    </x-button.secondary>
                    <x-button.primary wire:click="save"
                                      class="px-8 py-2 whitespace-nowrap flex bg-iaho-light-blue border-iaho-light-blue text-lg hover:bg-iaho-dark-blue">
                        Save Package&nbsp;
                        <x-heroicon-o-check-circle class="w-6"/>
                    </x-button.primary>
                </div>
            </div>
        </div>
    </div>
</div>
