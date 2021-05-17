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
                                <a href="{{url('nova')}}" class="bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900 group w-full flex items-center pl-2 py-2 font-medium rounded-md">
                                    <x-heroicon-o-cog class="mr-3 h-6 w-6 text-gray-500 group-hover:text-gray-600" />
                                    Administration
                                </a>
                            </div>
                        @endauth
                        <div>
                            <!-- Current: "bg-gray-100 text-gray-900", Default: "bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
                            <a href="/" class="bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900 group w-full flex items-center pl-2 py-2 font-medium rounded-md">
                                <x-heroicon-o-home class="mr-3 h-6 w-6 text-gray-500 group-hover:text-gray-600" />
                                Welcome
                            </a>
                        </div>
                            <div>
                                <!-- Current: "bg-gray-100 text-gray-900", Default: "bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
                                <a href="{{ route('service-area-overview') }}"
                                   class="bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900 group w-full flex items-center pl-2 py-2 font-medium rounded-md">
                                    <x-heroicon-o-view-grid class="mr-3 h-6 w-6 text-gray-500 group-hover:text-gray-600" />
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
                                    <x-heroicon-o-users class="mr-3 h-6 w-6 text-gray-500 group-hover:text-gray-600" />
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
                                    <x-heroicon-o-folder class="mr-3 h-6 w-6 text-gray-500 group-hover:text-gray-600" />
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
                                    <x-heroicon-o-calendar class="mr-3 h-6 w-6 text-gray-500 group-hover:text-gray-600" />
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
