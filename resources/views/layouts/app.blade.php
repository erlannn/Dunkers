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

        <!-- Scripts min-h-screen bg-[#1A1A1A] -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class=" min-h-screen bg-[#1A1A1A]">
            @include('layouts.navigation')

            <!-- Page Heading bg-[#F4F4F4] -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <footer class="py-4">
                <div class="border-t-2 flex justify-center bg-[#1A1A1A] border-[#E67E22]">
                    <div class="py-3 justify-between">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-[#E67E22]" />
                    </div>
                    <div class="pt-4 px-2 justify-between">
                        <p class=" text-3xl font-bold text-[#E67E22]">Dunkers</p>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
