<div>
    <x-card-content>
        <x-card-title>
            <h2 class="text-lg">
                Profile Data
            </h2>
        </x-card-title>
        <div class="w-full px-6 mb-6">

            @if(session()->has('status_message'))
                <div class="w-full xl:w-2/3 mx-auto -mt-3 mb-4">
                    <x-alert color="{{ session('status_color') }}">
                        {{ session('status_message') }}
                    </x-alert>
                </div>
            @endif

            <form action="#" method="post" wire:submit.prevent="updateProfil">
                <x-form-label-inline text="Name" required="true">
                    <x-input-text type="text" wire:model.lazy="name" />
                    @error('name') <x-form-error>{{ $message }}</x-form-error> @enderror
                </x-form-label-inline>
                <x-form-label-inline text="Username" required="true">
                    <x-input-text type="text" readonly class="bg-gray-200" wire:model.lazy="username" />
                </x-form-label-inline>
                <x-form-label-inline text="Email" required="true">
                    <x-input-text type="text" wire:model.lazy="email" />
                    @error('email') <x-form-error>{{ $message }}</x-form-error> @enderror
                </x-form-label-inline>
                <x-form-label-inline text="Github" required="true">
                    <x-input-text type="text" wire:model.lazy="github" />
                    @error('github') <x-form-error>{{ $message }}</x-form-error> @enderror
                </x-form-label-inline>
                <x-form-label-inline text="Twitter" required="true">
                    <x-input-text type="text" wire:model.lazy="twitter" />
                    @error('twitter') <x-form-error>{{ $message }}</x-form-error> @enderror
                </x-form-label-inline>
                <x-form-label-inline text="LinkedIn" required="true">
                    <x-input-text type="text" wire:model.lazy="linkedin" />
                    @error('linkedin') <x-form-error>{{ $message }}</x-form-error> @enderror
                </x-form-label-inline>
                <x-form-label-inline text="Upwork" required="true">
                    <x-input-text type="text" wire:model.lazy="upwork" />
                    @error('upwork') <x-form-error>{{ $message }}</x-form-error> @enderror
                </x-form-label-inline>
        </div>
        <div class="w-full px-6 text-center pb-10">
                <x-button-link-primary href="{{ route('home') }}" color="gray" wire:loading.attr="disabled" wire:loading.class="bg-opacity-75 cursor-not-allowed" wire:target="updateProfil">
                    Cancel
                </x-button-link-primary>
                <x-button type="submit" color="ib-three" wire:loading.attr="disabled" wire:loading.class="bg-opacity-75 cursor-not-allowed"  wire:target="updateProfil">
                    Update Data
                </x-button>
            </form>
        </div>
    </x-card-content>
</div>
