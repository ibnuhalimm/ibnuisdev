<a href="{{ route('blog.post.read', [ 'slug' => $slug ]) }}" class="block w-full mb-6 py-3 xl:py-0 rounded-md outline-none hover:outline-none text-ib-one hover:text-ib-three transition-all duration-500">
    <div class="w-full h-52 lg:h-32 xl:h-64 rounded-md bg-cover bg-no-repeat bg-center border border-solid border-gray-200" style="background-image: url('{{ $image }}')"></div>
    <div class="mt-4">
        <h3 class="text-xl xl:text-2xl font-bold font-serif">
            {{ $title }}
        </h3>
        <p class="text-xs text-gray-600 mt-2">{{ strftime('%b %e, %Y', strtotime($date)) }}</p>
        <p class="mt-3 text-gray-800">
            {{ $preview_body }}
        </p>
    </div>
</a>