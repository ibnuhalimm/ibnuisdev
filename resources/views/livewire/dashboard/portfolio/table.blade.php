<div x-data="{
    is_delete_modal_open: {{ $is_delete_modal_open }}
}">
    <div class="w-full px-6 mb-3">
        @if (session('alert-delete-status') == 'green')
            <x-alert color="{{ session('alert-delete-status') }}" title="{{ session('alert-delete-title') }}">
                {{ session('alert-delete-body') }}
            </x-alert>
        @endif

        <div class="flex flex-col xl:flex-row items-start xl:items-center justify-between">
            <div>
                <x-button-link-primary href="{{ route('dashboard.portfolio.create') }}" color="ib-three">
                    <svg class="w-4 h-4 -ml-1 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    NEW PROJECT
                </x-button-link-primary>
            </div>
            <div class="w-full mt-4 xl:mt-0 xl:w-1/3 flex flex-row items-start xl:items-center justify-end">
                <div class="w-1/3 mr-2">
                    <x-select wire:model.lazy="status">
                        <option value="">All</option>
                        <option value="{{ \App\Project::STATUS_DRAFT }}">Draft</option>
                        <option value="{{ \App\Project::STATUS_PUBLISH }}">Publish</option>
                    </x-select>
                </div>
                <div class="w-2/3 ml-2">
                    <x-input-text type="text" placeholder="Search" wire:model.debounce.500ms="search" />
                </div>
            </div>
        </div>
    </div>

    <x-table>
        <thead>
            <x-tr-head>
                <x-th class="pl-6 w-20">No</x-th>
                <x-th class="w-auto">Lang</x-th>
                <x-th class="w-auto">Month/Year</x-th>
                <x-th class="w-auto">Name</x-th>
                <x-th class="w-auto">Image</x-th>
                <x-th class="w-auto">Status</x-th>
                <x-th class="pr-6 w-24">&nbsp;</x-th>
            </x-tr-head>
        </thead>
        <tbody>
            @if ($projects->isEmpty())
                <x-tr-body>
                    <x-td class="px-6" colspan="7">
                        No data available
                    </x-td>
                </x-tr-body>
            @else
                @foreach ($projects as $idx => $project)
                    <x-tr-body>
                        <x-td class="pl-6">
                            {{ $idx + $projects->firstItem() }}
                        </x-td>
                        <x-td>
                            {{ strtoupper($project->lang) }}
                        </x-td>
                        <x-td>
                            {{ strftime('%B %Y', strtotime($project->year . '-' . $project->month . '-01')) }}
                        </x-td>
                        <x-td>
                            {{ $project->name }}
                        </x-td>
                        <x-td>
                            <img src="{{ $project->image_url }}" alt="{{ $project->name }}" class="h-10 w-auto">
                        </x-td>
                        <x-td>
                            {{ ucfirst($project->status) }}
                        </x-td>
                        <x-td class="pr-6 inline-flex">
                            <x-button-table href="#" onclick="return false;" title="Copy" wire:click="copyItem({{ $project->id }})">
                                <svg class="w-5 h-auto mx-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                </svg>
                            </x-button-table>
                            <x-button-table href="{{ route('dashboard.portfolio.edit', [ 'id' => $project->id ]) }}" title="Edit">
                                <svg class="h-5 w-auto mx-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </x-button-table>
                            <x-button-table href="javascript:;" wire:click="deleteProject({{ $project->id }})" title="Delete">
                                <svg class="h-5 w-auto mx-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </x-button-table>
                        </x-td>
                    </x-tr-body>
                @endforeach
            @endif
        </tbody>
    </x-table>

    {!! $projects->links() !!}

    <x-modal-backdrop x-show.transition.opacity="is_delete_modal_open === 1" x-cloak>
        <x-modal-content size="small" x-show.transition.5000ms="is_delete_modal_open === 1" x-cloak>
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
                    Are you sure to delete this project?
                </p>

                <div class="text-center">
                    <x-button type="button" color="gray" wire:click="cancelDeleteProject" wire:loading.attr="disabled" wire:loading.class="bg-opacity-50" wire:target="cancelDeleteProject, submitDeleteProject">
                        No, Close
                    </x-button>
                    <x-button type="button" color="red" wire:click="submitDeleteProject" wire:loading.attr="disabled" wire:loading.class="bg-opacity-50" wire:target="cancelDeleteProject, submitDeleteProject">
                        <span wire:loading.remove wire:target="submitDeleteProject">
                            Yes, Delete
                        </span>
                        <span wire:loading wire:target="submitDeleteProject">
                            Deleting...
                        </span>
                    </x-button>
                </div>
            </x-modal-body>
        </x-modal-content>
    </x-modal-backdrop>

</div>
