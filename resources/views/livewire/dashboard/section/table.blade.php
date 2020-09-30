<div x-data="{
    is_edit_modal_open: {{ $is_edit_modal_open }}
}">
    <div class="w-full px-6">
        @if (session('alert-edit-status'))
            <x-alert color="{{ session('alert-edit-status') }}" title="{{ session('alert-edit-title') }}">
                {{ session('alert-edit-body') }}
            </x-alert>
        @endif
    </div>

    <x-table>
        <thead>
            <x-tr-head>
                <x-th class="pl-6 w-20">No</x-th>
                <x-th class="w-auto">Section</x-th>
                <x-th class="w-auto">Description</x-th>
                <x-th class="pr-6 w-24">&nbsp;</x-th>
            </x-tr-head>
        </thead>
        <tbody>
            @if ($sections->isEmpty())
                <x-tr-body>
                    <x-td class="px-6" colspan="4">
                        No data available
                    </x-td>
                </x-tr-body>
            @else
                @php
                    $no = 1;
                @endphp
                @foreach ($sections as $idx => $section)
                    <x-tr-body>
                        <x-td class="pl-6">
                            {{ $no++ }}
                        </x-td>
                        <x-td>
                            {{ $section->section }}
                        </x-td>
                        <x-td>
                            {!! $section->description !!}
                        </x-td>
                        <x-td class="pr-6 inline-flex">
                            <x-button-table href="javascript:;" wire:click="editSection({{ $section->id }})">
                                <svg class="h-5 w-5 mx-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </x-button-table>
                        </x-td>
                    </x-tr-body>
                @endforeach
            @endif
        </tbody>
    </x-table>

    <x-modal-backdrop x-show.transition.opacity="is_edit_modal_open === 1" x-cloak>
        <x-modal-content size="medium" x-show.transition.5000ms="is_edit_modal_open === 1" x-cloak>
            <x-modal-title>
                Edit
            </x-modal-title>
            <x-modal-body>

                @if (session('alert-edit-status'))
                <x-alert color="{{ session('alert-edit-status') }}" title="{{ session('alert-edit-title') }}">
                    {{ session('alert-edit-body') }}
                </x-alert>
                @endif

                <x-form-label-inline text="Section" required="true" size="medium">
                    <x-input-text type="text" wire:model.lazy="edit_section" class="bg-gray-200" readonly />
                    @error('edit_section') <x-form-error> {{ $message }} </x-form-error> @enderror
                </x-form-label-inline>
                <x-form-label-inline text="Description" required="true" size="medium">
                    <x-textarea wire:model.lazy="edit_description" rows="5"></x-textarea>
                    @error('edit_description') <x-form-error> {{ $message }} </x-form-error> @enderror
                </x-form-label-inline>
                <div class="text-center">
                    <x-button type="button" color="gray" wire:click="cancelEditSection" wire:loading.attr="disabled" wire:loading.class="bg-opacity-50" wire:target="cancelEditSection, submitEditSection">
                        Cancel
                    </x-button>
                    <x-button type="button" color="ib-three" wire:click="submitEditSection" wire:loading.attr="disabled" wire:loading.class="bg-opacity-50" wire:target="cancelEditSection, submitEditSection">
                        <span wire:loading.remove wire:target="submitEditSection">
                            Update
                        </span>
                        <span wire:loading wire:target="submitEditSection">
                            Updating...
                        </span>
                    </x-button>
                </div>
            </x-modal-body>
        </x-modal-content>
    </x-modal-backdrop>

</div>
