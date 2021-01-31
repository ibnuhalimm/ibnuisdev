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

    <h2 class=" font-bold text-base xl:text-xl text-gray-800 mb-3 truncate">
        Hasil Pencarian "{{ $search_text }}"
    </h2>
    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
        @foreach ($posts as $post)
            <a href="{{ route('blog.post.read', [ 'slug' => $post->slug ]) }}" class="block w-full p-5 bg-white rounded-md outline-none hover:outline-none hover:text-ib-three">
                <div class="flex flex-row items-center justify-between">
                    <div class="w-2/5">
                        <div class="w-20 h-20 rounded-md bg-cover bg-no-repeat" style="background-image: url('{{ $post->gbr_url }}')"></div>
                    </div>
                    <div class="w-3/5 flex flex-col items-center justify-between">
                        <div class="-ml-3">
                            <h3 class="h-auto font-bold truncate-two-lines">
                                {{ $post->judul }}
                            </h3>
                            <p class="text-xs mt-3">{{ strftime('%e %B %Y', strtotime($post->created_at)) }}</p>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <h2 class="mt-8 font-bold text-base xl:text-xl text-gray-800 mb-3">
        Artikel Menarik Lainnya...
    </h2>

    @livewire('blog.post.latest-post', ['except_ids' => $except_ids])

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