@extends('layouts.frontend')

@section('title')
    Blog
@endsection

@section('meta_seo')
    <meta name="title" content="{{ config('app.name') }} - {{ __('Blog') }}">
    <meta name="description" content="{{ __('global.note_as_geeks') }}">
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ config('app.name') }} - {{ __('Blog') }}" />
    <meta property="og:description" content="{{ __('global.note_as_geeks') }}" />
    <meta property="og:image" content="{{ asset('favicon.ico') }}" />
    <meta name="twitter:site" content="@IbnuHMustofa" />
    <meta name="twitter:title" content="{{ config('app.name') }} - {{ __('Blog') }}" />
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

            <div class="hidden xl:grid grid-cols-2 gap-4">
                @isset($main_posts[0])
                    <a href="{{ route('blog.post.read', [ 'slug' => $main_posts[0]['slug'] ]) }}" class="block w-full h-64 rounded-md hover:shadow-xl bg-cover bg-no-repeat" style="background-image: url('{{ $main_posts[0]['gbr_url'] }}')">
                        <div class="w-full h-full p-5 py-6 flex flex-col items-start justify-end bg-ib-one bg-opacity-70 rounded-md">
                            <p class="font-bold text-white">
                                {{ $main_posts[0]['judul'] }}
                            </p>
                            <p class="text-xs text-gray-200">{{ strftime('%b %e, %Y', strtotime($main_posts[0]['created_at'])) }}</p>
                        </div>
                    </a>
                @endisset

                <div class="grid grid-rows-2 gap-0">

                    @isset($main_posts[1])
                        <a href="{{ route('blog.post.read', [ 'slug' => $main_posts[1]['slug'] ]) }}" class="block w-full h-28 rounded-md hover:shadow-xl bg-cover bg-no-repeat" style="background-image: url('{{ $main_posts[1]['gbr_url'] }}')">
                            <div class="w-full h-full p-5 py-6 flex flex-col items-start justify-end bg-ib-one bg-opacity-70 rounded-md">
                                <p class="font-bold text-white">
                                    {{ $main_posts[1]['judul'] }}
                                </p>
                                <p class="text-xs text-gray-200">{{ strftime('%b %e, %Y', strtotime($main_posts[1]['created_at'])) }}</p>
                            </div>
                        </a>
                    @endisset

                    <div class="grid grid-cols-2 gap-4">
                        @isset($main_posts[2])
                            <a href="{{ route('blog.post.read', [ 'slug' => $main_posts[2]['slug'] ]) }}" class="block w-full h-32 rounded-md hover:shadow-xl bg-cover bg-no-repeat" style="background-image: url('{{ $main_posts[2]['gbr_url'] }}')">
                                <div class="w-full h-full p-5 py-6 flex flex-col items-start justify-end bg-ib-one bg-opacity-70 rounded-md">
                                    <p class="font-bold text-white">
                                        {{ $main_posts[2]['judul'] }}
                                    </p>
                                    <p class="text-xs text-gray-200">{{ strftime('%b %e, %Y', strtotime($main_posts[2]['created_at'])) }}</p>
                                </div>
                            </a>
                        @endisset

                        @isset($main_posts[3])
                            <a href="{{ route('blog.post.read', [ 'slug' => $main_posts[3]['slug'] ]) }}" class="block w-full h-32 rounded-md hover:shadow-xl bg-cover bg-no-repeat" style="background-image: url('{{ $main_posts[3]['gbr_url'] }}')">
                                <div class="w-full h-full p-5 py-6 flex flex-col items-start justify-end bg-ib-one bg-opacity-70 rounded-md">
                                    <p class="font-bold text-white">
                                        {{ $main_posts[3]['judul'] }}
                                    </p>
                                    <p class="text-xs text-gray-200">{{ strftime('%b %e, %Y', strtotime($main_posts[3]['created_at'])) }}</p>
                                </div>
                            </a>
                        @endisset
                    </div>
                </div>
            </div>
        </x-frontend-container>
    </section>

    <section class="bg-ib-four py-10 mt-8">
        <x-frontend-container>
            <h2 class="font-bold text-base xl:text-2xl text-ib-one mb-6">
                {{ __('global.top_post') }}
            </h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-0 lg:gap-4 xl:gap-8">
                @foreach ($top_posts as $top_post)
                    <x-blog-post-card slug="{{ $top_post->slug }}" image="{{ $top_post->gbr_url }}" title="{{ $top_post->judul }}" date="{{ $top_post->created_at }}" />
                @endforeach
            </div>
        </x-frontend-container>
    </section>

    <section class="mt-8 py-10">
        <x-frontend-container>
            <h2 class="font-bold text-base xl:text-2xl text-ib-one mb-6">
                {{ __('global.latest_post') }}
            </h2>

            @livewire('blog.post.latest-post', ['except_ids' => $except_ids])
        </x-frontend-container>
    </section>

@endsection