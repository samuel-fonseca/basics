<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8" />

        <meta name="application-name" content="{{ config('app.name') }}" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>{{ config('app.name') }}</title>

        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>

        @filamentStyles
        @vite('resources/css/app.css')
    </head>

    <body class="antialiased bg-slate-900 text-gray-50">
        <x-layouts.sidebar :links="[
            ['name' => 'Home', 'route' => 'home'],
            ['name' => 'Posts', 'route' => 'posts'],
            ['name' => 'Available Components', 'route' => 'available-components'],
        ]" />

        <div id="app" class="fixed top-0 right-0 h-full w-[85%] overflow-scroll p-8 bg-slate-800 text-white z-0">
            @yield('content', $slot ?? null)
        </div>

        @filamentScripts
        @vite('resources/js/app.js')
    </body>
</html>
