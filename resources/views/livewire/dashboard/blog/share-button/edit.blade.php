<div x-data="{
    is_delete_modal_open: {{ $is_delete_modal_open }}
}">
    <x-card-content>
        <x-card-title>
            <a href="{{ route('dashboard.share-button.index') }}" class="mr-4 hover:text-ib-three">
                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
            </a>
            <h2 class="text-lg">Edit Share Button</h2>
        </x-card-title>
        <div class="w-full px-6 mb-6">
            <form action="#" method="post" wire:submit.prevent="updateShareButton">
                <x-form-label-inline text="Name" required="true">
                    <x-input-text type="text" wire:model.lazy="nama" />
                    @error('nama') <x-form-error>{{ $message }}</x-form-error> @enderror
                </x-form-label-inline>
                <x-form-label-inline text="Icon" required="true">
                    <x-input-text type="text" wire:model.lazy="ikon" />
                    @error('ikon') <x-form-error>{{ $message }}</x-form-error> @enderror
                </x-form-label-inline>
                <x-form-label-inline text="URL" required="true">
                    <x-textarea rows="5" wire:model.lazy="url" />
                    @error('url') <x-form-error>{{ $message }}</x-form-error> @enderror
                </x-form-label-inline>
                <x-form-label-inline text="Order Number" required="true">
                    <x-input-text type="number" wire:model.lazy="nomor_urut" />
                    @error('nomor_urut') <x-form-error>{{ $message }}</x-form-error> @enderror
                </x-form-label-inline>
        </div>

        <div class="w-full px-6 text-center pb-10">
                <x-button type="button" color="red" wire:loading.attr="disabled" wire:click="deleteShareButton" wire:target="deleteShareButton, updateShareButton">
                    Delete
                </x-button>
                <x-button-link-primary href="{{ route('dashboard.share-button.index') }}" color="gray" wire.loading.attr="disabled">
                    Cancel
                </x-button-link-primary>
                <x-button type="submit" color="ib-three" wire:loading.attr="disabled" wire:target="deleteShareButton, updateShareButton">
                    Save
                </x-button>
            </form>
        </div>
    </x-card-content>

    <x-modal-backdrop x-show.transition.opacity="is_delete_modal_open === 1" x-cloak>
        <x-modal-content size="medium" x-show.transition.5000ms="is_delete_modal_open === 1" x-cloak>
            <x-modal-title>
                Delete Share Button
            </x-modal-title>
            <x-modal-body>
                <form method="post" wire:submit.prevent="destroyShareButton">
                    <div class="mb-6 text-center">
                        Are you sure to delete this share button?
                    </div>
                    <div class="text-center">
                        <x-button type="button" color="gray" class="mx-1" wire:click="cancelDestroyShareButton" wire:loading.attr="disabled" wire:loading.class="bg-opacity-75 cursor-not-allowed" wire:target="cancelDestroyShareButton, destroyShareButton">
                            No
                        </x-button>
                        <x-button type="submit" color="red" class="mx-1" wire:loading.attr="disabled" wire:loading.class="bg-opacity-75 cursor-not-allowed" wire.target="cancelDestroyShareButton, destroyShareButton">
                            Yes, delete
                        </x-button>
                    </div>
                </form>
            </x-modal-body>
        </x-modal-content>
    </x-modal-backdrop>

</div>
