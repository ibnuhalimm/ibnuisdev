<div>
    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
        @foreach ($posts as $post)
            <a href="{{ route('blog.post.read', [ 'slug' => $post->slug ]) }}" class="block w-full p-5 bg-white rounded-md outline-none hover:outline-none hover:text-ib-three">
                <div class="flex flex-row items-center justify-between">
                    <div class="w-2/5">
                        <div class="w-20 h-20 rounded-md bg-cover bg-no-repeat" style="background-image: url('{{ $post->gbr_url }}')"></div>
                    </div>
                    <div class="w-3/5 flex flex-col items-center justify-between">
                        <div class="-ml-3">
                            <h3 class="h-auto xl:h-10 font-bold">
                                {{ Str::limit($post->judul, 35, '...') }}
                            </h3>
                            <p class="text-xs mt-3">{{ strftime('%e %B %Y', strtotime($post->created_at)) }}</p>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    {!! $posts->links() !!}

</div>
