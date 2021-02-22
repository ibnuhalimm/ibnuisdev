@extends('blog.layout')

@section('title')
    Blog
@endsection

@section('meta_seo')
    <meta name="title" content="{{ config('app.name') }}">
    <meta name="description" content="Catatanku sebagai Pecinta Teknologi">
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ config('app.name') }}" />
    <meta property="og:description" content="Catatanku sebagai Pecinta Teknologi" />
    <meta property="og:image" content="{{ url('favicon.ico') }}" />
@endsection

@section('content')

    <div id="main_posts_wrapper" class="block xl:hidden">
        @foreach ($main_posts as $main_post)
            <a href="{{ route('blog.post.read', [ 'slug' => $main_post['slug'] ]) }}" class="block outline-none focus:outline-none">
                <div class="w-full h-48 rounded-md bg-cover bg-no-repeat" style="background-image: url('{{ $main_post['gbr_url'] }}')">
                    <div class="w-full h-full p-5 py-6 flex flex-col items-start justify-end bg-black bg-opacity-50 rounded-md">
                        <p class="font-bold text-white">
                            {{ $main_post['judul'] }}
                        </p>
                        <p class="text-xs text-gray-200">{{ strftime('%b, %e %Y', strtotime($main_post['created_at'])) }}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <div class="hidden xl:grid grid-cols-2 gap-6">

        @isset($main_posts[0])
            <a href="{{ route('blog.post.read', [ 'slug' => $main_posts[0]['slug'] ]) }}" class="block w-full h-64 rounded-md hover:shadow-xl bg-cover bg-no-repeat" style="background-image: url('{{ $main_posts[0]['gbr_url'] }}')">
                <div class="w-full h-full p-5 py-6 flex flex-col items-start justify-end bg-black bg-opacity-50 rounded-md">
                    <p class="font-bold text-white">
                        {{ $main_posts[0]['judul'] }}
                    </p>
                    <p class="text-xs text-gray-200">{{ strftime('%b, %e %Y', strtotime($main_posts[0]['created_at'])) }}</p>
                </div>
            </a>
        @endisset

        <div class="grid grid-rows-2 gap-0">

            @isset($main_posts[1])
                <a href="{{ route('blog.post.read', [ 'slug' => $main_posts[1]['slug'] ]) }}" class="block w-full h-24 rounded-md hover:shadow-xl bg-cover bg-no-repeat" style="background-image: url('{{ $main_posts[1]['gbr_url'] }}')">
                    <div class="w-full h-full p-5 py-6 flex flex-col items-start justify-end bg-black bg-opacity-50 rounded-md">
                        <p class="font-bold text-white">
                            {{ $main_posts[1]['judul'] }}
                        </p>
                        <p class="text-xs text-gray-200">{{ strftime('%b, %e %Y', strtotime($main_posts[1]['created_at'])) }}</p>
                    </div>
                </a>
            @endisset

            <div class="grid grid-cols-2 gap-8">
                @isset($main_posts[2])
                    <a href="{{ route('blog.post.read', [ 'slug' => $main_posts[2]['slug'] ]) }}" class="block w-full h-32 rounded-md hover:shadow-xl bg-cover bg-no-repeat" style="background-image: url('{{ $main_posts[2]['gbr_url'] }}')">
                        <div class="w-full h-full p-5 py-6 flex flex-col items-start justify-end bg-black bg-opacity-50 rounded-md">
                            <p class="font-bold text-white">
                                {{ $main_posts[2]['judul'] }}
                            </p>
                            <p class="text-xs text-gray-200">{{ strftime('%b, %e %Y', strtotime($main_posts[2]['created_at'])) }}</p>
                        </div>
                    </a>
                @endisset

                @isset($main_posts[3])
                    <a href="{{ route('blog.post.read', [ 'slug' => $main_posts[3]['slug'] ]) }}" class="block w-full h-32 rounded-md hover:shadow-xl bg-cover bg-no-repeat" style="background-image: url('{{ $main_posts[3]['gbr_url'] }}')">
                        <div class="w-full h-full p-5 py-6 flex flex-col items-start justify-end bg-black bg-opacity-50 rounded-md">
                            <p class="font-bold text-white">
                                {{ $main_posts[3]['judul'] }}
                            </p>
                            <p class="text-xs text-gray-200">{{ strftime('%b, %e %Y', strtotime($main_posts[3]['created_at'])) }}</p>
                        </div>
                    </a>
                @endisset
            </div>
        </div>
    </div>

    <h2 class="mt-8 font-bold text-base xl:text-xl text-ib-one mb-3">
        Top Post
    </h2>
    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
        @foreach ($top_posts as $top_post)
            <a href="{{ route('blog.post.read', [ 'slug' => $top_post->slug ]) }}" class="block w-full p-5 rounded-md outline-none hover:outline-none text-ib-one hover:text-ib-three">
                <div class="flex flex-row items-center justify-between">
                    <div class="w-2/5">
                        <div class="w-20 h-20 rounded-md bg-cover bg-no-repeat" style="background-image: url('{{ $top_post->gbr_url }}')"></div>
                    </div>
                    <div class="w-3/5 flex flex-col items-center justify-between">
                        <div class="-ml-3">
                            <h3 class="h-auto font-bold truncate-two-lines">
                                {{ $top_post->judul }}
                            </h3>
                            <p class="text-xs mt-3">{{ strftime('%b, %e %Y', strtotime($top_post->created_at)) }}</p>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <h2 class="mt-8 font-bold text-base xl:text-xl text-ib-one mb-3">
        Postingan Terbaru
    </h2>

    @livewire('blog.post.latest-post', ['except_ids' => $except_ids])

@endsection

@push('top_css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.min.css">
@endpush

@push('bottom_js')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.1.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#main_posts_wrapper').slick({
                dots: true,
                arrows: false,
                autoPlay: true,
                pauseOnHover: true
            })
        });
    </script>
@endpush