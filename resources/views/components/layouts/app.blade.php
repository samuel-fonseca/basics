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
        <aside id="side-navigation" class="fixed top-0 left-0 h-full w-[15%] bg-slate-900 border-r border-slate-950 text-white p-8 shadow-3xl z-50">
            <h1 class="text-2xl">Navigation</h1>
            <ul class="mt-4">
                <li>
                    <a
                        href="{{ route('home') }}"
                        @class([
                            'block py-2',
                            'font-bold' => request()->routeIs('home'),
                        ])
                    >
                        Home
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('posts') }}"
                        @class([
                            'block py-2',
                            'font-bold' => request()->routeIs('posts'),
                        ])
                    >
                        Posts
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('logout') }}"
                        class="block py-2"
                    >
                        Logout
                    </a>
                </li>
            </ul>
        </aside>

        <div id="app" class="fixed top-0 right-0 h-full w-[85%] overflow-scroll p-8 bg-slate-800 text-white z-0">
            @yield('content', $slot ?? null)
        </div>

        @filamentScripts
        @vite('resources/js/app.js')
    </body>
</html>
