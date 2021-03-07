<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @if (config('app.env') == 'local') [LOCAL] @endif
        @hasSection ('title')
            @yield('title') - {{ config('app.name') }}
        @else
            {{ config('app.name') }}
        @endif
    </title>

    @yield('meta_seo')

    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('favicon.ico') }}">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="{{ URL::asset('css/sosmed_icons/flaticon.css?_=' . rand()) }}">
    @stack('top_css')
    <link rel="stylesheet" href="{{ URL::asset('css/app.css?_=' . rand()) }}">
    @stack('bottom_css')

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js" defer></script>
    @livewireStyles

    @if (config('app.env') == 'production')
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-177527651-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-177527651-2');
    </script>
    @endif
</head>
<body class="flex flex-col min-h-screen justify-between text-sm xl:text-base text-ib-one"
    :class="opendropdown ? 'overflow-hidden' : 'overflow-y-auto'"
    x-data="{ opendropdown: false, is_modal_open: false }">
    <nav class="w-full fixed xl:relative z-30 top-0 left-0 right-0 bg-white shadow-md xl:shadow-sm py-4 xl:py-5 leading-9 xl:leading-7">
        <div class="w-11/12 sm:w-3/5 lg:w-3/4 mx-auto xl:flex xl:flex-row xl:items-center xl:justify-between">
            <div class="flex flex-row items-center justify-between xl:w-auto xl:mr-10">
                <a href="{{ route('index') }}" class="ml-2 xl:ml-0 font-bold text-ib-three xl:mt-1 text-xl">
                    <span :class="opendropdown ? 'hidden' : 'block'">
                        IHM
                    </span>
                </a>
                <button class="p-1 outline-none hover:outline-none focus:outline-none xl:hidden" @click="opendropdown = !opendropdown;">
                    <svg viewBox="0 0 20 20" fill="currentColor" class="menu-alt3 w-6 h-6 text-ib-one" :class="opendropdown ? 'hidden' : 'block'">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    <svg class="w-6 h-6 text-ib-one" :class="opendropdown ? 'block' : 'hidden'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div :class="opendropdown ? 'block' : 'hidden'" class="w-4/5 md:w-3/5 lg:w-2/5 xl:w-full mx-auto xl:flex xl:flex-row xl:items-center xl:justify-end mt-6 xl:mt-0 sm:pb-10 xl:pb-0 min-h-screen xl:min-h-0 z-40">
                <div class="text-center font-bold text-ib-three xl:mt-1 text-4xl mb-10 xl:hidden">
                    IHM
                </div>
                <div class="flex flex-col xl:flex-row justify-end w-full xl:w-2/3 xl:mx-auto xl:ml-6 xl:order-last">
                    <select class="lang-changer hidden xl:block w-10 mr-4 bg-white outline-none">
                        <option value="id">ID</option>
                        <option value="en">EN</option>
                    </select>
                    <form action="{{ route('blog.post.search') }}" method="get" class="flex flex-row items-center justify-center py-1 px-3 shadow-md xl:shadow-none border border-solid border-gray-400">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="search w-6 h-6 xl:w-5 xl:h-5 text-ib-one"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                        <input type="search" name="q" class="w-full ml-2 py-1 xl:py-0 px-2 outline-none hover:outline-none bg-transparent text-ib-one text-lg xl:text-base" placeholder="Pencarian">
                    </form>
                </div>
                <div class="w-full h-full sm:h-32 md:h-full xl:h-auto sm:overflow-y-scroll xl:overflow-hidden text-center xl:text-left mt-8 xl:mt-0">
                    <ul class="list-none">
                        <li class="mb-3 xl:mb-0 xl:inline-block">
                            <a href="{{ route('index') }}" class="text-lg xl:text-base block py-2 xl:py-0 px-3 text-ib-one hover:underline @if (request()->is('/')) underline @endif">
                                Home
                            </a>
                        </li>
                        <li class="mb-3 xl:mb-0 xl:inline-block">
                            <a href="{{ route('portfolio') }}" class="text-lg xl:text-base block py-2 xl:py-0 px-3 text-ib-one hover:underline @if (request()->is('portfolio') or request()->is('portfolio*')) underline @endif">
                                Portofolio
                            </a>
                        </li>
                        <li class="mb-3 xl:mb-0 xl:inline-block">
                            <a href="{{ __('#') }}" class="text-lg xl:text-base block py-2 xl:py-0 px-3 text-ib-one hover:underline">
                                Resume
                            </a>
                        </li>
                        <li class="mb-3 xl:mb-0 xl:inline-block">
                            <a href="{{ route('blog.index') }}" class="text-lg xl:text-base block py-2 xl:py-0 px-3 text-ib-one hover:underline @if (request()->is('blog') OR request()->is('blog*')) underline @endif">
                                Blog
                            </a>
                        </li>
                        <li class="mb-3 xl:mb-0 xl:inline-block">
                            <a href="{{ __('#') }}" class="text-lg xl:text-base block py-2 xl:py-0 px-3 text-ib-one hover:underline">
                                Hubungi Saya
                            </a>
                        </li>
                    </ul>
                    <div class="text-center block xl:hidden">
                        <select class="lang-changer w-10 bg-white outline-none text-lg py-2">
                            <option value="id">ID</option>
                            <option value="en">EN</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <main class="mt-16 xl:mt-4 mb-auto pt-4">
        @yield('content')
    </main>
    <footer class="w-full pt-14 xl:pt-20 pb-8 bg-ib-one text-ib-four">
        <x-frontend-container>
            <div class="mb-10">
                <h2 class="font-bold text-xl xl:text-3xl text-center">
                    "Izinkan saya membuat aplikasi web yang Anda butuhkan"
                </h2>
                <div class="mt-6 flex items-center justify-center">
                    <a href="{{ __('#') }}" class="px-6 py-2 bg-transparent hover:bg-white border border-solid border-ib-three text-ib-three shadow-lg outline-none focus:outline-none">
                        Mari kita diskusikan
                    </a>
                </div>
            </div>
            <div class="text-center flex flex-col lg:flex-row lg:items-center lg:justify-between">
                <div class="flex flex-row justify-center mb-4 lg:order-last">
                    <a href="#" target="_blank" title="Github" rel="noopener noreferrer" class="w-7 h-7 flex items-center justify-center bg-white mx-1 border border-solid border-ib-four hover:border-ib-three text-ib-one hover:text-ib-three rounded-full">
                        <svg class="w-5 h-auto" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                            <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                        </svg>
                    </a>
                    <a href="#" target="_blank" title="Twitter" rel="noopener noreferrer" class="w-7 h-7 flex items-center justify-center bg-white mx-1 border border-solid border-ib-four hover:border-ib-three text-ib-one hover:text-ib-three rounded-full">
                        <svg class="w-4 h-auto" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                            <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                        </svg>
                    </a>
                    <a href="#" target="_blank" title="Linkedin" rel="noopener noreferrer" class="w-7 h-7 flex items-center justify-center bg-white mx-1 border border-solid border-ib-four hover:border-ib-three text-ib-one hover:text-ib-three rounded-full">
                        <svg class="w-4 h-auto" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                            <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                        </svg>
                    </a>
                </div>
                <div class="text-sm">
                    Ibnu Halim Mustofa - Copyright 2020
                </div>
            </div>
        </x-frontend-container>
    </footer>

    @livewireScripts
    @stack('bottom_js')

</body>
</html>