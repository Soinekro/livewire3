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
    <script defer src="{{ asset('navs/navcurv.js') }}"></script>
    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased dark:bg-gray-900">
    <div class="h-full ">
        <!-- Sidebar compponent -->
        <x-layouts.navs.nav-curv />
        <!--end Sidebar -->

        <div class="p-4 sm:ml-64">
            <div class="p-4 dark:border-gray-700 mt-14 sm:px-20  dark:bg-gray-800 border-b border-gray-200 rounded-md">
                {{ $slot }}
            </div>
        </div>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>
