<div x-data="{ is_modal_open: false }">
    <div class="w-full h-32 bg-gray-200 flex flex-col justify-end bg-no-repeat bg-center bg-cover @if ($page > 1) mt-3 @endif" style="background-image: url('{{ $image_url }}')">
        <a href="javascript:;"
            class="block py-1 px-3 text-center bg-ib-one bg-opacity-75 hover:text-ib-three outline-none focus:outline-none"
            @click="is_modal_open = true">
            <p class="truncate text-sm">
                {{ $name }}
            </p>
        </a>
    </div>

    <div class="w-full h-full fixed inset-0 bg-gray-900 bg-opacity-75 z-50"
        x-show.transition.opacity="is_modal_open === true" x-cloak>
        <div class="w-11/12 md:w-3/5 px-8 py-6 bg-ib-four mt-20 mx-auto"
            x-show.transition.5000ms="is_modal_open === true" x-cloak>
            <div class="mb-10 text-center">
                <h4 class="text-lg text-ib-one">Project Details</h4>
            </div>
            <div class="xl:px-6">
                <div class="mb-6 text-ib-one text-sm flex flex-col xl:flex-row justify-between">
                    <div class="w-full xl:w-2/5 h-32 xl:h-56 bg-gray-500 mb-6 bg-no-repeat bg-cover bg-center" style="background-image: url('{{ $image_url }}')"></div>
                    <div class="xl:w-3/5 xl:ml-8">
                        <h4 class="font-bold">Name</h4>
                        <p class="mb-4">
                            {{ $name }}
                        </p>
                        <h4 class="font-bold">Description</h4>
                        <p class="mb-4">
                            {!! $description !!}
                        </p>
                        <h4 class="font-bold">Link / Demo URL</h4>
                        <p class="mb-4">
                            @if (empty($link))
                                -
                            @else
                                <a href="{{ $link }}" class="text-ib-three hover:underline" target="_blank">
                                    {{ $link }}
                                </a>
                            @endif
                        </p>
                    </div>
                </div>
                <div class="text-center">
                    <button class="py-2 px-6 bg-ib-three text-ib-two shadow-md outline-none focus:outline-none" @click="is_modal_open = false">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
