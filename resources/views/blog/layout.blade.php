<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @hasSection ('title')
            @yield('title') - {{ config('app.name') }}
        @else
            {{ config('app.name') }}
        @endif
    </title>

    @yield('meta_seo')

    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('favicon.ico') }}">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ URL::asset('css/sosmed_icons/flaticon.css?_=' . rand()) }}">
    @stack('top_css')
    <link rel="stylesheet" href="{{ URL::asset('css/app.css?_=' . rand()) }}">
    @stack('bottom_css')

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js" defer></script>
    @livewireStyles

    @if (config('app.env') == 'production')
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-177527651-1"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-177527651-1');
        </script>
    @endif
</head>
<body class="bg-gray-100 xl:bg-white flex flex-col min-h-screen justify-between text-base" :class="{'overflow-hidden': opendropdown, 'overflow-y-auto': !opendropdown}" x-data="{ opendropdown: false }">
    <nav class="">
        <div class="w-full fixed z-30 top-0 left-0 right-0 bg-white shadow-md xl:shadow-none py-3 xl:py-5 leading-9 xl:leading-7">
            <div class="w-11/12 sm:w-3/5 xl:w-3/4 mx-auto xl:flex xl:flex-row xl:items-center xl:justify-between">
                <div class="flex flex-row items-center justify-between xl:w-1/6">
                    <a href="{{ route('blog.index') }}" class="ml-2 font-bold text-ib-three xl:mt-1 text-xl">
                        IBNU'S BLOG
                    </a>
                    <button class="p-1 outline-none hover:outline-none focus:outline-none xl:hidden" @click="opendropdown = !opendropdown;">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="menu-alt3 w-6 h-6"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                <div :class="{'block': opendropdown, 'hidden': !opendropdown}" class="xl:flex xl:flex-row xl:items-center xl:justify-between mt-6 xl:mt-0 sm:pb-10 xl:pb-0 w-full min-h-screen xl:min-h-0 z-40">
                    <form action="{{ route('blog.post.search') }}" method="get" class="flex flex-row items-center justify-center py-1 px-3 xl:py-1 shadow-md xl:shadow-none rounded-md border border-solid border-gray-300 xl:w-full xl:mx-auto xl:ml-6">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="search w-6 h-6 xl:w-5 xl:h-5"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                        <input type="search" name="q" class="w-full ml-2 px-2 outline-none hover:outline-none" placeholder="Pencarian Artikel">
                    </form>
                    <div class="w-full h-full sm:h-64 xl:h-auto sm:overflow-y-auto xl:overflow-hidden text-center xl:text-right mt-8 xl:mt-0">
                        <ul>
                            <li class="mb-3 xl:mb-0 xl:inline-block">
                                <a href="{{ route('index') }}" class="block font-bold px-3 hover:text-ib-three">Home</a>
                            </li>
                            <li class="mb-3 xl:mb-0 xl:inline-block">
                                <a href="{{ route('index') }}/#portfolio-section" class="block font-bold px-3 hover:text-ib-three">Portfolio</a>
                            </li>
                            <li class="mb-3 xl:mb-0 xl:inline-block">
                                <a href="{{ route('index') }}/#skills-section" class="block font-bold px-3 hover:text-ib-three">Skills</a>
                            </li>
                            <li class="mb-3 xl:mb-0 xl:inline-block">
                                <a href="{{ route('blog.index') }}" class="block font-bold px-3 text-ib-three hover:text-ib-three">Blog</a>
                            </li>
                            <li class="mb-3 xl:mb-0 xl:inline-block">
                                <a href="{{ route('index') }}/#contact-section" class="block font-bold px-3 text-ib-three xl:text-ib-three xl:hover:text-white xl:hover:bg-ib-three xl:border xl:border-solid xl:border-ib-three xl:rounded-md">
                                    Contact Me
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <main class="mt-16 xl:mt-20 mb-auto pt-4 pb-10">
        <div class="w-11/12 sm:w-3/5 xl:w-3/4 mx-auto">

            @yield('content')

        </div>
    </main>
    <footer class="w-full text-center py-4 bg-white">
        <p class="text-ib-three">
            Ibnu's Blog - Copyright 2020
        </p>
    </footer>

    @livewireScripts
    @stack('bottom_js')

</body>
</html>