@extends('layouts.frontend')

@section('title')
    {{ $post->judul }}
@endsection

@section('meta_seo')
    <meta name="title" content="{{ $post->judul }} - {{ config('app.name') }}">
    <meta name="description" content="{{ Str::limit(strip_tags($post->isi), 200, '') }}">
    <meta property="og:url" content="{{ $post->post_url }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $post->judul }} - {{ config('app.name') }}" />
    <meta property="og:description" content="{{ Str::limit(strip_tags($post->isi), 200, '') }}" />
    <meta property="og:image" content="{{ $post->gbr_url }}" />
    <meta name="twitter:site" content="@IbnuHMustofa" />
    <meta name="twitter:title" content="{{ $post->judul }} - {{ config('app.name') }}" />
    <meta name="twitter:description" content="{{ Str::limit(strip_tags($post->isi), 200, '') }}" />
    <meta name="twitter:image" content="{{ $post->gbr_url }}" />
@endsection

@section('content')

    <section>
        <div class="mb-10 xl:w-2/3 xl:mx-auto xl:order-2">
            <x-post-read-container>
                <h1 class="text-2xl font-bold text-ib-one">{{ $post->judul }}</h1>

                <div class="mt-3 flex flex-row justify-between">
                    <span class="mt-3 text-gray-600 text-sm">
                        {{ strftime('%b %e, %Y', strtotime($post->created_at)) }}
                    </span>
                    <div class="flex flex-row items-center justify-end">
                        @foreach ($share_buttons as $share)
                            <a href="{{ $share->url . $post->post_url }}" target="_blank" class="w-10 h-10 ml-1 xl:w-8 xl:h-8 inline-flex justify-center p-2 border border-solid border-gray-600 hover:border-ib-three rounded-full text-gray-600 hover:text-ib-three transition delay-100">
                                <i class="flaticon-{{ $share->ikon }} text-sm"></i>
                            </a>
                        @endforeach
                        <a href="javascript:;" id="__btnShareViaLink" data-url="{{ $post->post_url }}" class="w-10 h-10 ml-1 xl:w-8 xl:h-8 inline-flex justify-center p-2 border border-solid border-gray-600 hover:border-ib-three rounded-full text-gray-600 hover:text-ib-three transition delay-100">
                            <i class="flaticon-link text-sm"></i>
                        </a>
                    </div>
                </div>
            </x-post-read-container>

            <div class="my-3 mb-5 lg:w-3/4 mx-auto">
                <div class="w-full">
                    <img src="{{ $post->gbr_url }}" alt="{{ $post->judul }}" class="w-full h-auto">
                </div>
            </div>

            <x-post-read-container>
                <div class="article-content formatted text-ib-one">
                    {!! Str::of($post->isi)->replace('../../storage', url('/storage')) !!}
                </div>

                <div class="mt-6 py-4 flex flex-row items-center justify-center border border-solid border-r-0 border-b-0 border-l-0 border-ib-three">
                    <span class="text-ib-two text-sm mr-2">{{ __('global.share') }} : </span>
                    @foreach ($share_buttons as $share)
                        <a href="{{ $share->url . $post->post_url }}" target="_blank" class="w-10 h-10 ml-1 xl:w-8 xl:h-8 inline-flex justify-center p-2 border border-solid border-gray-600 hover:border-ib-three rounded-full text-gray-600 hover:text-ib-three transition delay-100">
                            <i class="flaticon-{{ $share->ikon }} text-sm"></i>
                        </a>
                    @endforeach
                    <a href="javascript:;" id="__btnShareViaLink" data-url="{{ $post->post_url }}" class="w-10 h-10 ml-1 xl:w-8 xl:h-8 inline-flex justify-center p-2 border border-solid border-gray-600 hover:border-ib-three rounded-full text-gray-600 hover:text-ib-three transition delay-100">
                        <i class="flaticon-link text-sm"></i>
                    </a>
                </div>
            </x-post-read-container>
        </div>
    </section>

    <section class="mt-8 py-10 bg-ib-four">
        <x-frontend-container>
            <h2 class="font-bold text-base xl:text-2xl text-ib-one mb-6">
                {{ __('global.related_post') }}
            </h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-0 lg:gap-4 xl:gap-8">
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