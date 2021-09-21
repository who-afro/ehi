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
<div class="container mx-auto bg-iaho-map-country-background">
    <x-show-breakpoints></x-show-breakpoints>
    <x-nav />
    <header class="@isset ($header) py-4 @endisset }}">
        <h1 class="text-3xl font-semibold px-2"> {{ $header ?? '' }}</h1>
    </header>
    <main>
            <!-- Replace with your content -->
                {{ $slot }}
            <!-- /End replace -->
    </main>
</div>

@stack('modals')

@livewireScripts

</body>
</html>
