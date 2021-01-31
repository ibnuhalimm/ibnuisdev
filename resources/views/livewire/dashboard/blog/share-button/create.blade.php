<div>
    <x-card-content>
        <x-card-title>
            <a href="{{ route('dashboard.share-button.index') }}" class="mr-4 hover:text-ib-three">
                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
            </a>
            <h2 class="text-lg">New Share Button</h2>
        </x-card-title>
        <div class="w-full px-6 mb-6">
            <form action="#" method="post" wire:submit.prevent="storeShareButton">
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
                <x-button-link-primary href="{{ route('dashboard.share-button.index') }}" color="gray" wire.loading.attr="disabled" wire:target="storeShareButton">
                    Cancel
                </x-button-link-primary>
                <x-button type="submit" color="ib-three" wire:loading.attr="disabled" wire:target="storeShareButton">
                    Save
                </x-button>
            </form>
        </div>
    </x-card-content>
</div>
