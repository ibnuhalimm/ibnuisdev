<div class="flex justify-center mt-6">
    <button type="button" class="py-2 px-6 bg-ib-three text-ib-two shadow-md outline-none focus:outline-none" wire:click="loadMore" wire:loading.attr="disabled" wire:loading.class="bg-opacity-50" wire:target="loadMore">
        <span wire:loading.remove wire:target="loadMore">
            More Projects
        </span>
        <span wire:loading wire:target='loadMore'>
            Loading...
        </span>
    </button>
</div>