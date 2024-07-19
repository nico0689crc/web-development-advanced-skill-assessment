<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Career Training College (CTC)') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased min-h-screen flex flex-col">
        <div class="bg-gray-100 flex-grow">
            @include('layouts.navigation')
            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

        </div>
        <footer class="bg-white border-t border-indigo-100 p-6 flex-shrink">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                    <div class="text-sm font-medium text-indigo-500">
                        © 2024 Career Training College. All rights reserved.
                    </div>
                    <div class="flex flex-col md:flex-row gap-1 md:gap-4 items-center">
                        <a href="#" class="text-sm font-medium text-indigo-500 hover:text-indigo-700 transition duration-150 ease-in-out">Privacy Policy</a>
                        <a href="#" class="text-sm font-medium text-indigo-500 hover:text-indigo-700 transition duration-150 ease-in-out">Terms of Service</a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
