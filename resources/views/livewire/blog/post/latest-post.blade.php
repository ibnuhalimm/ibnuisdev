<div>
    <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-2">
        @foreach ($posts as $post)
            <x-blog-post-card slug="{{ $post->slug }}" image="{{ $post->gbr_url }}" title="{{ $post->judul }}" date="{{ $post->created_at }}" />
        @endforeach
    </div>

    {!! $posts->links() !!}

</div>
