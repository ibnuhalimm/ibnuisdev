<div>
    <div class="w-full px-6 mb-3">
        <div class="flex flex-col xl:flex-row items-start xl:items-center justify-between">
            <div>
                <x-button-link-primary href="{{ route('dashboard.post.create') }}" color="ib-three">
                    <svg class="w-4 h-4 -ml-1 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    New Post
                </x-button-link-primary>
            </div>
            <div class="w-full mt-4 xl:mt-0 xl:w-1/3 flex flex-row items-start xl:items-center justify-end">
                <div class="w-1/3 mr-2">
                    <x-select wire:model.lazy="status">
                        <option value="">All</option>
                        <option value="1">Draft</option>
                        <option value="2">Publish</option>
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
                <x-th class="w-auto">Image</x-th>
                <x-th class="w-auto">Title</x-th>
                <x-th class="w-auto">Status</x-th>
                <x-th class="w-auto">Created At</x-th>
                <x-th class="pr-6 w-24">&nbsp;</x-th>
            </x-tr-head>
        </thead>
        <tbody>
            @if ($posts->isEmpty())
                <x-tr-body>
                    <x-td class="px-6" colspan="6">
                        Tidak ada data
                    </x-td>
                </x-tr-body>
            @else
                @foreach ($posts as $idx => $post)
                    <x-tr-body>
                        <x-td class="pl-6">
                            {{ $idx + $posts->firstItem() }}
                        </x-td>
                        <x-td>
                            <img src="{{ $post->gbr_url }}" alt="{{ $post->judul }}" class="w-10 h-auto">
                        </x-td>
                        <x-td>
                            {{ Str::of($post->judul)->limit(100) }}
                        </x-td>
                        <x-td>
                            {{ $post->str_status }}
                        </x-td>
                        <x-td>
                            {{ date('d.m.Y H:i', strtotime($post->created_at)) }}
                        </x-td>
                        <x-td class="pr-6 inline-flex">
                            <x-button-table href="{{ route('dashboard.post.edit', [ 'id' => $post->id ]) }}">
                                <svg class="h-5 w-5 mx-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </x-button-table>
                            <x-button-table href="{{ route('blog.post.read', [
                                                    'slug' => $post->slug,
                                                    'mode' => 'preview' ]) }}" target="_blank">
                                <svg class="h-5 w-5 mx-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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

    {{ $posts->links() }}

</div>
