@extends('layouts.frontend')

@section('title')
    Blog
@endsection

@section('meta_seo')
    <meta name="title" content="{{ config('app.name') }}">
    <meta name="description" content="I'm Fullstack Web Developer with robust problem-solving skills and proven experience in creating and designing high quality software.">
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ config('app.name') }}" />
    <meta property="og:description" content="I'm Fullstack Web Developer with robust problem-solving skills and proven experience in creating and designing high quality software." />
    <meta property="og:image" content="{{ asset('favicon.ico') }}" />
@endsection

@section('content')

    <section class="mb-8 py-10">
        <x-frontend-container>
            <div class="flex flex-col lg:flex-row lg:justify-between">
                <div class="flex flex-col items-center justify-center mb-10 lg:mt-4 xl:mt-0 lg:order-last">
                    <div class="w-36 h-36 lg:w-24 lg:h-24 xl:w-32 xl:h-32 rounded-full bg-gray-300 bg-no-repeat bg-center bg-cover" style="background-image: url('{{ asset('img/me.jpeg') }}')"></div>
                    <div class="mt-6 lg:mt-4 flex flex-row items-center justify-center">
                        <a href="#" target="_blank" title="Github" rel="noopener noreferrer" class="w-10 h-10 lg:w-8 lg:h-8 flex items-center justify-center bg-white mx-1 border border-solid border-ib-one hover:border-ib-three hover:text-ib-three rounded-full">
                            <svg class="w-6 lg:w-5 h-auto" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                                <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                            </svg>
                        </a>
                        <a href="#" target="_blank" title="Twitter" rel="noopener noreferrer" class="w-10 h-10 lg:w-8 lg:h-8 flex items-center justify-center bg-white mx-1 border border-solid border-ib-one hover:border-ib-three hover:text-ib-three rounded-full">
                            <svg class="w-5 lg:w-4 h-auto" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                            </svg>
                        </a>
                        <a href="#" target="_blank" title="Linkedin" rel="noopener noreferrer" class="w-10 h-10 lg:w-8 lg:h-8 flex items-center justify-center bg-white mx-1 border border-solid border-ib-one hover:border-ib-three hover:text-ib-three rounded-full">
                            <svg class="w-5 lg:w-4 h-auto" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                                <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="lg:w-3/5">
                    <div>
                        <h1>
                            <span class="font-bold text-4xl block mb-1 lg:mb-3">Hai, Aku Ibnu</span>
                            <span class="leading-6">
                                {{ __('Fullstack Web Developer dengan keterampilan pemecahan masalah yang kuat dan berpengalaman dalam membuat dan merancang perangkat lunak berkualitas tinggi.') }}
                            </span>
                        </h1>
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('portfolio') }}" class="py-2 px-6 bg-ib-three border border-solid border-ib-three text-ib-four shadow-lg outline-none focus:outline-none">
                            Lihat Portofolio
                        </a>
                    </div>
                </div>
            </div>
        </x-frontend-container>
    </section>

    <section class="mb-4 py-10 bg-ib-four">
        <x-frontend-container>
            <div class="flex flex-col lg:flex-row lg:justify-between">
                <div class="lg:w-1/3 lg:px-4 xl:px-10 flex flex-col items-center justify-start mb-10 lg:mb-0">
                    <svg class="w-20 lg:w-16 xl:w-24 h-auto text-ib-three" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                    </svg>
                    <h2 class="font-bold text-center text-ib-three mb-1 text-lg">
                        Web Development
                    </h2>
                    <p class="text-center">
                        Membangun blog, company profile website, toko online, point-of-sales, dll.
                    </p>
                </div>
                <div class="lg:w-1/3 lg:px-4 xl:px-10 flex flex-col items-center justify-start mb-10 lg:mb-0">
                    <svg class="w-20 lg:w-16 xl:w-24 h-auto text-ib-three" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    <h2 class="font-bold text-center text-ib-three mb-1 text-lg">
                        Bug dan Error Fix
                    </h2>
                    <p class="text-center">
                        Error atau bug yang membuat Anda tak nyaman, saya bisa mengatasinya.
                    </p>
                </div>
                <div class="lg:w-1/3 lg:px-4 xl:px-10 flex flex-col items-center justify-start">
                    <svg class="w-20 lg:w-16 xl:w-24 h-auto text-ib-three" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <h2 class="font-bold text-center text-ib-three mb-1 text-lg">
                        Linux Expert
                    </h2>
                    <p class="text-center">
                        Konfigurasi atau troubleshot linux server atau desktop, pengguna linux di keseharian.
                    </p>
                </div>
            </div>
        </x-frontend-container>
    </section>

    <section class="mb-8 py-10">
        <x-frontend-container>
            <h2 class="mb-6 text-center">
                <span class="font-bold text-2xl px-5 block mb-3">
                    Ingin membuat website atau konsultasi?
                </span>
                <span>
                    Mari kita diskusikan sekarang
                </span>
            </h2>
            <div class="flex row items-center justify-between lg:px-20 xl:px-0 xl:w-3/4 xl:mx-auto">
                <input type="email" name="email_cta" id="email_cta" class="w-full px-6 py-4 bg-white border border-solid border-ib-three shadow-lg outline-none focus:outline-none md:text-lg" placeholder="Email Anda">
                <button type="button" class="w-3/5 lg:w-1/2 ml-4 py-4 px-6 bg-ib-three border border-solid border-ib-three text-ib-four shadow-lg outline-none focus:outline-none md:text-lg">
                    Kirim Pesan
                </button>
            </div>
        </x-frontend-container>
    </section>

    <section class="mb-8 py-10">
        <x-frontend-container>
            <h2 class="mb-6">
                <span class="font-bold text-4xl block mb-1">
                    Blog
                </span>
                <span>Postingan terbaru saya</span>
            </h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-0 lg:gap-4 xl:gap-8">
                <x-blog-post-card slug="#" image="http://ibnuisdev.test/storage/post/b235908decdce0235b3e61506851f03b.jpg" title="Et iste sed eum deserunt dolore facere ut" date="2021-01-01 11:00:41" />
                <x-blog-post-card slug="#" image="http://ibnuisdev.test/storage/post/52d49f867823145b230db2fafd7b8018.jpg" title="Neque dolor velit hic occaecati sint sed vitae est accusantium numquam" date="2021-01-01 11:00:41" />
                <x-blog-post-card slug="#" image="http://ibnuisdev.test/storage/post/b235908decdce0235b3e61506851f03b.jpg" title="Et iste sed eum deserunt dolore facere ut" date="2021-01-01 11:00:41" />
                <x-blog-post-card slug="#" image="http://ibnuisdev.test/storage/post/52d49f867823145b230db2fafd7b8018.jpg" title="Neque dolor velit hic occaecati sint sed vitae est accusantium numquam" date="2021-01-01 11:00:41" />
            </div>
            <div class="mt-6 xl:mt-12 flex justify-center">
                <a href="{{ route('blog.index') }}" class="py-2 px-6 bg-ib-three border border-solid border-ib-three text-ib-four shadow-lg outline-none focus:outline-none">
                    Postingan lainnya
                </a>
            </div>
        </x-frontend-container>
    </section>

    <section class="mb-8 py-10 bg-ib-four">
        <x-frontend-container>
            <h2 class="mb-3">
                <span class="font-bold text-4xl block mb-1">
                    Portofolio
                </span>
                <span>Daftar project yang pernah saya kerjakan</span>
            </h2>
            <div class="mt-6 grid grid-cols-1 lg:grid-cols-2 gap-0 lg:gap-6">
                <div class="w-full h-56 xl:h-80 bg-no-repeat bg-center mb-6 lg:mb-0" style="background-image: url('http://ibnuisdev.test/storage/post/52d49f867823145b230db2fafd7b8018.jpg')">
                    <div class="w-full h-full left-0 top-0 bg-ib-one bg-opacity-90 flex items-center justify-center">
                        <div class="w-3/4 mx-auto text-center">
                            <h3 class="font-bold text-ib-four mb-3 text-lg">
                                Landing Page Event Konser
                            </h3>
                            <button class="px-5 py-2 border border-solid border-ib-four bg-transparent hover:bg-ib-four text-ib-four hover:text-ib-one outline-none focus:outline-none" @click="is_modal_open = true">
                                Lihat Project
                            </button>
                        </div>
                    </div>
                </div>
                <div class="w-full h-56 xl:h-80 bg-no-repeat bg-center mb-6 lg:mb-0" style="background-image: url('http://ibnuisdev.test/storage/post/pXHAaf0PBYhZAeD7FT5mMJVPwHrNiRx01VSfpUYP.png')">
                    <div class="w-full h-full left-0 top-0 bg-ib-one bg-opacity-90 flex items-center justify-center">
                        <div class="w-3/4 mx-auto text-center">
                            <h3 class="font-bold text-ib-four mb-3 text-lg">
                                Semarang Great Sale 2019 (Semargres)
                            </h3>
                            <button class="px-5 py-2 border border-solid border-ib-four bg-transparent hover:bg-ib-four text-ib-four hover:text-ib-one outline-none focus:outline-none" @click="is_modal_open = true">
                                Lihat Project
                            </button>
                        </div>
                    </div>
                </div>
                <div class="w-full h-56 xl:h-80 bg-no-repeat bg-center mb-6 lg:mb-0" style="background-image: url('http://ibnuisdev.test/storage/post/38c6b70ea80f5f78b53150e9c5146b61.jpg')">
                    <div class="w-full h-full left-0 top-0 bg-ib-one bg-opacity-90 flex items-center justify-center">
                        <div class="w-3/4 mx-auto text-center">
                            <h3 class="font-bold text-ib-four mb-3 text-lg">
                                PMWasap - Whatsapp Lead Form
                            </h3>
                            <button class="px-5 py-2 border border-solid border-ib-four bg-transparent hover:bg-ib-four text-ib-four hover:text-ib-one outline-none focus:outline-none" @click="is_modal_open = true">
                                Lihat Project
                            </button>
                        </div>
                    </div>
                </div>
                <div class="w-full h-56 xl:h-80 bg-no-repeat bg-center mb-6 lg:mb-0" style="background-image: url('http://ibnuisdev.test/storage/post/fcfcf2216b1972a5ea527efd42598b16.jpg')">
                    <div class="w-full h-full left-0 top-0 bg-ib-one bg-opacity-90 flex items-center justify-center">
                        <div class="w-3/4 mx-auto text-center">
                            <h3 class="font-bold text-ib-four mb-3 text-lg">
                                Point of Sale Application
                            </h3>
                            <button class="px-5 py-2 border border-solid border-ib-four bg-transparent hover:bg-ib-four text-ib-four hover:text-ib-one outline-none focus:outline-none" @click="is_modal_open = true">
                                Lihat Project
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 xl:mt-12 flex justify-center">
                <a href="{{ route('portfolio') }}" class="py-2 px-6 bg-ib-three border border-solid border-ib-three text-ib-four shadow-lg outline-none focus:outline-none">
                    Project lainnya
                </a>
            </div>
        </x-frontend-container>
    </section>


    <div class="w-full h-full fixed inset-0 bg-gray-900 bg-opacity-75 z-50"
        x-show.transition.opacity="is_modal_open === true" x-cloak>
        <div class="w-11/12 md:w-3/5 px-8 py-6 bg-ib-four mt-20 mx-auto"
            x-show.transition.5000ms="is_modal_open === true" x-cloak>
            <div class="mb-10 text-center">
                <h4 class="text-lg text-ib-one">Project Details</h4>
            </div>
            <div class="xl:px-6">
                <div class="mb-6 text-ib-one text-sm flex flex-col xl:flex-row justify-between">
                    <div class="w-full xl:w-2/5 mb-6">
                        <img src="{{ __('http://ibnuisdev.test/storage/post/b235908decdce0235b3e61506851f03b.jpg') }}" alt="{{ __('Project Name') }}" class="w-full h-auto">
                    </div>
                    <div class="xl:w-3/5 xl:ml-8">
                        <h4 class="font-bold">Name</h4>
                        <p class="mb-4">
                            {{ __('Project Name') }}
                        </p>
                        <h4 class="font-bold">Description</h4>
                        <p class="mb-4">
                            {!! __('Description should here') !!}
                        </p>
                        <h4 class="font-bold">Link / Demo URL</h4>
                        <p class="mb-4">
                            @if (empty($link))
                                -
                            @else
                                <a href="{{ $link }}" class="text-ib-three hover:underline" target="_blank" rel="noreferrer">
                                    {{ $link }}
                                </a>
                            @endif
                        </p>
                    </div>
                </div>
                <div class="text-center">
                    <button class="py-2 px-6 bg-ib-three text-ib-four shadow-lg outline-none focus:outline-none" @click="is_modal_open = false">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection