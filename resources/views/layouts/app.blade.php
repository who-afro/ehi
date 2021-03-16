<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

@livewireStyles

<!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.1/dist/alpine.min.js" defer></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased">
<div class="h-screen flex overflow-hidden bg-gray-100">
    <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
    <div class="md:hidden">
        <div class="fixed inset-0 flex z-40">
            <!--
              Off-canvas menu overlay, show/hide based on off-canvas menu state.

              Entering: "transition-opacity ease-linear duration-300"
                From: "opacity-0"
                To: "opacity-100"
              Leaving: "transition-opacity ease-linear duration-300"
                From: "opacity-100"
                To: "opacity-0"
            -->
            <div class="fixed inset-0" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-600 opacity-75"></div>
            </div>
            <!--
              Off-canvas menu, show/hide based on off-canvas menu state.

              Entering: "transition ease-in-out duration-300 transform"
                From: "-translate-x-full"
                To: "translate-x-0"
              Leaving: "transition ease-in-out duration-300 transform"
                From: "translate-x-0"
                To: "-translate-x-full"
            -->
            <div class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-indigo-700">
                <div class="absolute top-0 right-0 -mr-12 pt-2">
                    <button
                        class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                        <span class="sr-only">Close sidebar</span>
                        <!-- Heroicon name: outline/x -->
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <div class="flex-shrink-0 flex items-center px-4">
                    <img class="h-8 w-auto"
                         src="https://tailwindui.com/img/logos/workflow-logo-indigo-300-mark-white-text.svg"
                         alt="Workflow">
                </div>
                <div class="mt-5 flex-1 h-0 overflow-y-auto">
                    <nav class="px-2 space-y-1">
                        <!-- Current: "bg-indigo-800 text-white", Default: "text-indigo-100 hover:bg-indigo-600" -->
                        <a href="#"
                           class="bg-indigo-800 text-white group flex items-center px-2 py-2 text-base font-medium rounded-md">
                            <!-- Heroicon name: outline/home -->
                            <svg class="mr-4 h-6 w-6 text-indigo-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                            Dashboard
                        </a>

                        <a href="#"
                           class="text-indigo-100 hover:bg-indigo-600 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                            <!-- Heroicon name: outline/users -->
                            <svg class="mr-4 h-6 w-6 text-indigo-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                            Team
                        </a>

                        <a href="#"
                           class="text-indigo-100 hover:bg-indigo-600 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                            <!-- Heroicon name: outline/folder -->
                            <svg class="mr-4 h-6 w-6 text-indigo-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/>
                            </svg>
                            Projects
                        </a>

                        <a href="#"
                           class="text-indigo-100 hover:bg-indigo-600 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                            <!-- Heroicon name: outline/calendar -->
                            <svg class="mr-4 h-6 w-6 text-indigo-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            Calendar
                        </a>

                        <a href="#"
                           class="text-indigo-100 hover:bg-indigo-600 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                            <!-- Heroicon name: outline/inbox -->
                            <svg class="mr-4 h-6 w-6 text-indigo-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                            </svg>
                            Documents
                        </a>

                        <a href="#"
                           class="text-indigo-100 hover:bg-indigo-600 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                            <!-- Heroicon name: outline/chart-bar -->
                            <svg class="mr-4 h-6 w-6 text-indigo-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                            Reports
                        </a>
                    </nav>
                </div>
            </div>
            <div class="flex-shrink-0 w-14" aria-hidden="true">
                <!-- Dummy element to force sidebar to shrink to fit close icon -->
            </div>
        </div>
    </div>

    <!-- Static sidebar for desktop -->
    <div class="hidden bg-indigo-700 md:flex md:flex-shrink-0">
        <div class="flex flex-col w-72">
            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div class="flex flex-col flex-grow border-r border-gray-200 pt-5 pb-4 bg-white overflow-y-auto">
                <div class="flex items-center flex-shrink-0 px-4">
                    <img class="h-32 w-auto" src="{{ asset('img/who-logo.svg') }}" alt="World Health Organization">
                </div>
                <div class="mt-5 flex-grow flex flex-col">
                    <nav class="flex-1 px-2 space-y-1 bg-white" aria-label="Sidebar">
                        @auth
                            <div>

                                <a href="{{url('nova')}}"
                                   class="bg-gray-100 text-gray-900 group w-full flex items-center pl-2 py-2 text-sm font-medium rounded-md">
                                    <!-- Current: "text-gray-600", Default: "text-gray-400 group-hover:text-gray-500" -->
                                    <!-- Heroicon name: outline/cog -->
                                    <svg class="mr-4 h-6 w-6 text-cyan-200 group-hover:text-cyan-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    Administration
                                </a>
                            </div>
                        @endauth
                        <div>
                            <!-- Current: "bg-gray-100 text-gray-900", Default: "bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
                            <a href="/"
                               class="bg-gray-100 text-gray-900 group w-full flex items-center pl-2 py-2 text-sm font-medium rounded-md">
                                <!-- Current: "text-gray-600", Default: "text-gray-400 group-hover:text-gray-500" -->
                                <!-- Heroicon name: outline/home -->
                                <svg class="text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                </svg>
                                Welcome
                            </a>
                        </div>

                        <div class="space-y-1">
                            <button
                                class="group w-full flex items-center pl-2 pr-1 py-2 text-sm font-medium rounded-md bg-white text-gray-600 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                <!-- Heroicon name: outline/users -->
                                <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                                Level of Care
                                <!-- Expanded: "text-gray-400 rotate-90", Collapsed: "text-gray-300" -->
                                <svg
                                    class="ml-auto h-5 w-5 transform group-hover:text-gray-400 transition-colors ease-in-out duration-150"
                                    viewBox="0 0 20 20" aria-hidden="true">
                                    <path d="M6 6L14 10L6 14V6Z" fill="currentColor"/>
                                </svg>
                            </button>
                            <!-- Expandable link section, show/hide based on state. -->
                            <div class="space-y-1">
                                @foreach(App\Models\InterventionLevel::all() as $levelofCare)
                                    <a href="{{ route('level-of-care', ['intervention_level_id' => $levelofCare->id]) }}"
                                       class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                        {{ $levelofCare->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <div class="space-y-1">
                            <button
                                class="group w-full flex items-center pl-2 pr-1 py-2 text-sm font-medium rounded-md bg-white text-gray-600 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                <!-- Heroicon name: outline/folder -->
                                <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/>
                                </svg>
                                Public Health Function
                                <!-- Expanded: "text-gray-400 rotate-90", Collapsed: "text-gray-300" -->
                                <svg
                                    class="ml-auto h-5 w-5 transform group-hover:text-gray-400 transition-colors ease-in-out duration-150"
                                    viewBox="0 0 20 20" aria-hidden="true">
                                    <path d="M6 6L14 10L6 14V6Z" fill="currentColor"/>
                                </svg>
                            </button>
                            <!-- Expandable link section, show/hide based on state. -->
                            <div class="space-y-1">

                                @foreach(App\Models\PublicHealthFunction::all() as $publicHealthFunction)
                                    <a href="{{ route('public-health-function', ['public_health_function_id' => $publicHealthFunction->id]) }}"
                                       class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                        {{$publicHealthFunction->name}}
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <div class="space-y-1">
                            <button
                                class="group w-full flex items-center pl-2 pr-1 py-2 text-sm font-medium rounded-md bg-white text-gray-600 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                <!-- Heroicon name: outline/calendar -->
                                <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                Program Area
                                <!-- Expanded: "text-gray-400 rotate-90", Collapsed: "text-gray-300" -->
                                <svg
                                    class="ml-auto h-5 w-5 transform group-hover:text-gray-400 transition-colors ease-in-out duration-150"
                                    viewBox="0 0 20 20" aria-hidden="true">
                                    <path d="M6 6L14 10L6 14V6Z" fill="currentColor"/>
                                </svg>
                            </button>
                            <!-- Expandable link section, show/hide based on state. -->
                            <div class="space-y-1">
                                @foreach(App\Models\ProgramArea::all() as $programArea)
                                    <a href="{{ route('program-area', ['program_area_id' => $programArea->id]) }}"
                                       class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                        {{$programArea->name}}
                                    </a>
                                @endforeach

                            </div>
                        </div>
                    </nav>
                </div>
            </div>


        </div>
    </div>
    <div class="flex flex-col w-0 flex-1 overflow-hidden">
        <main class="flex-1 relative overflow-y-auto focus:outline-none" tabindex="0">
            <div>
                <x-show-breakpoints></x-show-breakpoints>
                <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                    <h1 class="text-2xl font-semibold text-gray-900"> {{ $header ?? '' }}</h1>
                </div>
                <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                    <!-- Replace with your content -->
                    <div class="py-4">
                        <div class="border-4 border-dashed border-gray-200 rounded-lg h-full">
                            {{ $slot }}
                        </div>
                    </div>
                    <!-- /End replace -->
                </div>
            </div>
        </main>
    </div>
</div>
@stack('modals')

@livewireScripts

</body>
</html>
