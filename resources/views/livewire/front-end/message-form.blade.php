<div>
    @if (session('alert-status') == 'green')
        <x-alert color="{{ session('alert-status') }}" title="{{ session('alert-title') }}">
            {{ session('alert-body') }}
        </x-alert>
    @else
        @if (session('alert-status'))
            <x-alert color="{{ session('alert-status') }}" title="{{ session('alert-title') }}">
                {{ session('alert-body') }}
            </x-alert>
        @endif
        <div class="mb-5">
            <label for="__nameContact">
                Name
            </label>
            <input type="text" id="__nameContact"
                class="w-full mt-1 py-2 px-3 bg-ib-two outline-none focus:outline-none" autocomplete="off" wire:model.lazy="name">
            @error('name')
                <p class="mt-2 mb-3 text-xs text-red-400">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-5">
            <label for="__emailContact">
                Email Address
            </label>
            <input type="email" id="__emailContact"
                class="w-full mt-1 py-2 px-3 bg-ib-two outline-none focus:outline-none" autocomplete="off" wire:model.lazy="email">
            @error('email')
                <p class="mt-2 mb-3 text-xs text-red-400">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-5">
            <label for="__messageContact">
                Message
            </label>
            <textarea id="__messageContact"
                class="w-full mt-1 py-2 px-3 bg-ib-two outline-none focus:outline-none resize-none"
                rows="6" autocomplete="off" wire:model.lazy="body"></textarea>
            @error('body')
                <p class="mt-1 mb-3 text-xs text-red-400">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="flex justify-center">
            <button class="py-2 px-6 bg-ib-three text-ib-two shadow-md outline-none focus:outline-none" wire:click="sendMessage" wire:loading.attr="disabled" wire:loading.class="bg-opacity-50" wire:target="sendMessage">
                <span wire:loading.remove wire:target="sendMessage">
                    Send Message
                </span>
                <span wire:loading wire:target="sendMessage">
                    Sending...
                </span>
            </button>
        </div>
    @endif
</div>