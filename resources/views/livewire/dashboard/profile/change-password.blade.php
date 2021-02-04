<div>
    <x-card-content>
        <x-card-title>
            <h2 class="text-lg">
                Change Password
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

            <form action="#" method="post" wire:submit.prevent="changePassword">
                <x-form-label-inline text="Current Password" required="true">
                    <x-input-text type="password" wire:model.lazy="current_password" />
                    @error('current_password') <x-form-error>{{ $message }}</x-form-error> @enderror
                </x-form-label-inline>
                <x-form-label-inline text="New Password" required="true">
                    <x-input-text type="password" wire:model.lazy="new_password" />
                    @error('new_password') <x-form-error>{{ $message }}</x-form-error> @enderror
                </x-form-label-inline>
        </div>
        <div class="w-full px-6 text-center pb-10">
                <x-button-link-primary href="{{ route('home') }}" color="gray" wire:loading.attr="disabled" wire:loading.class="bg-opacity-75 cursor-not-allowed" wire:target="changePassword">
                    Cancel
                </x-button-link-primary>
                <x-button type="submit" color="ib-three" wire:loading.attr="disabled" wire:loading.class="bg-opacity-75 cursor-not-allowed" wire:target="changePassword">
                    Update Password
                </x-button>
            </form>
        </div>
    </x-card-content>
</div>
