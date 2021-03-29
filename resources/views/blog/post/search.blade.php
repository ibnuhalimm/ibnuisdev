@extends('layouts.frontend')

@section('title')
    {{ __('global.search_result') }} "{{ $search_text }}"
@endsection

@section('meta_seo')
    <meta name="title" content="{{ __('global.search_result') }} {{ $search_text }}">
    <meta name="description" content="{{ __('global.search_result') }} {{ $search_text }} di {{ config('app.name') }} website.">
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ __('global.search_result') }} {{ $search_text }}" />
    <meta property="og:description" content="{{ __('global.search_result') }} {{ $search_text }} di {{ config('app.name') }} website." />
    <meta property="og:image" content="{{ asset('favicon.ico') }}" />
    <meta name="twitter:site" content="@IbnuHMustofa" />
    <meta name="twitter:title" content="{{ __('global.search_result') }} {{ $search_text }}" />
    <meta name="twitter:description" content="{{ __('global.search_result') }} {{ $search_text }} di {{ config('app.name') }} website." />
    <meta name="twitter:image" content="{{ asset('favicon.ico') }}" />
@endsection

@section('content')

    <section class="mb-8 py-10">
        <x-frontend-container>
            <h1 class=" font-bold text-base xl:text-2xl text-ib-one mb-6 truncate">
                {{ __('global.search_result') }} "{{ $search_text }}"
            </h1>

            @if ($posts->isEmpty())
                <h1>
                    {{ __('global.not_found_post') }}
                </h1>
            @else
                <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-0 lg:gap-4 xl:gap-8">
                    @foreach ($posts as $post)
                        <x-blog-post-card slug="{{ $post->slug }}" image="{{ $post->gbr_url }}" title="{{ $post->judul }}" date="{{ $post->created_at }}" previewBody="{!! $post->brief_text !!}" />
                    @endforeach
                </div>
            @endif
        </x-frontend-container>
    </section>

    <section class="mt-8 py-10 bg-ib-four">
        <x-frontend-container>
            <h2 class="font-bold text-base xl:text-2xl text-ib-one mb-6">
                {{ __('global.another_interested_post') }}
            </h2>

            <div id="latest-post-ui-content"></div>
        </x-frontend-container>
    </section>

@endsection


@push('bottom_js')
    <script>
        const blog_except_ids = [{{ implode(',', $except_ids) }}];
    </script>
    <script src="{{ URL::asset('js/pages/blog/latest-post.js?_=' . rand()) }}"></script>
@endpush