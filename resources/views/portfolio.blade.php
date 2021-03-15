@extends('layouts.frontend')

@section('title')
    {{ __('section.portfolio.page_title') }} {{ config('app.name') }}
@endsection

@section('meta_seo')
    <meta name="title" content="{{ __('section.portfolio.page_title') }} {{ config('app.name') }}">
    <meta name="description" content="{{ ucfirst(__('global.portfolio')) }}. {{ __('section.portfolio.sub_title_one') }} {{ __('section.portfolio.sub_title_two') }}">
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ __('section.portfolio.page_title') }} {{ config('app.name') }}" />
    <meta property="og:description" content="{{ ucfirst(__('global.portfolio')) }}. {{ __('section.portfolio.sub_title_one') }} {{ __('section.portfolio.sub_title_two') }}" />
    <meta property="og:image" content="{{ asset('favicon.ico') }}" />
    <meta name="twitter:site" content="@IbnuHMustofa" />
    <meta name="twitter:title" content="{{ __('section.portfolio.page_title') }} {{ config('app.name') }}" />
    <meta name="twitter:description" content="{{ ucfirst(__('global.portfolio')) }}. {{ __('section.portfolio.sub_title_one') }} {{ __('section.portfolio.sub_title_two') }}" />
    <meta name="twitter:image" content="{{ asset('favicon.ico') }}" />
@endsection

@section('content')

    <section class="mb-8 py-10">
        <x-frontend-container>
            <x-section-title>
                <h1>
                    <span class="font-bold text-4xl block mb-1">
                        {{ __('global.portfolio') }}
                    </span>
                    <span class="block mt-3">
                        {{ __('section.portfolio.sub_title_one') }}
                    </span>
                </h1>
            </x-section-title>
            <div id="ui-content"></div>
        </x-frontend-container>
    </section>

@endsection

@push('bottom_js')
    <script src="{{ URL::asset('js/pages/portfolio.js?_=' . rand()) }}"></script>
@endpush