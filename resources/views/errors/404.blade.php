@extends('layouts.frontend')

@section('title')
    {{ __('section.not_found.title') }}
@endsection

@section('meta_seo')
    <meta name="title" content="{{ config('app.name') }}">
    <meta name="description" content="{{ __('section.not_found.title'). __('section.not_found.sub_title') }}">
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ config('app.name') }}" />
    <meta property="og:description" content="{{ __('section.not_found.title'). __('section.not_found.sub_title') }}" />
    <meta property="og:image" content="{{ asset('favicon.ico') }}" />
    <meta name="twitter:site" content="@IbnuHMustofa" />
    <meta name="twitter:title" content="{{ config('app.name') }}" />
    <meta name="twitter:description" content="{{ __('section.not_found.title'). __('section.not_found.sub_title') }}" />
    <meta name="twitter:image" content="{{ asset('favicon.ico') }}" />
@endsection


@section('content')
    <section class="mt-24 xl:mt-10 mb-32">
        <x-frontend-container>
            <div class="flex flex-col items-center justify-center">
                <div class="w-full sm:w-4/5 md:w-3/4 lg:w-1/2 mx-auto text-center">
                    <h1 class="text-2xl xl:text-4xl font-bold leading-relaxed">
                        {{ __('section.not_found.sub_title') }}
                    </h1>
                </div>
                <div class="mt-6">
                    <form action="{{ route('blog.post.search') }}" method="get" class="flex flex-row items-center justify-center py-1 px-3 border border-solid border-gray-200 rounded-md xl:bg-gray-100">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="search w-5 h-auto text-ib-one"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                        <input type="search" name="q" class="w-full px-6 py-3 outline-none hover:outline-none bg-transparent text-ib-one placeholder-gray-400" placeholder="{{ __('nav.search') . ' blog' }}">
                    </form>
                </div>
                <div class="mt-6">
                    <a href="{{ route('index') }}" class="py-2 text-ib-three font-semibold hover:underline inline-flex items-center">
                        {{ __('section.not_found.back_to_home') }}
                        <svg class="ml-2 w-4 h-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
        </x-frontend-container>
    </section>
@endsection
