@if ($paginator->hasPages())
    <nav class="w-full bg-gray-300 py-3 px-6 flex flex-col md:flex-row items-center justify-between">
        <div class="text-gray-800">
            Total : {{ number_format($paginator->total()) }} item(s)
        </div>
        <ul class="flex justify-center items-center" role="navigation">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="mr-2 text-gray-500" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="px-2 py-1 text-center inline-flex" aria-hidden="true">
                        <svg class="h-3 w-3 mr-2 mt-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        Prev
                    </span>
                </li>
            @else
                <li class="mr-2">
                    <button type="button" class="px-2 py-1 text-center text-gray-800 hover:text-blue-700 focus:outline-none inline-flex" wire:click="previousPage" rel="prev" aria-label="@lang('pagination.previous')">
                        <svg class="h-3 w-3 mr-2 mt-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        Prev
                    </button>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="mx-1 text-gray-500" aria-disabled="true"><span class="px-2 py-1">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="mx-1 text-gray-500" aria-current="page">
                                <span class="px-2 py-1">{{ $page }}</span>
                            </li>
                        @else
                            <li class="mx-1">
                                <button type="button" class="px-2 py-1 text-gray-800 hover:text-blue-700 focus:outline-none" wire:click="gotoPage({{ $page }})">
                                    {{ $page }}
                                </button>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="ml-2">
                    <button type="button" class="px-2 py-1 text-center text-gray-800 hover:text-blue-700 focus:outline-none inline-flex" wire:click="nextPage" rel="next" aria-label="@lang('pagination.next')">
                        Next
                        <svg class="h-3 w-3 ml-2 mt-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </li>
            @else
                <li class="ml-2 text-gray-500" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="px-2 py-1 text-center inline-flex" aria-hidden="true">
                        Next
                        <svg class="h-3 w-3 ml-2 mt-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@else
    @if ($paginator->count() > 0)
    <nav class="w-full bg-gray-300 py-3 px-6 flex flex-col md:flex-row items-center justify-between">
        <div class="text-gray-800">
            Total : {{ number_format($paginator->total()) }} item(s)
        </div>
        <ul class="flex justify-center items-center" role="navigation">
            <li class="mr-2 text-gray-500" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="px-2 py-1 text-center inline-flex" aria-hidden="true">
                    <svg class="h-3 w-3 mr-2 mt-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Prev
                </span>
            </li>
            <li class="mx-1 text-gray-500" aria-current="page">
                <span class="px-2 py-1">1</span>
            </li>
            <li class="ml-2 text-gray-500" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="px-2 py-1 text-center inline-flex" aria-hidden="true">
                    Next
                    <svg class="h-3 w-3 ml-2 mt-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </span>
            </li>
        </ul>
    </nav>
    @endif
@endif
