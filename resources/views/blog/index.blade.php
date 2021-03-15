@extends('layouts.frontend')

@section('title')
    Welcome to My Blog - {{ config('app.name') }}
@endsection

@section('meta_seo')
    <meta name="title" content="Welcome to My Blog - {{ config('app.name') }}">
    <meta name="description" content="{{ __('global.note_as_geeks') }}">
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Welcome to My Blog - {{ config('app.name') }}" />
    <meta property="og:description" content="{{ __('global.note_as_geeks') }}" />
    <meta property="og:image" content="{{ asset('favicon.ico') }}" />
    <meta name="twitter:site" content="@IbnuHMustofa" />
    <meta name="twitter:title" content="Welcome to My Blog - {{ config('app.name') }}" />
    <meta name="twitter:description" content="{{ __('global.note_as_geeks') }}" />
    <meta name="twitter:image" content="{{ asset('favicon.ico') }}" />
@endsection

@section('content')

    <section>
        <x-frontend-container>
            <div id="main_posts_wrapper" class="block xl:hidden">
                <a href="{{ route('blog.post.read', [ 'slug' => $main_posts[0]['slug'] ]) }}" class="block outline-none focus:outline-none">
                    <div class="w-full h-48 rounded-md rounded-bl-none rounded-br-none bg-cover bg-no-repeat" style="background-image: url('{{ $main_posts[0]['gbr_url'] }}')"></div>
                    <div class="w-full px-5 py-3 bg-ib-three rounded-md rounded-tl-none rounded-tr-none">
                        <h1 class="font-bold text-white">
                            {{ $main_posts[0]['judul'] }}
                        </h1>
                        <p class="text-xs text-gray-200">{{ strftime('%b %e, %Y', strtotime($main_posts[0]['created_at'])) }}</p>
                    </div>
                </a>
                <div class="mt-5 px-5">
                    @foreach ($main_posts as $idx => $main_post)
                        @if ($idx == 0) @php continue @endphp @endif
                        <a href="{{ route('blog.post.read', [ 'slug' => $main_post['slug'] ]) }}" class="block mb-5 hover:text-ib-three">
                            <h3 class="font-bold">
                                {{ $main_post['judul'] }}
                            </h3>
                            <span class="text-xs text-gray-500">
                                {{ strftime('%b %e, %Y', strtotime($main_post['created_at'])) }}
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="hidden xl:block">
                @isset($main_posts[0])
                    <a href="{{ route('blog.post.read', [ 'slug' => $main_posts[0]['slug'] ]) }}" class="block hover:outline-none text-ib-one hover:text-ib-three transition-all duration-500">
                        <div class="flex flex-col xl:flex-row justify-between">
                            <div class="xl:w-1/2 mr-4 xl:h-60 rounded-md bg-cover bg-no-repeat" style="background-image: url('{{ $main_posts[0]['gbr_url'] }}')"></div>
                            <div class="xl:w-1/2 ml-4">
                                <p class="text-xl font-bold">
                                    {{ $main_posts[0]['judul'] }}
                                </p>
                                <p class="text-xs text-gray-600 mt-1">{{ strftime('%b %e, %Y', strtotime($main_posts[0]['created_at'])) }}</p>
                                <p class="mt-3 text-gray-800">
                                    {{ Str::limit(strip_tags($main_posts[0]['isi']), 200, '...') }}
                                </p>
                            </div>
                        </div>
                    </a>
                @endisset

                <div class="mt-10 grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-0 lg:gap-4 xl:gap-8">
                    @isset($main_posts[1])
                        <x-blog-post-card slug="{{ $main_posts[1]['slug'] }}" image="{{ $main_posts[1]['gbr_url'] }}" title="{{ $main_posts[1]['judul'] }}" date="{{ $main_posts[1]['created_at'] }}" previewBody="{{ Str::limit(strip_tags($main_posts[1]['isi']), 100, '...') }}" />
                    @endisset

                    @isset($main_posts[2])
                            <x-blog-post-card slug="{{ $main_posts[2]['slug'] }}" image="{{ $main_posts[2]['gbr_url'] }}" title="{{ $main_posts[2]['judul'] }}" date="{{ $main_posts[2]['created_at'] }}" previewBody="{{ Str::limit(strip_tags($main_posts[2]['isi']), 100, '...') }}" />
                    @endisset

                    @isset($main_posts[3])
                        <x-blog-post-card slug="{{ $main_posts[3]['slug'] }}" image="{{ $main_posts[3]['gbr_url'] }}" title="{{ $main_posts[3]['judul'] }}" date="{{ $main_posts[3]['created_at'] }}" previewBody="{{ Str::limit(strip_tags($main_posts[3]['isi']), 100, '...') }}" />
                    @endisset
                </div>

            </div>
        </x-frontend-container>
    </section>

    <section class="bg-ib-four py-10 mt-8">
        <x-frontend-container>
            <h2 class="font-bold text-base xl:text-2xl text-ib-one mb-6">
                {{ __('global.top_post') }}
            </h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-0 lg:gap-4 xl:gap-8">
                @foreach ($top_posts as $top_post)
                    <x-blog-post-card slug="{{ $top_post->slug }}" image="{{ $top_post->gbr_url }}" title="{{ $top_post->judul }}" date="{{ $top_post->created_at }}" previewBody="{{ Str::limit(strip_tags($top_post->isi), 100, '...') }}" />
                @endforeach
            </div>
        </x-frontend-container>
    </section>

    <section class="mt-8 py-10">
        <x-frontend-container>
            <h2 class="font-bold text-base xl:text-2xl text-ib-one mb-6">
                {{ __('global.latest_post') }}
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