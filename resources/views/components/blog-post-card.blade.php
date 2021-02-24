<a href="{{ route('blog.post.read', [ 'slug' => $slug ]) }}" class="block w-full px-5 py-3 rounded-md outline-none hover:outline-none text-ib-one hover:text-ib-three transition delay-100">
    <div class="flex flex-row items-start justify-between">
        <div class="w-1/3 lg:w-2/5 xl:w-5/12">
            <div class="w-24 h-20 md:w-24 md:h-24 xl:w-4/5 xl:h-24 rounded-md bg-cover bg-no-repeat border border-solid border-gray-200" style="background-image: url('{{ $image }}')"></div>
        </div>
        <div class="w-2/3 lg:w-3/5 xl:w-7/12 flex flex-col items-start justify-between py-1">
            <div class="sm:-ml-4">
                <h3 class="h-auto font-bold truncate-two-lines">
                    {{ $title }}
                </h3>
                <p class="text-xs text-gray-600 mt-1">{{ strftime('%b %e, %Y', strtotime($date)) }}</p>
            </div>
        </div>
    </div>
</a>