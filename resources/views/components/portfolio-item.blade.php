<div x-data="{ is_modal_open: false }">
    <div class="w-full h-56 xl:h-80 bg-no-repeat bg-center mb-6 lg:mb-0" style="background-image: url('{{ $image }}')">
        <div class="w-full h-full left-0 top-0 bg-ib-one bg-opacity-70 flex items-center justify-center">
            <div class="w-3/4 mx-auto text-center">
                <h3 class="font-bold text-ib-four mb-3 text-lg">
                    {{ $name }}
                </h3>
                <button class="px-5 py-2 border border-solid border-ib-four bg-transparent hover:bg-ib-four text-ib-four hover:text-ib-one outline-none focus:outline-none" @click="is_modal_open = true">
                    {{ __('global.view_project') }}
                </button>
            </div>
        </div>
    </div>

    <div class="w-full h-full fixed inset-0 bg-gray-900 bg-opacity-80 z-50"
        x-show.transition.opacity="is_modal_open === true" x-cloak>
        <div class="w-11/12 md:w-3/5 mx-auto px-8 py-6 bg-ib-four mt-20 sm:mt-10 md:mt-20 mx-auto h-4/5 md:h-auto lg:h-3/4 xl:h-auto overflow-y-auto"
            x-show.transition.5000ms="is_modal_open === true" x-cloak>
            <div class="mb-10 text-center">
                <h4 class="text-lg text-ib-one">
                    {{ __('global.project_detail') }}
                </h4>
            </div>
            <div class="xl:px-6">
                <div class="mb-6 text-ib-one text-sm flex flex-col xl:flex-row justify-between">
                    <div class="w-full xl:w-2/5 mb-6">
                        <img src="{{ __('http://ibnuisdev.test/storage/post/b235908decdce0235b3e61506851f03b.jpg') }}" alt="{{ __('Project Name') }}" class="w-full h-auto">
                    </div>
                    <div class="xl:w-3/5 xl:ml-8">
                        <h4 class="font-bold">
                            {{ __('global.name') }}
                        </h4>
                        <p class="mb-4">
                            {{ $name }}
                        </p>
                        <h4 class="font-bold">
                            {{ __('global.description') }}
                        </h4>
                        <p class="mb-4">
                            {{ $description }}
                        </p>
                        <h4 class="font-bold">
                            {{ __('global.link_demo_url') }}
                        </h4>
                        <p class="mb-4">
                            @if (empty($link))
                                -
                            @else
                                <a href="{{ $link }}" class="text-ib-three hover:underline" target="_blank" rel="noreferrer">
                                    {{ $link }}
                                </a>
                            @endif
                        </p>
                    </div>
                </div>
                <div class="text-center">
                    <button class="py-2 px-6 bg-ib-three text-ib-four shadow-lg outline-none focus:outline-none" @click="is_modal_open = false">
                        {{ __('global.close') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>