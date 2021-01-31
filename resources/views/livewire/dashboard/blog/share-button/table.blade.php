<div>
    <x-card-content>
        <x-card-title>
            <h2 class="text-lg">Share Buttons</h2>
        </x-card-title>
        <div class="w-full px-6 mb-3">
            <div class="flex flex-col xl:flex-row items-start xl:items-center justify-between">
                <div>
                    <x-button-link-primary href="{{ route('dashboard.share-button.create') }}" color="ib-three">
                        <svg class="w-4 h-4 -ml-1 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        New Share Button
                    </x-button-link-primary>
                </div>
                <div class="w-full mt-4 xl:mt-0 xl:w-1/3 flex flex-row items-start xl:items-center justify-start xl:justify-end">
                    <div class="w-2/3">
                        <x-input-text type="search" placeholder="Pencarian Data" wire:model.debounce.500ms="search" />
                    </div>
                </div>
            </div>
        </div>

        <x-table>
            <thead>
                <x-tr-head>
                    <x-th class="pl-6 w-20">No</x-th>
                    <x-th class="w-auto">Name</x-th>
                    <x-th class="w-auto">Icon</x-th>
                    <x-th class="w-auto">URL</x-th>
                    <x-th class="pr-6 w-24">&nbsp;</x-th>
                </x-tr-head>
            </thead>
            <tbody>
                @if ($share_buttons->isEmpty())
                    <x-tr-body>
                        <x-td class="px-6" colspan="5">Tidak ada data</x-td>
                    </x-tr-body>
                @else
                    @foreach ($share_buttons as $button)
                        <x-tr-body>
                            <x-td class="pl-6">{{ $button->nomor_urut }}</x-td>
                            <x-td>
                                {{ $button->nama }}
                            </x-td>
                            <x-td>
                                <i class="flaticon-{{ $button->ikon }}"></i>
                            </x-td>
                            <x-td>
                                {{ Str::of($button->url)->limit(100) }}
                            </x-td>
                            <x-td class="pr-6">
                                <x-button-table href="{{ route('dashboard.share-button.edit', ['id' => $button->id]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </x-button-table>
                            </x-td>
                        </x-tr-body>
                    @endforeach
                @endif
            </tbody>
        </x-table>

        {!! $share_buttons->links() !!}
    </x-card-content>
</div>
