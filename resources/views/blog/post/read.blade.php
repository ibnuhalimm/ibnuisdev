@extends('blog.layout')

@section('title')
    {{ $post->judul }}
@endsection

@section('meta_seo')
    <meta name="title" content="{{ $post->judul }}">
    <meta name="description" content="{{ Str::limit(strip_tags($post->isi), 200, '') }}">
    <meta property="og:url" content="{{ $post->post_url }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $post->judul }}" />
    <meta property="og:description" content="{{ Str::limit(strip_tags($post->isi), 200, '') }}" />
    <meta property="og:image" content="{{ $post->gbr_url }}" />
@endsection

@section('content')

<div class="flex flex-col xl:flex-row">
    <div class="mb-10 xl:w-2/3 xl:mx-auto xl:order-2">
        <h1 class="text-2xl font-bold text-ib-one">{{ $post->judul }}</h1>
        <p class="mt-1 text-gray-800 text-xs">
            {{ strftime('%b %e, %Y', strtotime($post->created_at)) }}
        </p>
        <div class="w-full my-3">
            <img src="{{ $post->gbr_url }}" alt="{{ $post->judul }}" class="w-full h-auto">
        </div>
        <div class="article-content formatted text-ib-one">
            {!! Str::of($post->isi)->replace('../../storage', url('/storage')) !!}
        </div>
    </div>

    <div class="mb-6 xl:mb-0 xl:mt-0 xl:order-1 xl:fixed">
        <h4 class="text-base text-ib-one">Bagikan</h4>
        <ul class="mt-2">
            @foreach ($share_buttons as $share)
                <li class="inline-flex xl:flex xl:mb-2 items-center mr-1">
                    <a href="{{ $share->url . $post->post_url }}" target="_blank" class="w-10 h-10 xl:w-8 xl:h-8 text-center rounded-full border border-solid border-ib-one hover:border-ib-three p-2 text-ib-one hover:text-ib-three transition delay-100">
                        <i class="flaticon-{{ $share->ikon }} text-xs"></i>
                    </a>
                </li>
            @endforeach
            <li class="inline-flex xl:flex xl:mb-2 items-center mr-1">
                <a href="javascript:;" id="__btnShareViaLink" data-url="{{ $post->post_url }}" class="w-10 h-10 xl:w-8 xl:h-8 text-center rounded-full border border-solid border-ib-one hover:border-ib-three p-2 text-ib-one hover:text-ib-three transition delay-100">
                    <i class="flaticon-link text-xs"></i>
                </a>
            </li>
        </ul>
    </div>
</div>


<h2 class="mt-8 font-bold text-base xl:text-xl text-ib-one mb-3">
    Postingan Terkait
</h2>
<div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-2">
    @foreach ($related_posts as $post)
        <x-blog-post-card slug="{{ $post->slug }}" image="{{ $post->gbr_url }}" title="{{ $post->judul }}" date="{{ $post->created_at }}" />
    @endforeach
</div>
@endsection

@push('top_css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
    <style>
        .jq-toast-single {
            margin-top: 5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            font-size: .8rem;
        }
        .jq-toast-single + .jq-toast-single {
            margin-top: 10px;
        }
        .jq-toast-loader.jq-toast-loaded {
            display: none !important;
        }
    </style>
@endpush

@push('bottom_css')
    <link rel="stylesheet" href="{{ URL::asset('css/ckeditor-content.css?_=' . rand()) }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.21.0/themes/prism.min.css">
@endpush

@push('bottom_js')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.1.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-toast-plugin@1.3.2/dist/jquery.toast.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.21.0/components/prism-core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.21.0/plugins/autoloader/prism-autoloader.min.js"></script>
    <script>
        $('#__btnShareViaLink').click(function() {
            let data_url = $(this).attr('data-url');

            const el = document.createElement('textarea');
            el.value = data_url;
            el.setAttribute('readonly', '');
            el.style.position = 'absolute';
            el.style.left = '-9999px';
            document.body.appendChild(el);
            el.select();
            document.execCommand('copy');
            document.body.removeChild(el);

            $.toast({
                text : 'Link tersalin! Anda dapat membagikannya sekarang, :)',
                showHideTransition : 'slide',
                bgColor : '#80ded9',
                textColor : '#333',
                allowToastClose : false,
                hideAfter : 4000,
                stack : 5,
                textAlign : 'center',
                position : 'top-center'
            });
        });
    </script>
@endpush