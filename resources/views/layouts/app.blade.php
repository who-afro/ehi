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

@livewireStyles

<!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.1/dist/alpine.min.js" defer></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased">
<div class="h-screen flex overflow-hidden bg-gray-100">
    <!-- Static sidebar for desktop -->
    <div class="hidden bg-indigo-700 md:flex md:flex-shrink-0">
        <div class="flex flex-col w-80">
            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div class="flex flex-col flex-grow border-r border-gray-200 pt-5 pb-4 bg-white overflow-y-auto">
                <div class="flex items-center flex-shrink-0 px-4">
                    <img class="h-32 w-auto" src="{{ asset('img/who-logo.svg') }}" alt="World Health Organization">
                </div>
                <div class="mt-5 flex-grow flex flex-col">
                    <nav class="flex-1 px-2 space-y-1 bg-white" aria-label="Sidebar">
                        @auth
                            <div>
                                <a href="{{url('nova')}}" class="bg-gray-100 text-gray-900 group w-full flex items-center pl-2 py-2 font-medium rounded-md">
                                    <!-- Current: "text-gray-600", Default: "text-gray-400 group-hover:text-gray-500" -->
                                    <!-- Heroicon name: outline/cog -->
                                    <svg class="mr-4 h-6 w-6 text-cyan-200 group-hover:text-cyan-200"
                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    Administration
                                </a>
                            </div>
                        @endauth
                        <div x-data="{ open: false">
                            <!-- Current: "bg-gray-100 text-gray-900", Default: "bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
                            <a x-data href="/"
                               class="bg-gray-100 text-gray-900 group w-full flex items-center pl-2 py-2 font-medium rounded-md">
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
                            <div>
                                <!-- Current: "bg-gray-100 text-gray-900", Default: "bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
                                <a href="{{ route('service-area-overview') }}"
                                   class="bg-gray-100 text-gray-900 group w-full flex items-center pl-2 py-2 font-medium rounded-md">
                                    <!-- Current: "text-gray-600", Default: "text-gray-400 group-hover:text-gray-500" -->
                                    <!-- Heroicon name: view-grid -->
                                    <svg class="text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                    </svg>
                                    Service Areas
                                </a>
                            </div>

                            <div
                                @if (Route::is('level-of-care*'))
                                    x-data="{ open: true }"
                                @else
                                    x-data="{ open: false }"
                                @endif
                                class="space-y-1">
                                <button type="button" class="bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900 group w-full flex items-center pl-2 pr-1 py-2 font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" x-state:on="Current" x-state:off="Default" aria-controls="sub-menu-1" @click="open = !open" aria-expanded="true" x-bind:aria-expanded="open.toString()" x-state-description="Current: &quot;bg-gray-100 text-gray-900&quot;, Default: &quot;bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900&quot;">
                                    <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6" x-description="Heroicon name: outline/users" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                    </svg>
                                    Level of Care
                                    <svg class="ml-auto h-5 w-5 transform group-hover:text-gray-400 transition-colors ease-in-out duration-150 text-gray-400 rotate-90" viewBox="0 0 20 20" x-state:on="Expanded" x-state:off="Collapsed" aria-hidden="true" :class="{ 'text-gray-400 rotate-90': open, 'text-gray-300': !(open) }">
                                        <path d="M6 6L14 10L6 14V6Z" fill="currentColor"></path>
                                    </svg>
                                </button>
                                <div x-description="Level of Care" class="space-y-1" id="sub-menu-1" x-show="open">
                                    <a href="{{ route('level-of-care-overview') }}" class="group w-full flex items-center pl-11 pr-2 py-2 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                       Overview
                                    </a>
                                    @foreach(App\Models\LevelOfCare::all() as $levelofCare)
                                        <a href="{{ route('level-of-care', ['level_of_care_id' => $levelofCare->id]) }}" class="group w-full flex items-center pl-11 pr-2 py-2 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                            {{ $levelofCare->name }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>

                            <div  @if (Route::is('public-health-function*'))
                                  x-data="{ open: true }"
                                  @else
                                  x-data="{ open: false }"
                                  @endif class="space-y-1">
                                <button type="button" class="bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900 group w-full flex items-center pl-2 pr-1 py-2 font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" x-state:on="Current" x-state:off="Default" aria-controls="sub-menu-1" @click="open = !open" aria-expanded="true" x-bind:aria-expanded="open.toString()" x-state-description="Current: &quot;bg-gray-100 text-gray-900&quot;, Default: &quot;bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900&quot;">
                                    <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6" x-description="Heroicon name: outline/folder" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                                    </svg>
                                    Public Health Function
                                    <svg class="ml-auto h-5 w-5 transform group-hover:text-gray-400 transition-colors ease-in-out duration-150 text-gray-400 rotate-90" viewBox="0 0 20 20" x-state:on="Expanded" x-state:off="Collapsed" aria-hidden="true" :class="{ 'text-gray-400 rotate-90': open, 'text-gray-300': !(open) }">
                                        <path d="M6 6L14 10L6 14V6Z" fill="currentColor"></path>
                                    </svg>
                                </button>
                                <div x-description="Level of Care" class="space-y-1" id="sub-menu-1" x-show="open">
                                    <a href="{{ route('public-health-function-overview') }}" class="group w-full flex items-center pl-11 pr-2 py-2 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                        Overview
                                    </a>
                                    @foreach(App\Models\PublicHealthFunction::all() as $publicHealthFunction)
                                        <a href="{{ route('public-health-function', ['public_health_function_id' => $publicHealthFunction->id]) }}"
                                           class="group w-full flex items-center pl-11 pr-2 py-2 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                            {{$publicHealthFunction->name}}
                                        </a>
                                    @endforeach
                                </div>
                            </div>

                            <div  @if (Route::is('program-area*'))
                                  x-data="{ open: true }"
                                  @else
                                  x-data="{ open: false }"
                                  @endif class="space-y-1">
                                <button type="button" class="bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900 group w-full flex items-center pl-2 pr-1 py-2 font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" x-state:on="Current" x-state:off="Default" aria-controls="sub-menu-1" @click="open = !open" aria-expanded="true" x-bind:aria-expanded="open.toString()" x-state-description="Current: &quot;bg-gray-100 text-gray-900&quot;, Default: &quot;bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900&quot;">
                                    <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6" x-description="Heroicon name: outline/folder" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Program Area
                                    <svg class="ml-auto h-5 w-5 transform group-hover:text-gray-400 transition-colors ease-in-out duration-150 text-gray-400 rotate-90" viewBox="0 0 20 20" x-state:on="Expanded" x-state:off="Collapsed" aria-hidden="true" :class="{ 'text-gray-400 rotate-90': open, 'text-gray-300': !(open) }">
                                        <path d="M6 6L14 10L6 14V6Z" fill="currentColor"></path>
                                    </svg>
                                </button>
                                <div x-description="Level of Care" class="space-y-1" id="sub-menu-1" x-show="open">
                                    <a href="{{ route('program-area-overview') }}" class="group w-full flex items-center pl-11 pr-2 py-2 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                        Overview
                                    </a>
                                    @foreach(App\Models\ProgramArea::all() as $programArea)
                                        <a href="{{ route('program-area', ['program_area_id' => $programArea->id]) }}"
                                           class="group w-full flex items-center pl-11 pr-2 py-2 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
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
                <div class="max-w-7xl mx-auto">
                    <h1 class="text-2xl font-semibold text-gray-900 pl-6"> {{ $header ?? '' }}</h1>
                </div>
                <div class="max-w-7xl mx-auto">
                    <!-- Replace with your content -->
                    <div class="h-full">
                            {{ $slot }}
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
