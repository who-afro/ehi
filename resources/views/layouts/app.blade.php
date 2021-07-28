<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="/favicon.ico"/>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ehi.css') }}">

@livewireStyles

<!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.1/dist/alpine.min.js" defer></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased">
<div>
    <nav class="bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-24">
                <div class="flex items-center">
                    <div class="flex-shrink-0 mb-2">
                        <a href="/"><img class="h-20" src="{{ asset('img/who-logo.svg') }}" alt="World Health Organization">
                        </a>
                    </div>
                    <div class="md:block ml-4">
                        <div class="ml-10 flex flex-wrap items-baseline space-x-4">
                            @auth
                                <a href="{{url('nova')}}"
                                   class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group w-full flex items-center py-2 px-2 font-medium rounded-md">
                                    <x-heroicon-o-cog class="h-6 w-6 text-gray-500 group-hover:text-gray-600"/>
                                    Administration
                                </a>
                            @endauth

                            <a href="{{ route('service-area-overview') }}"
                               class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group w-full flex items-center py-2 px-2 font-medium rounded-md whitespace-nowrap">
                                <x-heroicon-o-view-grid class="h-6 w-6 text-gray-500 group-hover:text-gray-600"/>
                                Service Areas
                            </a>

                            <div x-data="{ isAgeCohortOpen: false }" @click.away="isAgeCohortOpen = false"
                                 class="relative inline-block text-left px-2 py-2 hover:bg-gray-50 hover:text-gray-900 rounded-md">
                                <button type="button" @click="isAgeCohortOpen = !isAgeCohortOpen"
                                        class="inline-flex justify-center w-full rounded-md font-medium text-gray-600 whitespace-nowrap focus:outline-none focus:ring-0"
                                        id="age-cohort-button" aria-expanded="true" aria-haspopup="true">
                                    <x-fas-child class="h-6 w-6"/>
                                    Age Cohorts
                                    <x-heroicon-o-chevron-down class="h-4 w-4 ml-2 -mb-2"/>
                                </button>
                                <div
                                    x-show="isAgeCohortOpen"
                                    @click.away="isAgeCohortOpen = false"
                                    x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95"
                                    class="origin-top-right absolute right-0 mt-2 w-72 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="age-cohort-button"
                                    tabindex="-1" style="display: none;">
                                    <div x-description="Age Cohort Menu" class="space-y-1" role="none">
                                        <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                        <a href="{{ route('age-cohort-overview') }}"
                                           class="group w-full flex items-center px-2 py-2 text-gray-500  hover:text-gray-900 hover:bg-gray-100">
                                            Overview
                                        </a>
                                        @foreach(App\Models\AgeCohort::all() as $ageCohort)
                                            <a href="{{ route('age-cohort', ['age_cohort_id' => $ageCohort->id]) }}"
                                               class="text-gray-500 block px-2 py-2 whitespace-nowrap hover:text-gray-900 hover:bg-gray-100"
                                               title="{{ $ageCohort->name }}">
                                                {{ $ageCohort->name }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div x-data="{ isLevelOfCareOpen: false }"
                                 @click.away="isLevelOfCareOpen = false"
                                 class="relative inline-block text-left text-gray-600 hover:bg-gray-50 hover:text-gray-900 group items-center py-2 px-2 font-medium rounded-md">
                                <button type="button" @click="isLevelOfCareOpen = !isLevelOfCareOpen"
                                        class="inline-flex justify-center font-medium text-gray-600  whitespace-nowrap hover:bg-gray-50 hover:text-gray-900 focus:outline-none"
                                        id="level-of-care-button" aria-expanded="true" aria-haspopup="true">
                                    <x-heroicon-o-users class="h-6 w-6"/>
                                    Level of Care
                                    <x-heroicon-o-chevron-down class="h-4 w-4 ml-2 -mb-2"/>
                                </button>
                                <div
                                    x-show="isLevelOfCareOpen"
                                    @click.away="isLevelOfCareOpen = false"
                                    x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95"
                                    class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="level-of-care-button"
                                    tabindex="-1" >
                                    <div x-description="Level of Care Menu" class="space-y-1" role="none">
                                        <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                        <a href="{{ route('level-of-care-overview') }}"
                                           class="group w-full flex items-center px-2 py-2 text-gray-500  hover:text-gray-900 hover:bg-gray-100">
                                            Overview
                                        </a>
                                        @foreach(App\Models\LevelOfCare::all() as $levelofCare)
                                            <a href="{{ route('level-of-care', ['level_of_care_id' => $levelofCare->id]) }}"
                                               class="group w-full flex items-center px-2 py-2 text-gray-500 hover:text-gray-900 hover:bg-gray-100"
                                               title="{{ $levelofCare->name }}">
                                                {{ $levelofCare->name }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div x-data="{ isPublicHealthFunctionOpen: false }" @click.away="isPublicHealthFunctionOpen = false"
                                 class="relative inline-block text-left text-gray-600 hover:bg-gray-50 hover:text-gray-900 group items-center py-2 px-2 font-medium rounded-md">
                                <button type="button" @click="isPublicHealthFunctionOpen = !isPublicHealthFunctionOpen"
                                        class="inline-flex justify-center font-medium text-gray-600  whitespace-nowrap hover:bg-gray-50 hover:text-gray-900 focus:outline-none"
                                        id="public-health-function-button" aria-expanded="true" aria-haspopup="true">
                                    <x-heroicon-o-folder class="h-6 w-6"/>
                                    Public Health Function
                                    <x-heroicon-o-chevron-down class="h-4 w-4 ml-2 -mb-6"/>
                                </button>
                                <div
                                    x-show="isPublicHealthFunctionOpen"
                                    @click.away="isPublicHealthFunctionOpen = false"
                                    x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95"
                                    class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical"
                                    aria-labelledby="public-health-function-button"
                                    tabindex="-1">
                                    <div x-description="Public Health Function Menu" class="space-y-1" role="none">
                                        <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                        <a href="{{ route('public-health-function-overview') }}"
                                           class="group w-full flex items-center px-2 py-2 text-gray-500  hover:text-gray-900 hover:bg-gray-100">
                                            Overview
                                        </a>
                                        @foreach(App\Models\PublicHealthFunction::all() as $publicHealthFunction)
                                            <a href="{{ route('public-health-function', ['public_health_function_id' => $publicHealthFunction->id]) }}"
                                               class="group w-full flex items-center px-2 py-2 text-gray-500 hover:text-gray-900 hover:bg-gray-100"
                                               title="{{ $publicHealthFunction->name }}">
                                                {{ $publicHealthFunction->name }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div x-data="{ isProgramAreaOpen: false }"
                                 @click.away="{ isProgramAreaOpen = false }"
                                 class="relative inline-block text-left text-gray-600 hover:bg-gray-50 hover:text-gray-900 group items-center py-2 px-2 font-medium rounded-md">
                                <button type="button" @click="isProgramAreaOpen = !isProgramAreaOpen"
                                        class="inline-flex justify-center font-medium text-gray-600  whitespace-nowrap hover:bg-gray-50 hover:text-gray-900 outline-none"
                                        id="program-area-button" aria-expanded="true" aria-haspopup="true">
                                    <x-heroicon-o-calendar class="h-6 w-6"/>
                                    Program Area
                                    <x-heroicon-o-chevron-down class="h-4 w-4 ml-2 -mb-2"/>
                                </button>
                                <div
                                    x-show="isProgramAreaOpen"
                                    @click.away="{ isProgramAreaOpen = false }"
                                    x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95"
                                    class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="program-area-button"
                                    tabindex="-1">
                                    <div x-description="Program Area Menu" class="space-y-1" role="none">
                                        <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                        <a href="{{ route('program-area-overview') }}"
                                           class="group w-full flex items-center px-2 py-2 text-gray-500  hover:text-gray-900 hover:bg-gray-100">
                                            Overview
                                        </a>
                                        @foreach(App\Models\ProgramArea::all() as $programArea)
                                            <a href="{{ route('program-area', ['program_area_id' => $programArea->id]) }}"
                                               class="group w-full flex items-center px-2 py-2 text-gray-500 hover:text-gray-900 hover:bg-gray-100"
                                               title="{{ $programArea->name }}">
                                                {{ $programArea->name }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8">
            <h1 class="text-2xl font-semibold text-gray-900 pl-6"> {{ $header ?? '' }}</h1>
        </div>
    </header>
    <x-show-breakpoints></x-show-breakpoints>
    <main>
        <div class="max-w-7xl mx-auto">
            <!-- Replace with your content -->
            <div class="h-full">
                {{ $slot }}
            </div>
            <!-- /End replace -->
        </div>
    </main>
</div>

@stack('modals')

@livewireScripts

</body>
</html>
