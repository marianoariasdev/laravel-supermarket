<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('resources/js/app.js')

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    {{--
    <x-banner />

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white dark:bg-gray-900 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main class="text-black dark:text-white p-4 w-full md:max-w-7xl mx-auto">
            {{ $slot }}
        </main>
    </div> --}}
    <header class="flex flex-wrap sm:justify-start sm:flex-nowrap z-50 w-full text-sm">
        @include('components.navbar')
    </header>

    <main id="content">
        <div
            class="w-full mx-auto min-h-screen bg-slate-100 border-x-gray-200 py-4 px-4 sm:px-6 lg:px-8 xl:border-x dark:bg-gray-900 dark:border-x-gray-700">
            {{ $slot }}
        </div>
    </main>

    @stack('modals')

    @livewireScripts
</body>

</html>