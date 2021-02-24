@extends('blog.layout')

@section('meta_seo')
    <meta name="title" content="Hasil Pencarian {{ $search_text }}">
    <meta name="description" content="Hasil Pencarian {{ $search_text }}">
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Hasil Pencarian {{ $search_text }}" />
    <meta property="og:description" content="Hasil Pencarian {{ $search_text }}" />
    <meta property="og:image" content="{{ url('favicon.ico') }}" />
@endsection

@section('title')
    Hasil Pencarian "{{ $search_text }}"
@endsection

@section('content')

    <section>
        <x-frontend-container>
            <h1 class=" font-bold text-base xl:text-xl text-ib-one mb-3 truncate">
                Hasil Pencarian "{{ $search_text }}"
            </h1>

            @if ($posts->isEmpty())
                <h1>Maaf, kami tidak menemukan artikel yang Anda maksudkan.</h1>
            @else
                <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-2">
                    @foreach ($posts as $post)
                        <x-blog-post-card slug="{{ $post->slug }}" image="{{ $post->gbr_url }}" title="{{ $post->judul }}" date="{{ $post->created_at }}" />
                    @endforeach
                </div>
            @endif
        </x-frontend-container>
    </section>


    <section class="mt-8 bg-ib-four py-5">
        <x-frontend-container>
            <h2 class="font-bold text-base xl:text-xl text-ib-one mb-3">
                Artikel Menarik Lainnya...
            </h2>

            @livewire('blog.post.latest-post', ['except_ids' => $except_ids])
        </x-frontend-container>
    </section>

@endsection

@push('top_css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
@endpush

@push('bottom_js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#main_posts_wrapper').slick({
                dots: true,
                autoPlay: true,
                pauseOnHover: true
            })
        });
    </script>
@endpush