<div x-data="{
    is_create_modal_open: {{ $is_create_modal_open }},
    is_delete_modal_open: {{ $is_delete_modal_open }}
}" >
    <x-card-content>
        <x-card-title>
            <h2 class="text-lg">Short URL</h2>
        </x-card-title>
        <div class="w-full px-6 mb-3">
            <div class="flex flex-col xl:flex-row items-start xl:items-center justify-between">
                <div>
                    <x-button type="button" color="ib-three" wire:click="createShortUrl">
                        <svg class="w-4 h-4 -ml-1 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        New Redirect
                    </x-button>
                </div>
                <div class="w-full mt-4 xl:mt-0 xl:w-1/3 flex flex-row items-start xl:items-center justify-start xl:justify-end">
                    <div class="w-2/3">
                        <x-input-text type="search" placeholder="Search" wire:model.debounce.500ms="search" />
                    </div>
                </div>
            </div>
        </div>

        @if (session('alert-type') == 'success')
            <div class="px-6 my-4">
                <x-alert color="green" title="Success">
                    {{ session('alert-message') }}
                </x-alert>
            </div>
        @endif

        @if (session('alert-delete-type') == 'success')
            <div class="px-6 my-4">
                <x-alert color="green" title="Success">
                    {{ session('alert-delete-message') }}
                </x-alert>
            </div>
        @endif

        <x-table>
            <thead>
                <x-tr-head>
                    <x-th class="pl-6 w-20">No</x-th>
                    <x-th class="w-auto">Long URL</x-th>
                    <x-th class="w-auto">Short URL</x-th>
                    <x-th class="pr-6 w-24">&nbsp;</x-th>
                </x-tr-head>
            </thead>
            <tbody>
                @if ($shortUrls->isEmpty())
                    <x-tr-body>
                        <x-td class="px-6" colspan="4">Tidak ada data</x-td>
                    </x-tr-body>
                @else
                    @foreach ($shortUrls as $idx => $shortUrl)
                        <x-tr-body>
                            <x-td class="pl-6">{{ $shortUrls->firstItem() + $idx }}</x-td>
                            <x-td>
                                <a href="{{ $shortUrl->origin }}" target="_blank" class="text-ib-three hover:text-ib-three focus:text-ib-three hover:underline">
                                    {{ $shortUrl->origin }}
                                </a>
                            </x-td>
                            <x-td>
                                <a href="{{ route('redirect-long-url', [ 'short_id' => $shortUrl->short_id ]) }}" target="_blank" class="text-ib-three hover:text-ib-three focus:text-ib-three hover:underline">
                                    {{ route('redirect-long-url', [ 'short_id' => $shortUrl->short_id ]) }}
                                </a>
                            </x-td>
                            <x-td class="pr-6">
                                <x-button-table href="javascript:;" title="Delete" wire:click="deleteShortUrl({{ $shortUrl->id }})">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </x-button-table>
                            </x-td>
                        </x-tr-body>
                    @endforeach
                @endif
            </tbody>
        </x-table>

        {!! $shortUrls->links() !!}
    </x-card-content>


    <x-modal-backdrop x-show.transition.opacity="is_create_modal_open === 1" x-cloak>
        <x-modal-content size="medium">
            <x-modal-title>
                Create
            </x-modal-title>
            <x-modal-body>

                @if (session('alert-type') == 'error')
                    <x-alert color="red" title="Error">
                        {{ session('alert-message') }}
                    </x-alert>
                @endif

                <form action="#" method="post" wire:submit.prevent="storeRedirect">
                    <x-form-label-inline text="Long URL" required="true" size="large">
                        <x-textarea type="text" wire:model.lazy="origin" class="resize-none" rows="5"></x-textarea>
                        @error('origin') <x-form-error> {{ $message }} </x-form-error> @enderror
                    </x-form-label-inline>

                    <x-form-label-inline text="Short URL" required="true" size="large">
                        <div class="flex items-center justify-between">
                            <div class="hidden xl:block xl:w-2/5 mr-2">
                                <x-input-text type="text" value="{{ route('redirect-long-url', [ 'short_id' => '' ]) . '/' }}" class="bg-gray-100" readonly />
                            </div>
                            <div class="w-full xl:w-3/5 xl:ml-2">
                                <x-input-text type="text" wire:model.lazy="short_id" />
                            </div>
                        </div>
                        @error('short_id') <x-form-error> {{ $message }} </x-form-error> @enderror
                    </x-form-label-inline>

                    <div class="flex items-center justify-center">
                        <x-button type="button" color="gray" wire:click="cancelStore" wire:target="cancelStore, storeRedirect" wire:loading.attr="disabled">
                            Cancel
                        </x-button>
                        <x-button type="submit" color="ib-three" wire:target="cancelStore, storeRedirect" wire:loading.attr="disabled">
                            <span wire:target="storeRedirect" wire:loading.remove>Save</span>
                            <span wire:target="storeRedirect" wire:loading>Saving</span>
                        </x-button>
                    </div>
                </form>
            </x-modal-body>
        </x-modal-content>
    </x-modal-backdrop>


    <x-modal-backdrop x-show.transition.opacity="is_delete_modal_open === 1" x-cloak>
        <x-modal-content size="small">
            <x-modal-title>
                Delete
            </x-modal-title>
            <x-modal-body>

                @if (session('alert-delete-type') == 'error')
                    <x-alert color="red" title="Error">
                        {{ session('alert-delete-message') }}
                    </x-alert>
                @endif

                <div class="text-center mb-5">
                    Are you sure to delete this short URL?
                </div>

                <div class="flex items-center justify-center">
                    <x-button type="button" color="gray" wire:click="cancelDelete" wire:target="cancelDelete, submitDelete" wire:loading.attr="disabled">
                        No, Close
                    </x-button>
                    <x-button type="submit" color="red" wire:click="submitDelete" wire:target="cancelDelete, submitDelete" wire:loading.attr="disabled">
                        <span wire:target="submitDelete" wire:loading.remove>Yes, Delete</span>
                        <span wire:target="submitDelete" wire:loading>Deleting</span>
                    </x-button>
                </div>
            </x-modal-body>
        </x-modal-content>
    </x-modal-backdrop>

</div>
