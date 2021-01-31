@if ($paginator->hasPages())
    <nav class="w-full mt-6 py-2 px-1 flex flex-col xl:flex-row items-center justify-between xl:justify-center">
        <ul class="flex justify-center items-center" role="navigation">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="mx-2">
                    <span class="px-2 py-1 inline-flex items-center text-gray-500 focus:outline-none" rel="prev">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="arrow-narrow-left w-4 h-4"><path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
                        <span class="ml-2">Artikel Baru</span>
                    </span>
                </li>
            @else
                <li class="mx-2">
                    <button type="button" class="px-2 py-1 inline-flex items-center text-gray-800 hover:text-ib-three focus:outline-none" wire:click="previousPage" rel="prev" aria-label="@lang('pagination.previous')" wire:loading.attr="disabled">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="arrow-narrow-left w-4 h-4"><path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
                        <span class="ml-2">Artikel Baru</span>
                    </button>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="mx-2">
                    <button type="button" class="px-2 py-1 inline-flex items-center text-gray-800 hover:text-ib-three focus:outline-none" wire:click="nextPage" rel="next" aria-label="@lang('pagination.next')" wire:loading.attr="disabled">
                        <span class="mr-2">Artikel Lama</span>
                        <svg viewBox="0 0 20 20" fill="currentColor" class="arrow-narrow-right w-4 h-4"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </li>
            @else
                <li class="mx-2">
                    <span class="px-2 py-1 inline-flex items-center text-gray-500 focus:outline-none" rel="next" aria-label="@lang('pagination.next')">
                        <span class="mr-2">Artikel Lama</span>
                        <svg viewBox="0 0 20 20" fill="currentColor" class="arrow-narrow-right w-4 h-4"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
