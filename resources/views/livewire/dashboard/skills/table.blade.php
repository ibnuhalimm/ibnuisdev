<div x-data="{
    is_create_modal_open: {{ $is_create_modal_open }},
    is_edit_modal_open: {{ $is_edit_modal_open }},
    is_delete_modal_open: {{ $is_delete_modal_open }}
}">
    <div class="w-full px-6 mb-3">
        @if (session('alert-status'))
            <x-alert color="{{ session('alert-status') }}" title="{{ session('alert-title') }}">
                {{ session('alert-body') }}
            </x-alert>
        @endif

        <div class="flex flex-col xl:flex-row items-start xl:items-center justify-between">
            <div>
                <x-button-link-primary href="javascript:;" color="ib-three" wire:click="createSkill">
                    <svg class="w-4 h-4 -ml-1 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    NEW skill
                </x-button-link-primary>
            </div>
            <div class="w-full mt-4 xl:mt-0 xl:w-2/5 flex flex-col xl:flex-row items-start xl:items-center justify-end">
                <div class="w-full xl:w-1/2 mr-2">
                    <x-select wire:model.lazy="flag_type">
                        <option value="{{ \App\Models\Skill::FLAG_TYPE_DAY_TO_DAY }}">
                            Day-to-day Comfort
                        </option>
                        <option value="{{ \App\Models\Skill::FLAG_TYPE_EXPERIENCE }}">
                            Experienced-with
                        </option>
                    </x-select>
                </div>
                <div class="w-full xl:w-1/2 ml-2">
                    <x-input-text type="text" placeholder="Search" wire:model.debounce.500ms="search" />
                </div>
            </div>
        </div>
    </div>

    <x-table>
        <thead>
            <x-tr-head>
                <x-th class="pl-6 w-20">No</x-th>
                <x-th class="w-auto">Name</x-th>
                <x-th class="w-auto">Order Number</x-th>
                <x-th class="pr-6 w-24">&nbsp;</x-th>
            </x-tr-head>
        </thead>
        <tbody>
            @if ($skills->isEmpty())
                <x-tr-body>
                    <x-td class="px-6" colspan="4">
                        No data available
                    </x-td>
                </x-tr-body>
            @else
                @foreach ($skills as $idx => $skill)
                    <x-tr-body>
                        <x-td class="pl-6">
                            {{ $idx + $skills->firstItem() }}
                        </x-td>
                        <x-td>
                            {{ $skill->name }}
                        </x-td>
                        <x-td>
                            {{ $skill->order_number }}
                        </x-td>
                        <x-td class="pr-6 inline-flex">
                            <x-button-table href="javascript:;" wire:click="editSkill({{ $skill->id }})">
                                <svg class="h-5 w-5 mx-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </x-button-table>
                            <x-button-table href="javascript:;" wire:click="deleteskill({{ $skill->id }})">
                                <svg class="h-5 w-5 mx-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </x-button-table>
                        </x-td>
                    </x-tr-body>
                @endforeach
            @endif
        </tbody>
    </x-table>

    {!! $skills->links() !!}


    @if ($is_edit_mode !== true)
    <x-modal-backdrop x-show.transition.opacity="is_create_modal_open === 1" x-cloak>
        <x-modal-content size="medium" x-show.transition.5000ms="is_create_modal_open === 1" x-cloak>
            <x-modal-title>
                New Skill
            </x-modal-title>
            <x-modal-body>

                @if (session('alert-create-status'))
                    <x-alert color="{{ session('alert-create-status') }}" title="{{ session('alert-create-title') }}">
                        {{ session('alert-create-body') }}
                    </x-alert>
                @endif

                <x-form-label-inline text="Name" required="true" size="medium">
                    <x-input-text type="text" wire:model.lazy="name" />
                    @error('name') <x-form-error> {{ $message }} </x-form-error> @enderror
                </x-form-label-inline>
                <x-form-label-inline text="Order Number" required="true" size="medium">
                    <div class="w-full lg:w-1/2">
                        <x-input-text type="number" wire:model.lazy="order_number" />
                    </div>
                    @error('order_number') <x-form-error> {{ $message }} </x-form-error> @enderror
                </x-form-label-inline>
                <x-form-label-inline text="Type" required="true" size="medium">
                    <div class="w-full">
                        <x-select wire:model.lazy="flag_type_form">
                            <option value="{{ \App\Models\Skill::FLAG_TYPE_DAY_TO_DAY }}">
                                Day-to-day Comfort
                            </option>
                            <option value="{{ \App\Models\Skill::FLAG_TYPE_EXPERIENCE }}">
                                Experienced-with
                            </option>
                        </x-select>
                    </div>
                    @error('flag_type') <x-form-error> {{ $message }} </x-form-error> @enderror
                </x-form-label-inline>

                <div class="text-center">
                    <x-button type="button" color="gray" wire:click="cancelCreateSkill" wire:loading.attr="disabled" wire:loading.class="bg-opacity-50" wire:target="cancelCreateSkill, submitCreateSkill">
                        Cancel
                    </x-button>
                    <x-button type="button" color="ib-three" wire:click="submitCreateSkill" wire:loading.attr="disabled" wire:loading.class="bg-opacity-50" wire:target="cancelCreateSkill, submitCreateSkill">
                        <span wire:loading.remove wire:target="submitCreateSkill">
                            Save Data
                        </span>
                        <span wire:loading wire:target="submitCreateSkill">
                            Saving...
                        </span>
                    </x-button>
                </div>
            </x-modal-body>
        </x-modal-content>
    </x-modal-backdrop>

    @else

    <x-modal-backdrop x-show.transition.opacity="is_edit_modal_open === 1" x-cloak>
        <x-modal-content size="medium" x-show.transition.5000ms="is_edit_modal_open === 1" x-cloak>
            <x-modal-title>
                Edit Skill
            </x-modal-title>
            <x-modal-body>

                @if (session('alert-edit-status'))
                    <x-alert color="{{ session('alert-edit-status') }}" title="{{ session('alert-edit-title') }}">
                        {{ session('alert-edit-body') }}
                    </x-alert>
                @endif

                <x-form-label-inline text="Name" required="true" size="medium">
                    <x-input-text type="text" wire:model.lazy="name" />
                    @error('name') <x-form-error> {{ $message }} </x-form-error> @enderror
                </x-form-label-inline>
                <x-form-label-inline text="Order Number" required="true" size="medium">
                    <div class="w-full lg:w-1/2">
                        <x-input-text type="number" wire:model.lazy="order_number" />
                    </div>
                    @error('order_number') <x-form-error> {{ $message }} </x-form-error> @enderror
                </x-form-label-inline>
                <x-form-label-inline text="Type" required="true" size="medium">
                    <div class="w-full">
                        <x-select wire:model.lazy="flag_type_form">
                            <option value="{{ \App\Models\Skill::FLAG_TYPE_DAY_TO_DAY }}">
                                Day-to-day Comfort
                            </option>
                            <option value="{{ \App\Models\Skill::FLAG_TYPE_EXPERIENCE }}">
                                Experienced-with
                            </option>
                        </x-select>
                    </div>
                    @error('flag_type') <x-form-error> {{ $message }} </x-form-error> @enderror
                </x-form-label-inline>

                <div class="text-center">
                    <x-button type="button" color="gray" wire:click="cancelEditSkill" wire:loading.attr="disabled" wire:loading.class="bg-opacity-50" wire:target="cancelEditSkill, submitEditSkill">
                        Cancel
                    </x-button>
                    <x-button type="button" color="ib-three" wire:click="submitEditSkill" wire:loading.attr="disabled" wire:loading.class="bg-opacity-50" wire:target="cancelEditSkill, submitEditSkill">
                        <span wire:loading.remove wire:target="submitEditSkill">
                            Save Data
                        </span>
                        <span wire:loading wire:target="submitEditSkill">
                            Saving...
                        </span>
                    </x-button>
                </div>
            </x-modal-body>
        </x-modal-content>
    </x-modal-backdrop>
    @endif


    <x-modal-backdrop x-show.transition.opacity="is_delete_modal_open === 1" x-cloak>
        <x-modal-content size="medium" x-show.transition.5000ms="is_delete_modal_open === 1" x-cloak>
            <x-modal-title>
                Delete
            </x-modal-title>
            <x-modal-body>

                @if (session('alert-delete-status') == 'red')
                    <x-alert color="{{ session('alert-delete-status') }}" title="{{ session('alert-delete-title') }}">
                        {{ session('alert-delete-body') }}
                    </x-alert>
                @endif

                <p class="text-center mb-6">
                    Are you sure to delete this skill?
                </p>

                <div class="text-center">
                    <x-button type="button" color="gray" wire:click="cancelDeleteSkill" wire:loading.attr="disabled" wire:loading.class="bg-opacity-50" wire:target="cancelDeleteSkill, submitDeleteSkill">
                        No, Close
                    </x-button>
                    <x-button type="button" color="red" wire:click="submitDeleteSkill" wire:loading.attr="disabled" wire:loading.class="bg-opacity-50" wire:target="cancelDeleteSkill, submitDeleteSkill">
                        <span wire:loading.remove wire:target="submitDeleteSkill">
                            Yes, Delete
                        </span>
                        <span wire:loading wire:target="submitDeleteSkill">
                            Deleting...
                        </span>
                    </x-button>
                </div>
            </x-modal-body>
        </x-modal-content>
    </x-modal-backdrop>

</div>
