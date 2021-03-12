@extends('layouts.frontend')

@section('title')
    {{ ucfirst(__('global.portfolio')) }} - {{ config('app.name') }}
@endsection

@section('meta_seo')
    <meta name="title" content="{{ config('app.name') }} - {{ ucfirst(__('global.portfolio')) }}">
    <meta name="description" content="{{ ucfirst(__('global.portfolio')) }}. {{ __('section.portfolio.sub_title_one') }} {{ __('section.portfolio.sub_title_two') }}">
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ config('app.name') }} - {{ ucfirst(__('global.portfolio')) }}" />
    <meta property="og:description" content="{{ ucfirst(__('global.portfolio')) }}. {{ __('section.portfolio.sub_title_one') }} {{ __('section.portfolio.sub_title_two') }}" />
    <meta property="og:image" content="{{ asset('favicon.ico') }}" />
    <meta name="twitter:site" content="@IbnuHMustofa" />
    <meta name="twitter:title" content="{{ config('app.name') }} - {{ ucfirst(__('global.portfolio')) }}" />
    <meta name="twitter:description" content="{{ ucfirst(__('global.portfolio')) }}. {{ __('section.portfolio.sub_title_one') }} {{ __('section.portfolio.sub_title_two') }}" />
    <meta name="twitter:image" content="{{ asset('favicon.ico') }}" />
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

@endsection

@push('bottom_js')
    <script src="{{ URL::asset('js/pages/portfolio.js?_=' . rand()) }}"></script>
@endpush