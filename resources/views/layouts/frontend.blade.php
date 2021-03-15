<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="_base_url" content="{{ url('/') }}">
    <title>
        @if (config('app.env') == 'local') [LOCAL] @endif
        @hasSection ('title')
            @yield('title')
        @else
            {{ config('app.name') }}
        @endif
    </title>

    <meta name="robots" content="index, follow">
    @yield('meta_seo')

    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('favicon.ico') }}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="{{ URL::asset('css/sosmed_icons/flaticon.css?_=' . rand()) }}">
    @stack('top_css')
    <link rel="stylesheet" href="{{ URL::asset('css/app.css?_=' . rand()) }}">
    @stack('bottom_css')

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
    <script>
        const BASE_URL = '{{ url('/') }}';
    </script>
</head>
<body class="flex flex-col min-h-screen justify-between text-sm text-ib-one">
    <nav class="w-full fixed z-30 top-0 left-0 right-0 bg-white bg-blur bg-opacity-60 xl:bg-opacity-70 border border-t-0 border-r-0 border-l-0 border-solid border-gray-200 py-4 leading-9 xl:leading-7">
        <div class="w-11/12 sm:w-3/5 lg:w-3/4 mx-auto xl:flex xl:flex-row xl:items-center xl:justify-between">
            <div class="flex flex-row items-center justify-between xl:w-1/3">
                <button class="p-1 outline-none hover:outline-none focus:outline-none xl:hidden" id="nav-button">
                    <svg class="w-6 h-auto text-ib-one" id="nav-burger" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
                    </svg>
                    <svg class="w-6 h-6 text-ib-one hidden" id="nav-close" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <div class="w-full text-center xl:text-left">
                    <a href="{{ route('index') }}" class="-ml-5 xl:-ml-0 font-bold text-ib-three xl:mt-1 text-xl relative top-1 xl:top-0">
                        <span id="brand-name">
                            {{ config('app.name') }}
                        </span>
                    </a>
                </div>
            </div>
            <div class="hidden w-4/5 md:w-3/5 lg:w-2/5 xl:w-full mx-auto xl:flex xl:flex-row xl:items-center xl:justify-end mt-6 xl:mt-0 sm:pb-10 xl:pb-0 min-h-screen xl:min-h-0 z-40" id="nav-container">
                <div class="text-center font-bold text-ib-three xl:mt-1 text-4xl mb-10 xl:hidden">
                    IHM
                </div>
                <div class="flex flex-col xl:flex-row justify-end w-full xl:w-1/2 xl:order-last">
                    <select class="hidden xl:block px-1 mr-4 bg-transparent outline-none" onchange="changeLang(this)">
                        <option value="id" @if (App::isLocale('id')) selected @endif>ID</option>
                        <option value="en" @if (App::isLocale('en')) selected @endif>EN</option>
                    </select>
                    <form action="{{ route('blog.post.search') }}" method="get" class="flex flex-row items-center justify-center py-1 px-3 border border-solid border-gray-400 xl:border-gray-100 rounded-md bg-gray-400 xl:bg-gray-100">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="search w-6 h-6 xl:w-5 xl:h-5 text-white xl:text-ib-one"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                        <input type="search" name="q" class="w-full ml-2 py-1 xl:py-0 px-2 outline-none hover:outline-none bg-transparent text-white xl:text-ib-one placeholder-gray-100 xl:placeholder-gray-400 text-lg xl:text-sm" placeholder="{{ __('nav.search') }}">
                    </form>
                </div>
                <div class="w-full h-full sm:h-32 md:h-full xl:h-auto sm:overflow-y-scroll xl:overflow-hidden text-center xl:text-left mt-8 xl:mt-0">
                    <ul class="list-none">
                        <li class="mb-3 xl:mb-0 xl:inline-block">
                            <a href="{{ route('index') }}" class="text-lg xl:text-sm block py-2 xl:py-0 px-3 transition-all duration-500 @if (request()->is('/')) text-gray-400 @else text-ib-one hover:text-gray-400 @endif">
                                {{ __('nav.home') }}
                            </a>
                        </li>
                        <li class="mb-3 xl:mb-0 xl:inline-block">
                            <a href="{{ route('portfolio') }}" class="text-lg xl:text-sm block py-2 xl:py-0 px-3 transition-all duration-500 @if (request()->is('portfolio') or request()->is('portfolio*')) text-gray-500 @else text-ib-one hover:text-gray-400 @endif">
                                {{ __('nav.portfolio') }}
                            </a>
                        </li>
                        <li class="mb-3 xl:mb-0 xl:inline-block">
                            <a href="{{ route('resume') }}" class="text-lg xl:text-sm block py-2 xl:py-0 px-3 transition-all duration-500  @if (request()->is('resume') or request()->is('resume*')) text-gray-500 @else text-ib-one hover:text-gray-400 @endif">
                                {{ __('nav.resume') }}
                            </a>
                        </li>
                        <li class="mb-3 xl:mb-0 xl:inline-block">
                            <a href="{{ route('blog.index') }}" class="text-lg xl:text-sm block py-2 xl:py-0 px-3 transition-all duration-500 @if (request()->is('blog') OR request()->is('blog*')) text-gray-500 @else text-ib-one hover:text-gray-400 @endif">
                                {{ __('nav.blog') }}
                            </a>
                        </li>
                        <li class="mb-3 xl:mb-0 xl:inline-block">
                            <a href="{{ route('contact') }}" class="text-lg xl:text-sm block py-2 xl:py-0 px-3 transition-all duration-500 @if (request()->is('contact') or request()->is('contact*')) text-gray-500 @else text-ib-one hover:text-gray-400 @endif">
                                {{ __('nav.contact') }}
                            </a>
                        </li>
                    </ul>
                    <div class="text-center block xl:hidden">
                        <select class="px-1 py-2 bg-transparent outline-none text-lg" onchange="changeLang(this)">
                            <option value="id" @if (App::isLocale('id')) selected @endif>ID</option>
                            <option value="en" @if (App::isLocale('en')) selected @endif>EN</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <main class="mt-16 xl:mt-20 mb-auto pt-4">
        @yield('content')
    </main>
    <footer class="w-full pt-14 xl:pt-20 pb-8 bg-ib-one text-ib-four">
        <x-frontend-container>
            <div class="mb-10">
                <h2 class="font-bold text-xl xl:text-3xl text-center">
                    "{{ __('global.footer_cta') }}"
                </h2>
                <div class="mt-6 flex items-center justify-center">
                    <a href="{{ route('contact') }}" class="px-6 py-2 bg-transparent hover:bg-ib-three border border-solid border-ib-three text-ib-three hover:text-ib-four shadow-lg outline-none focus:outline-none rounded-full transition-all duration-500">
                        {{ __('global.lets_discuss') }}
                    </a>
                </div>
            </div>
            <div class="text-center flex flex-col lg:flex-row lg:items-center lg:justify-between">
                <div class="flex flex-row justify-center mb-4 lg:order-last">
                    <a href="{{ $user->github }}" target="_blank" title="Github" rel="noopener noreferrer" class="w-7 h-7 flex items-center justify-center bg-white mx-1 border border-solid border-ib-four hover:border-ib-three text-ib-one hover:text-ib-three rounded-full transition-all duration-500">
                        <svg class="w-5 h-auto" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                            <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                        </svg>
                    </a>
                    <a href="{{ $user->twitter }}" target="_blank" title="Twitter" rel="noopener noreferrer" class="w-7 h-7 flex items-center justify-center bg-white mx-1 border border-solid border-ib-four hover:border-ib-three text-ib-one hover:text-ib-three rounded-full transition-all duration-500">
                        <svg class="w-4 h-auto" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                            <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                        </svg>
                    </a>
                    <a href="{{ $user->linkedin }}" target="_blank" title="Linkedin" rel="noopener noreferrer" class="w-7 h-7 flex items-center justify-center bg-white mx-1 border border-solid border-ib-four hover:border-ib-three text-ib-one hover:text-ib-three rounded-full transition-all duration-500">
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

    <script src="{{ URL::asset('js/navigation.js?_=' . rand()) }}"></script>
    <script src="{{ URL::asset('js/app.js?_=' . rand()) }}"></script>
    @stack('bottom_js')

    <script>
        const changeLang = (e) => {
            window.location.href = BASE_URL + '/' + e.value;
        }
    </script>

</body>
</html>