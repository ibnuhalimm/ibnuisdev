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

    <section class="text-base">
        <div class="mb-10 xl:w-2/3 xl:mx-auto xl:order-2">
            <x-post-read-container>
                <h1 class="text-2xl font-bold text-ib-one">{{ $post->judul }}</h1>

                <div class="mt-3 flex flex-row justify-between">
                    <span class="mt-2 text-gray-600 text-sm">
                        {{ strftime('%b %e, %Y', strtotime($post->created_at)) }}
                    </span>
                    <div class="flex flex-row items-center justify-end">
                        @foreach ($share_buttons as $share)
                            <a href="{{ $share->url . $post->post_url }}" target="_blank" class="w-10 h-10 xl:w-8 xl:h-8 text-center p-2 text-gray-600 hover:text-ib-three transition delay-100">
                                <i class="flaticon-{{ $share->ikon }} text-xs"></i>
                            </a>
                        @endforeach
                        <a href="javascript:;" id="__btnShareViaLink" data-url="{{ $post->post_url }}" class="w-10 h-10 xl:w-8 xl:h-8 text-center p-2 text-gray-600 hover:text-ib-three transition delay-100">
                            <i class="flaticon-link text-xs"></i>
                        </a>
                    </div>
                </div>
            </x-post-read-container>

            <div class="mt-6 mb-3 lg:w-3/4 mx-auto">
                <div class="w-full">
                    <img src="{{ $post->gbr_url }}" alt="{{ $post->judul }}" class="w-full h-auto">
                </div>
            </div>

            <x-post-read-container>
                <div class="article-content formatted text-ib-one">
                    {!! Str::of($post->isi)->replace('../../storage', url('/storage')) !!}
                </div>

                <div class="mt-6 py-2 flex flex-row items-center border border-solid border-r-0 border-b-0 border-l-0 border-ib-three">
                    <span class="mt-1 text-ib-two text-sm mr-2">Bagikan : </span>
                    @foreach ($share_buttons as $share)
                        <a href="{{ $share->url . $post->post_url }}" target="_blank" class="w-10 h-10 xl:w-8 xl:h-8 text-center p-2 text-gray-600 hover:text-ib-three transition delay-100">
                            <i class="flaticon-{{ $share->ikon }} text-xs"></i>
                        </a>
                    @endforeach
                    <a href="javascript:;" id="__btnShareViaLink" data-url="{{ $post->post_url }}" class="w-10 h-10 xl:w-8 xl:h-8 text-center p-2 text-gray-600 hover:text-ib-three transition delay-100">
                        <i class="flaticon-link text-xs"></i>
                    </a>
                </div>
            </x-post-read-container>
        </div>

        {{-- <x-frontend-container>
            <h4 class="text-base text-ib-one">Bagikan</h4>
            <ul class="mt-2">
                @foreach ($share_buttons as $share)
                    <li class="inline-flex xl:flex xl:mb-2 items-center mr-1">
                        <a href="{{ $share->url . $post->post_url }}" target="_blank" class="w-10 h-10 xl:w-8 xl:h-8 text-center rounded-full border xl:border-none border-solid border-ib-one hover:border-ib-three p-2 text-ib-one hover:text-ib-three transition delay-100">
                            <i class="flaticon-{{ $share->ikon }} text-xs"></i>
                        </a>
                    </li>
                @endforeach
                <li class="inline-flex xl:flex xl:mb-2 items-center mr-1">
                    <a href="javascript:;" id="__btnShareViaLink" data-url="{{ $post->post_url }}" class="w-10 h-10 xl:w-8 xl:h-8 text-center rounded-full border xl:border-none border-solid border-ib-one hover:border-ib-three p-2 text-ib-one hover:text-ib-three transition delay-100">
                        <i class="flaticon-link text-xs"></i>
                    </a>
                </li>
            </ul>
        </x-frontend-container> --}}
    </section>

    <section class="mt-8 bg-ib-four py-5">
        <x-frontend-container>
            <h2 class="font-bold text-base xl:text-xl text-ib-one mb-3">
                Postingan Terkait
            </h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-2">
                @foreach ($related_posts as $post)
                    <x-blog-post-card slug="{{ $post->slug }}" image="{{ $post->gbr_url }}" title="{{ $post->judul }}" date="{{ $post->created_at }}" />
                @endforeach
            </div>
        </x-frontend-container>
    </section>
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