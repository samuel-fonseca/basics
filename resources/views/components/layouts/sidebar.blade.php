@props([
    'links' => [],
])


<aside {{ $attributes->merge([
        'id' => 'side-navigation',
        'class' => 'fixed top-0 left-0 h-full w-[15%] bg-slate-900 border-r border-slate-950 text-white p-8 shadow-3xl z-50 flex flex-col justify-between'
]) }}>
    <div id="navigation-link">
        <h1 class="text-xl">My App</h1>
        <ul class="mt-4">
            @foreach($links as $link)
                <li>
                    <a
                        href="{{ route($link['route']) }}"
                        @class([
                            'block py-2 hover:text-gray-300 transition-colors',
                            'font-bold' => request()->routeIs($link['route']),
                        ])
                    >
                        {{ $link['name'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="navigation-footer">
        <x-divider class="my-2" />
        <a
            href="{{ route('logout') }}"
            class="py-2 flex gap-2 justify-between hover:text-red-200 transition-colors"
        >
            Logout
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
            </svg>

        </a>
    </div>
</aside>
