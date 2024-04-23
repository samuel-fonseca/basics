<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        @vite('resources/css/app.css')
    </head>
    <body class="font-sans antialiased bg-gray-800 text-white/50">
        <aside id="side-navigation" class="fixed top-0 left-0 h-full w-[15%] bg-slate-900 text-white p-8 shadow-2xl">
            <h1 class="text-2xl">Navigation</h1>
            <ul class="mt-4">
                <li><a href="{{ route('home') }}" class="block py-2">Home</a></li>
                <li><a href="{{ route('logout') }}" class="block py-2">Logout</a></li>
            </ul>
        </aside>
        <div id="app" class="fixed top-0 right-0 h-full w-[85%] overflow-scroll p-8 bg-slate-950 text-white">
            <div class="container mx-auto my-8">
                <livewire:user-card />
            </div>

            <div class="container mt-5 mx-auto">
                <h1 class="text-2xl text-center">Be Inspired</h1>
                <livewire:quotes />
            </div>
        </div>
    </body>
</html>
