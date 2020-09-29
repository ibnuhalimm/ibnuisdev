<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        {{ config('app.name') }}
    </title>
    <meta name="title" content="{{ config('app.name') }}">
    <meta name="description" content="I'm Fullstack Web Developer with robust problem-solving skills and proven experience in creating and designing high quality software.">
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ config('app.name') }}" />
    <meta property="og:description" content="I'm Fullstack Web Developer with robust problem-solving skills and proven experience in creating and designing high quality software." />
    <meta property="og:image" content="{{ asset('favicon.ico') }}" />

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @livewireStyles

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js" defer></script>
</head>

<body class="bg-ib-one text-ib-four flex flex-col min-h-screen justify-between text-base"
    :class="{'overflow-hidden': opendropdown, 'overflow-y-auto': !opendropdown}"
    x-data="{ opendropdown: false }">
    <nav class="w-full fixed bg-ib-one z-30 top-0 left-0 right-0 py-3 xl:py-5 leading-9 xl:leading-7">
        <div class="w-11/12 sm:w-3/5 xl:w-3/4 mx-auto xl:flex xl:flex-row xl:items-center xl:justify-center">
            <div class="flex flex-row items-center justify-between xl:hidden">
                <a href="#" class="">
                    <span class="font-bold text-ib-three xl:mt-1 uppercase text-lg">IBNU'S</span>
                </a>
                <button class="p-1 outline-none hover:outline-none focus:outline-none xl:hidden"
                    @click="opendropdown = !opendropdown;">
                    <span :class="{'block': !opendropdown, 'hidden': opendropdown}">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="menu-alt3 w-6 h-6">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span>
                    <span :class="{'block': opendropdown, 'hidden': !opendropdown}">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </span>
                </button>
            </div>
            <div :class="{'block': opendropdown, 'hidden': !opendropdown}"
                class="w-full min-h-screen xl:min-h-0 sm:pb-10 xl:pb-0 z-40 xl:block">
                <div
                    class="w-full h-full sm:h-64 xl:h-auto sm:overflow-y-auto xl:overflow-hidden text-center mt-8 xl:mt-0">
                    <ul>
                        <li class="mb-3 xl:mb-0 xl:inline-block">
                            <a href="#home-section" class="menu-item block font-bold xl:font-normal xl:w-32 text-center hover:text-ib-three">
                                Home
                            </a>
                        </li>
                        <li class="mb-3 xl:mb-0 xl:inline-block">
                            <a href="#portfolio-section" class="menu-item block font-bold xl:font-normal xl:w-32 text-center hover:text-ib-three">
                                Portfolio
                            </a>
                        </li>
                        <li class="mb-3 xl:mb-0 hidden xl:inline-block">
                            <a href="{{ route('index') }}" class="block font-extrabold px-8 text-xl xl:w-32 text-center text-ib-three relative"
                                style="top: .125rem">IBNU'S</a>
                        </li>
                        <li class="mb-3 xl:mb-0 xl:inline-block">
                            <a href="#skills-section" class="menu-item block font-bold xl:font-normal xl:w-32 text-center hover:text-ib-three">
                                Skills
                            </a>
                        </li>
                        <li class="mb-3 xl:mb-0 xl:inline-block">
                            <a href="#" class="block font-bold xl:font-normal xl:w-32 text-center hover:text-ib-three">
                                Blog
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <main class="mb-auto pb-10">
        <div class="w-11/12 sm:w-3/5 xl:w-3/4 mx-auto">

            <section id="home-section" class="pt-48 mb-48 xl:w-3/5 xl:mx-auto">
                <div class="text-center">
                    <h2 class="text-2xl xl:text-3xl font-bold">
                        Hi, my name is Ibnu
                    </h2>
                    <p class="mt-2 leading-6 xl:text-lg">
                        {{ $top->description ?? '' }}
                    </p>
                </div>
                <div class="flex justify-center my-6">
                    <svg class="h-10 w-auto animate-bounce" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 17l-4 4m0 0l-4-4m4 4V3" />
                    </svg>
                </div>
                <div class="flex justify-center">
                    <a href="#portfolio-section" class="py-2 px-6 bg-ib-three text-ib-two shadow-md outline-none focus:outline-none">
                        Explore My Works
                    </a>
                </div>
            </section>

            <section id="portfolio-section" class="pt-24 mb-32 xl:w-3/4 xl:mx-auto">
                <div class="text-center mb-5">
                    <h2 class="text-2xl xl:text-3xl font-bold">
                        Portfolio
                    </h2>
                    <h3 class="xl:text-lg">
                        {{ $portfolio->description ?? '' }}
                    </h3>
                </div>
                @livewire('front-end.project', [ 'page' => 1, 'perPage' => 8 ])
            </section>

            <section id="skills-section" class="pt-24 mb-32 xl:w-3/4 xl:mx-auto">
                <div class="text-center mb-5">
                    <h2 class="text-2xl xl:text-3xl font-bold">
                        Skills
                    </h2>
                    <h3 class="text-lg">
                        {{ $skills->description ?? '' }}
                    </h3>
                </div>
                <div class="grid grid-cols-2 xl:grid-cols-4 gap-0">
                    @foreach ($skill_list as $skill)
                        <div class="w-full h-16 xl:h-12 bg-ib-two text-ib-four flex items-center justify-center">
                            {{ $skill->name }}
                        </div>
                    @endforeach
                </div>
                <div class="flex justify-center mt-6">
                    <a href="#contact-section" class="btn-next-section py-2 px-6 bg-ib-three text-ib-two shadow-md outline-none focus:outline-none">
                        Hire Me
                    </a>
                </div>
            </section>

            <section id="contact-section" class="pt-24 mb-32 xl:w-3/5 xl:mx-auto">
                <div class="text-center mb-5">
                    <h2 class="text-2xl xl:text-3xl font-bold">
                        Contact
                    </h2>
                    <h3 class="text-lg">
                        {{ $contact->description ?? '' }}
                    </h3>
                </div>
                <div>
                    <div class="mb-5">
                        <label for="__nameContact">
                            Name
                        </label>
                        <input type="text" name="name" id="__nameContact"
                            class="w-full mt-1 py-2 px-3 bg-ib-two outline-none focus:outline-none" autocomplete="off">
                    </div>
                    <div class="mb-5">
                        <label for="__emailContact">
                            Email Address
                        </label>
                        <input type="email" name="email" id="__emailContact"
                            class="w-full mt-1 py-2 px-3 bg-ib-two outline-none focus:outline-none" autocomplete="off">
                    </div>
                    <div class="mb-5">
                        <label for="__messageContact">
                            Message
                        </label>
                        <textarea name="message" id="__messageContact"
                            class="w-full mt-1 py-2 px-3 bg-ib-two outline-none focus:outline-none resize-none"
                            rows="6" autocomplete="off"></textarea>
                    </div>
                    <div class="flex justify-center">
                        <button class="py-2 px-6 bg-ib-three text-ib-two shadow-md outline-none focus:outline-none">
                            Send Message
                        </button>
                    </div>
                </div>
            </section>

        </div>
    </main>
    <footer class="w-full text-center py-4 bg-ib-one text-ib-four text-xs">
        Copyright 2020 @if (date('Y') != 2020) {{ ' - ' . date('Y') }} @endif  | All Right Reserved
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script>
        $('.menu-item, .btn-next-section').click(function(e) {
            if (this.hash !== '') {
                e.preventDefault();

                let hash = this.hash;

                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 0, function() {
                    window.location.hash = hash;
                });
            }
        });
    </script>
    @livewireScripts

</body>

</html>