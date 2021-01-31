<div wire:poll.300000ms>
    <x-card-content>
        <x-card-title>
            <div class="w-5/6">
                Most Visited Pages (Last {{ $days }} Days)
            </div>
            <div class="w-1/6 flex justify-end">
                <span>
                    <svg class="h-6 w-6 text-gray-500" wire:loading.class="animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                </span>
            </div>
        </x-card-title>
        <div class="w-full">
            <x-table>
                <thead>
                    <x-tr-head>
                        <x-th class="pl-6 w-20">No</x-th>
                        <x-th class="w-auto">Page Title</x-th>
                        <x-th class="w-auto">URL</x-th>
                        <x-th class="pr-6 w-auto">Page Views</x-th>
                    </x-tr-head>
                </thead>
                <tbody>
                    @if ($pages->isEmpty())
                        <x-tr-body>
                            <x-td class="px-6" colspan="4">
                                Tidak ada data
                            </x-td>
                        </x-tr-body>
                    @else
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($pages as $page)
                            <x-tr-body>
                                <x-td class="pl-6">
                                    {{ $no++ }}
                                </x-td>
                                <x-td>
                                    {{ $page->pageTitle }}
                                </x-td>
                                <x-td>
                                    {{ $page->url }}
                                </x-td>
                                <x-td class="pr-6">
                                    {{ $page->pageViews }}
                                </x-td>
                            </x-tr-body>
                            @endforeach
                    @endif
                </tbody>
            </x-table>
        </div>
    </x-card-content>
</div>
