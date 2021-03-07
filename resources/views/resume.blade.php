@extends('layouts.frontend')

@section('title')
    Resume
@endsection

@section('meta_seo')
    <meta name="title" content="{{ config('app.name') }}">
    <meta name="description" content="Saya berasal dari Rembang, Jawa Tengah, Indonesia. Selalu tertarik dengan hal-hal baru di dunia sains dan IT.">
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ config('app.name') }}" />
    <meta property="og:description" content="Saya berasal dari Rembang, Jawa Tengah, Indonesia. Selalu tertarik dengan hal-hal baru di dunia sains dan IT." />
    <meta property="og:image" content="{{ asset('favicon.ico') }}" />
@endsection

@section('content')

    <section class="mb-8 py-10">
        <x-frontend-container>
            <h1 class="mb-3">
                <span class="font-bold text-4xl block mb-1">
                    Resume
                </span>
                <span class="block mt-3">
                    Saya berasal dari Rembang, Jawa Tengah, Indonesia.
                </span>
            </h1>
            <p class="-mt-2">
                Selalu tertarik dengan hal-hal baru di dunia sains dan teknologi.
            </p>
            <div class="mt-14">
                <h2 class="font-bold text-xl mb-2">Teknologi</h2>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                    <div>
                        <h3 class="font-bold mb-1">Keseharian</h3>
                        <p>
                            <ul class="list-none">
                                <li class="flex items-center mb-1">
                                    <span class="mr-2">
                                        <svg class="w-6 h-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </span>
                                    HTML, CSS, Javascript
                                </li>
                                <li class="flex items-center mb-1">
                                    <span class="mr-2">
                                        <svg class="w-6 h-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </span>
                                    PHP (Laravel framework)
                                </li>
                                <li class="flex items-center mb-1">
                                    <span class="mr-2">
                                        <svg class="w-6 h-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </span>
                                    Git version control
                                </li>
                                <li class="flex items-center mb-1">
                                    <span class="mr-2">
                                        <svg class="w-6 h-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </span>
                                    Linux environment
                                </li>
                                <li class="flex items-center mb-1">
                                    <span class="mr-2">
                                        <svg class="w-6 h-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </span>
                                    MySQL / MariaDB
                                </li>
                                <li class="flex items-center mb-1">
                                    <span class="mr-2">
                                        <svg class="w-6 h-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </span>
                                    ReactJs
                                </li>
                            </ul>
                        </p>
                    </div>
                    <div>
                        <h3 class="font-bold mb-1">Pengalaman menggunakan</h3>
                        <p>
                            <ul class="list-none">
                                <li class="flex items-center mb-1">
                                    <span class="mr-2">
                                        <svg class="w-6 h-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </span>
                                    Codeigniter Framework
                                </li>
                                <li class="flex items-center mb-1">
                                    <span class="mr-2">
                                        <svg class="w-6 h-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </span>
                                    SCSS / SaSS
                                </li>
                                <li class="flex items-center mb-1">
                                    <span class="mr-2">
                                        <svg class="w-6 h-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </span>
                                    React Native
                                </li>
                                <li class="flex items-center mb-1">
                                    <span class="mr-2">
                                        <svg class="w-6 h-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </span>
                                    Oracle Database
                                </li>
                            </ul>
                        </p>
                    </div>
                </div>
            </div>
        </x-frontend-container>
    </section>

    <section class="mb-8 py-10 bg-ib-four">
        <x-frontend-container>
            <h2 class="mb-3 text-center">
                <span class="font-bold text-4xl block">
                    Riwayat Karir
                </span>
                <span>
                    @php
                        $start_work = date_create('2015-11-01');
                        $last_month = date_create('now');
                        $longtime_work = date_diff($start_work, $last_month)
                    @endphp
                    Pengalaman kerja lebih dari {{ $longtime_work->format('%y') }} tahun.
                </span>
            </h2>
            <div class="mt-6">
                <div class="timeline">
                    <div class="timeline--container left">
                        <div class="timeline--content">
                            <h2 class="font-bold">April 2020 - Saat ini</h2>
                            <p>Web Developer<br>Self-employee (Freelancer)</p>
                        </div>
                    </div>
                    <div class="timeline--container right">
                        <div class="timeline--content">
                            <h2 class="font-bold">Nov 2018 - April 2020</h2>
                            <p>Web Developer<br>PT Media Sarana Data (Gmedia)</p>
                        </div>
                    </div>
                    <div class="timeline--container left">
                        <div class="timeline--content">
                            <h2 class="font-bold">May 2016 - Nov 2018</h2>
                            <p>IT Helpdesk<br>PT Media Sarana Data (Gmedia)</p>
                        </div>
                    </div>
                    <div class="timeline--container right">
                        <div class="timeline--content">
                            <h2 class="font-bold">Okt 2015 - Apr 2016</h2>
                            <p>Teknisi Lab Komputer Jaringan<br>SMK N 1 Rembang</p>
                        </div>
                    </div>
                </div>
            </div>
        </x-frontend-container>
    </section>

    <section class="py-10">
        <x-frontend-container>
            <h2 class="mb-3 text-center">
                <span class="font-bold text-4xl block">
                    Riwayat Pendidikan
                </span>
                <span>
                    @php
                        $start_work = date_create('2015-11-01');
                        $last_month = date_create('now');
                        $longtime_work = date_diff($start_work, $last_month)
                    @endphp
                    Riwayat pendidikan formal.
                </span>
            </h2>
            <div class="mt-6">
                <div class="timeline-gray">
                    <div class="timeline-gray--container left">
                        <div class="timeline-gray--content">
                            <h2 class="font-bold">2018 - Saat ini</h2>
                            <p>S1 - Teknik Informatika<br>Universitas Stikubank Semarang</p>
                        </div>
                    </div>
                    <div class="timeline-gray--container right">
                        <div class="timeline-gray--content">
                            <h2 class="font-bold">2012 - 2015</h2>
                            <p>Teknik Komputer dan Jaringan<br>SMK N 1 Rembang</p>
                        </div>
                    </div>
                </div>
            </div>
        </x-frontend-container>
    </section>

@endsection