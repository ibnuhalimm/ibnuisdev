<div class="w-full px-6 mb-6 pb-8">
    @if (session('alert-create-status'))
        <x-alert color="{{ session('alert-create-status') }}" title="{{ session('alert-create-title') }}">
            {{ session('alert-create-body') }}
        </x-alert>
    @endif

    <x-form-label-inline text="Month / Year" required="true" size="large">
        <div class="w-full lg:w-1/2 flex items-center justify-between">
            <div class="w-2/3 mr-2">
                <x-select wire:model.lazy="month">
                    @for ($m = 1; $m <= 12; $m++)
                        @php
                            if ($m < 10) {
                                $m = '0' . $m;
                            }
                        @endphp
                        <option value="{{ $m }}">
                            {{ strftime('%B', strtotime('2020-' . $m . '-01')) }}
                        </option>
                    @endfor
                </x-select>
            </div>
            <div class="w-1/3 ml-2">
                <x-input-text type="number" wire:model.lazy="year" />
            </div>
        </div>
        @error('month') <x-form-error> {{ $message }} </x-form-error> @enderror
        @error('year') <x-form-error> {{ $message }} </x-form-error> @enderror
    </x-form-label-inline>
    <x-form-label-inline text="Name" required="true" size="large">
        <div class="w-full lg:w-2/3">
            <x-input-text type="text" wire:model.lazy="name" />
            @error('name') <x-form-error> {{ $message }} </x-form-error> @enderror
        </div>
    </x-form-label-inline>
    <x-form-label-inline text="Image" required="true" size="large">
        <div class="w-1/2">
            <img src="{{ $image_url }}" alt="Image" class="w-full h-56 border border-solid border-gray-400 rounded-md">
            <div class="mt-1">
                <small class="text-blue-500">Recommended : 600 x 400px</small>
            </div>
            <div class="mt-2">
                <x-input-text type="file" wire:model="image" />
            </div>
        </div>
        @error('image') <x-form-error> {{ $message }} </x-form-error> @enderror
    </x-form-label-inline>
    <x-form-label-inline text="Description" required="true" size="large">
        <div class="w-full lg:w-2/3">
            <x-textarea wire:model.lazy="description" rows="10"></x-textarea>
            @error('description') <x-form-error> {{ $message }} </x-form-error> @enderror
        </div>
    </x-form-label-inline>
    <x-form-label-inline text="URL / Link" required="false" size="large">
        <div class="w-full lg:w-2/3">
            <x-input-text type="text" wire:model.lazy="link" />
            @error('link') <x-form-error> {{ $message }} </x-form-error> @enderror
        </div>
    </x-form-label-inline>
    <x-form-label-inline text="Status" required="true" size="large">
        <div class="w-full lg:w-1/2 flex items-center justify-between">
            <div class="w-2/3 mr-4">
                <x-select wire:model.lazy="status">
                    <option value="{{ \App\Project::STATUS_DRAFT }}">Draft</option>
                    <option value="{{ \App\Project::STATUS_PUBLISH }}">Publish</option>
                </x-select>
            </div>
        </div>
    </x-form-label-inline>

    <div class="w-full px-6 text-center">
        <x-button-link-primary href="{{ route('dashboard.project.index') }}" color="gray-500" wire:loading.class="bg-opacity-50" wire:target="submitUpdateProject">
            Cancel
        </x-button-link-primary>
        <x-button type="button" color="ib-three" wire:loading.attr="disabled" wire:loading.class="bg-opacity-50" wire:target="submitUpdateProject" wire:click="submitUpdateProject">
            <span wire:loading.remove wire:target="submitUpdateProject">
                Update Data
            </span>
            <span wire:loading>
                Updating...
            </span>
        </x-button>
    </div>
</div>