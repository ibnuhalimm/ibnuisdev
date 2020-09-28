<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ibnu's Dashboard</title>
    <meta name="robots" content="noindex, nofollow">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    @stack('top_css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('bottom_css')

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js" defer></script>
    @livewireStyles

    @stack('top_scripts')

</head>
<body class="bg-gray-200 flex flex-col min-h-screen justify-between text-sm" :class="{'overflow-hidden': opendropdown, 'overflow-y-auto': !opendropdown}" x-data="{ opendropdown: false }">
    <nav class="">
        <div class="w-full fixed z-30 h-1 top-0 left-0 right-0 bg-ib-three"></div>
        <div class="w-full fixed z-30 top-0 left-0 right-0 bg-ib-one shadow-md xl:shadow-none py-3 xl:py-5 leading-9 xl:leading-6 mt-1">
            <div class="w-11/12 sm:w-3/5 xl:w-4/5 mx-auto xl:flex xl:flex-row xl:items-center xl:justify-between">
                <div class="flex flex-row items-center justify-between xl:w-1/6">
                    <a href="{{ route('home') }}" class="font-bold text-xl uppercase text-white">
                        Ibnu's
                    </a>
                    <button class="p-1 outline-none hover:outline-none focus:outline-none xl:hidden" @click="opendropdown = !opendropdown;">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="menu-alt3 w-6 h-6 fill-current text-white"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                <div :class="{'block': opendropdown, 'hidden': !opendropdown}" class="xl:flex xl:flex-row xl:items-center xl:justify-between mt-6 xl:mt-0 sm:pb-10 xl:pb-0 w-full min-h-screen xl:min-h-0 z-40">
                    <div class="flex flex-row items-center justify-center xl:justify-start text-center xl:text-left py-1 px-3 xl:py-1">
                        @auth
                            <ul>
                                <li class="mb-3 xl:mb-0 xl:inline-block">
                                    <a href="{{ route('home') }}" class="block px-6 text-white hover:text-gray-300 @if (Request::is('home')) font-bold @endif">Dashboard</a>
                                </li>
                                <li class="mb-3 xl:mb-0 xl:inline-block">
                                    <a href="{{ route('dashboard.section.index') }}" class="block px-6 text-white hover:text-gray-300 @if (Request::is('home/section')) font-bold @endif">
                                        Section
                                    </a>
                                </li>
                                <li class="mb-3 xl:mb-0 xl:inline-block">
                                    <a href="#" class="block px-6 text-white hover:text-gray-300">
                                        Projects
                                    </a>
                                </li>
                                <li class="mb-3 xl:mb-0 xl:inline-block">
                                    <a href="#" class="block px-6 text-white hover:text-gray-300">
                                        Skills
                                    </a>
                                </li>
                                <li class="mb-3 xl:mb-0 xl:inline-block">
                                    <a href="#" class="block px-6 text-white hover:text-gray-300">
                                        Messages
                                    </a>
                                </li>
                            </ul>
                        @endauth
                    </div>
                    <hr class="w-full h-1 mt-2 border border-r-0 border-b-0 border-l-0 border-solid border-gray-600 block xl:hidden">
                    <div class="h-full sm:h-64 xl:h-auto sm:overflow-y-auto xl:overflow-hidden text-center xl:text-right mt-1 xl:mt-0 py-5 xl:py-0">
                        <ul>
                            <li class="mb-3 xl:mb-0 xl:inline-block menu-item">
                                @guest
                                    <span class="px-3 text-white hover:text-gray-300 inline-flex menu-item--link">
                                        Login
                                    </span>
                                @else
                                    <a href="#" class="px-3 text-white hover:text-gray-300 inline-flex menu-item--link">
                                        {{ Auth::user()->name }}
                                        <svg class="fill-current h-6 w-4 ml-2 hidden xl:block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                        </svg>
                                    </a>

                                    <ul class="xl:absolute px-0 bg-ib-one py-2 xl:pt-8 xl:pb-4 md:rounded-bl-md md:rounded-br-md md:shadow-md menu-item--sub xl:text-left">
                                        <li>
                                            <a href="#" class="block px-5 py-2 text-gray-400 hover:text-gray-100 focus:text-gray-100 xl:text-gray-500 text-sm xl:text-base">
                                                Profil
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('auth.logout') }}" class="block px-5 py-2 text-gray-400 hover:text-gray-100 focus:text-gray-100 xl:text-gray-500 text-sm xl:text-base">
                                                Logout
                                            </a>
                                        </li>
                                    </ul>
                                @endguest
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <main class="mt-16 xl:mt-20 mb-auto pt-6 pb-10">
        <div class="w-11/12 sm:w-3/5 xl:w-4/5 mx-auto">

            @yield('content')

        </div>
    </main>
    <footer class="w-full text-center py-4 bg-white text-xs">
        <p class="text-ib-three">
            Ibnu's - Copyright 2020 @if (date('Y') != 2020) {{ ' - ' . date('Y') }} @endif
        </p>
    </footer>

    @livewireScripts
    @stack('bottom_scripts')

</body>
</html>