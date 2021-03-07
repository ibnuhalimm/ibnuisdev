@extends('layouts.frontend')

@section('title')
    Resume
@endsection

@section('meta_seo')
    <meta name="title" content="{{ config('app.name') }}">
    <meta name="description" content="{{ __('section.resume.sub_title_one') }} {{ __('section.resume.sub_title_two') }}">
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ config('app.name') }}" />
    <meta property="og:description" content="{{ __('section.resume.sub_title_one') }} {{ __('section.resume.sub_title_two') }}" />
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
                    {{ __('section.resume.sub_title_one') }}
                </span>
            </h1>
            <p class="-mt-2">
                {{ __('section.resume.sub_title_two') }}
            </p>
            <div class="mt-14">
                <h2 class="font-bold text-xl mb-2">
                    {{ __('section.resume.technology') }}
                </h2>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                    <div>
                        <h3 class="font-bold mb-1">
                            {{ __('section.resume.day_to_day') }}
                        </h3>
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
                        <h3 class="font-bold mb-1">
                            {{ __('section.resume.experience_with') }}
                        </h3>
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
                    {{ __('section.resume.career_history') }}
                </span>
                <span>
                    @php
                        $start_work = date_create('2015-11-01');
                        $last_month = date_create('now');
                        $longtime_work = date_diff($start_work, $last_month)
                    @endphp
                    {{ __('section.resume.career_sub_title', [ 'year' => $longtime_work->format('%y') ]) }}
                </span>
            </h2>
            <div class="mt-6">
                <div class="timeline">
                    <div class="timeline--container left">
                        <div class="timeline--content">
                            <h2 class="font-bold">{{ __('month.apr') }} 2020 - {{ __('global.present') }}</h2>
                            <p>Web Developer<br>Self-employee (Freelancer)</p>
                        </div>
                    </div>
                    <div class="timeline--container right">
                        <div class="timeline--content">
                            <h2 class="font-bold">{{ __('month.nov') }} 2018 - {{ __('month.apr') }} 2020</h2>
                            <p>Web Developer<br>PT Media Sarana Data (Gmedia)</p>
                        </div>
                    </div>
                    <div class="timeline--container left">
                        <div class="timeline--content">
                            <h2 class="font-bold">{{ __('month.may') }} 2016 - {{ __('month.nov') }} 2018</h2>
                            <p>IT Helpdesk<br>PT Media Sarana Data (Gmedia)</p>
                        </div>
                    </div>
                    <div class="timeline--container right">
                        <div class="timeline--content">
                            <h2 class="font-bold">{{ __('month.oct') }} 2015 - {{ __('month.mar') }} 2016</h2>
                            <p>{{ __('global.lab_technician') }}<br>SMK N 1 Rembang</p>
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
                    {{ __('section.resume.education_history') }}
                </span>
                <span>
                    {{ __('section.resume.education_sub_title') }}
                </span>
            </h2>
            <div class="mt-6">
                <div class="timeline-gray">
                    <div class="timeline-gray--container left">
                        <div class="timeline-gray--content">
                            <h2 class="font-bold">2018 - {{ __('global.present') }}</h2>
                            <p>{{ __('global.computer_science_degree') }}<br>Universitas Stikubank Semarang</p>
                        </div>
                    </div>
                    <div class="timeline-gray--container right">
                        <div class="timeline-gray--content">
                            <h2 class="font-bold">2012 - 2015</h2>
                            <p>{{ __('global.network_engineer') }}<br>SMK N 1 Rembang</p>
                        </div>
                    </div>
                </div>
            </div>
        </x-frontend-container>
    </section>

@endsection