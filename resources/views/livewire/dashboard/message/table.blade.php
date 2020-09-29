<div x-data="{
    is_view_modal_open: {{ $is_view_modal_open }}
}">
    <div class="w-full px-6">
        @if (session('alert-status'))
            <x-alert color="{{ session('alert-status') }}" title="{{ session('alert-title') }}">
                {{ session('alert-body') }}
            </x-alert>
        @endif
    </div>

    <x-table>
        <thead>
            <x-tr-head>
                <x-th class="pl-6 w-20">No</x-th>
                <x-th class="w-auto">Name</x-th>
                <x-th class="w-auto">Email</x-th>
                <x-th class="w-auto">Message</x-th>
                <x-th class="w-auto">DateTime</x-th>
                <x-th class="w-auto">&nbsp;</x-th>
                <x-th class="pr-6 w-24">&nbsp;</x-th>
            </x-tr-head>
        </thead>
        <tbody>
            @if ($messages->isEmpty())
                <x-tr-body>
                    <x-td class="px-6" colspan="4">
                        Not data available
                    </x-td>
                </x-tr-body>
            @else
                @php
                    $no = 1;
                @endphp
                @foreach ($messages as $message)
                    <x-tr-body>
                        <x-td class="pl-6">
                            {{ $no++ }}
                        </x-td>
                        <x-td>
                            {{ $message->name }}
                        </x-td>
                        <x-td>
                            <a href="mailto:{{ $message->email }}" class="text-ib-three">
                                {{ $message->email }}
                            </a>
                        </x-td>
                        <x-td>
                            {{ Str::of($message->message)->limit(50, '...') }}
                        </x-td>
                        <x-td>
                            {{ strftime('%e %b %Y %H:%M', strtotime($message->created_at)) }}
                        </x-td>
                        <x-td>
                            <x-badge-label color="{{ $message->str_replied_color }}">
                                {{ $message->str_replied }}
                            </x-badge-label>
                        </x-td>
                        <x-td class="pr-6 inline-flex">

                            @if ($message->is_replied == true)
                                <x-button-table href="javascript:;" wire:click="markAsUnReplyMessage({{ $message->id }})" title="Mark as replied">
                                    <svg class="h-5 w-5 mx-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </x-button-table>
                            @else
                                <x-button-table href="javascript:;" wire:click="markAsRepliedMessage({{ $message->id }})" title="Mark as replied">
                                    <svg class="h-5 w-5 mx-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </x-button-table>
                            @endif

                            <x-button-table href="javascript:;" wire:click="viewMessage({{ $message->id }})" title="Mark as replied">
                                <svg class="h-5 w-5 mx-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </x-button-table>
                        </x-td>
                    </x-tr-body>
                @endforeach
            @endif
        </tbody>
    </x-table>

    {!! $messages->links() !!}

    <x-modal-backdrop x-show.transition.opacity="is_view_modal_open === 1" x-cloak>
        <x-modal-content size="small" x-show.transition.5000ms="is_view_modal_open === 1" x-cloak>
            <x-modal-title>
                View Message
            </x-modal-title>
            <x-modal-body>

                <div class="mb-4">
                    <h4 class="font-bold">
                        Name
                    </h4>
                    <p class="mt-1">{{ $name }}</p>
                </div>
                <div class="mb-4">
                    <h4 class="font-bold">
                        Email
                    </h4>
                    <p class="mt-1">{{ $name }}</p>
                </div>
                <div class="mb-4">
                    <h4 class="font-bold">
                        Datetime
                    </h4>
                    <p class="mt-1">{{ $datetime }}</p>
                </div>
                <div class="mb-4">
                    <h4 class="font-bold">
                        Message
                    </h4>
                    <p class="mt-1">{!! nl2br($body) !!}</p>
                </div>

                <div class="text-center">
                    <x-button type="button" color="ib-three" wire:click="closeViewModal" wire:loading.attr="disabled" wire:loading.class="bg-opacity-50" wire:target="closeViewModal">
                        Close
                    </x-button>
                </div>
            </x-modal-body>
        </x-modal-content>
    </x-modal-backdrop>

</div>
