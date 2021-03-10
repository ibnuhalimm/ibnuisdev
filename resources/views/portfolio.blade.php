@extends('layouts.frontend')

@section('title')
    Portofolio
@endsection

@section('meta_seo')
    <meta name="title" content="{{ config('app.name') }}">
    <meta name="description" content="{{ ucfirst(__('global.portfolio')) }}. {{ __('section.portfolio.sub_title_one') }} {{ __('section.portfolio.sub_title_two') }}">
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ config('app.name') }}" />
    <meta property="og:description" content="{{ ucfirst(__('global.portfolio')) }}. {{ __('section.portfolio.sub_title_one') }} {{ __('section.portfolio.sub_title_two') }}" />
    <meta property="og:image" content="{{ asset('favicon.ico') }}" />
@endsection

@section('content')

    <section class="mb-8 py-10">
        <x-frontend-container>
            <h1 class="mb-3">
                <span class="font-bold text-4xl block mb-1">
                    {{ __('global.portfolio') }}
                </span>
                <span class="block mt-3">
                    {{ __('section.portfolio.sub_title_one') }}
                </span>
            </h1>
            <p class="-mt-2">
                {{ __('section.portfolio.sub_title_two') }}
            </p>
            <div id="ui-content"></div>
        </x-frontend-container>
    </section>

    {{-- <div class="w-full h-full fixed inset-0 bg-gray-900 bg-opacity-75 z-50"
        x-show.transition.opacity="is_modal_open === true" x-cloak>
        <div class="w-11/12 md:w-3/5 px-8 py-6 bg-ib-four mt-20 mx-auto"
            x-show.transition.5000ms="is_modal_open === true" x-cloak>
            <div class="mb-10 text-center">
                <h4 class="text-lg text-ib-one">
                    {{ __('global.project_detail') }}
                </h4>
            </div>
            <div class="xl:px-6">
                <div class="mb-6 text-ib-one text-sm flex flex-col xl:flex-row justify-between">
                    <div class="w-full xl:w-2/5 mb-6">
                        <img src="{{ __('http://ibnuisdev.test/storage/post/b235908decdce0235b3e61506851f03b.jpg') }}" alt="{{ __('Project Name') }}" class="w-full h-auto">
                    </div>
                    <div class="xl:w-3/5 xl:ml-8">
                        <h4 class="font-bold">
                            {{ __('global.name') }}
                        </h4>
                        <p class="mb-4">
                            {{ __('Project Name') }}
                        </p>
                        <h4 class="font-bold">
                            {{ __('global.description') }}
                        </h4>
                        <p class="mb-4">
                            {!! __('Description should here') !!}
                        </p>
                        <h4 class="font-bold">
                            {{ __('global.link_demo_url') }}
                        </h4>
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
                        {{ __('global.close') }}
                    </button>
                </div>
            </div>
        </div>
    </div> --}}

@endsection

@push('bottom_js')
    <script src="{{ URL::asset('js/pages/portfolio.js?_=' . rand()) }}"></script>
@endpush