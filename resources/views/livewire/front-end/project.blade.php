<div>
    <div class="grid grid-cols-2 xl:grid-cols-4 gap-0 xl:gap-2">
        @foreach ($projects as $project)
            @livewire('front-end.project.item', [ 'project' => $project, 'page' => $page ])
        @endforeach
    </div>
    @if ($projects->hasMorePages())
        @livewire('front-end.project.load-more-button', [ 'page' => $page, 'perPage' => $perPage ])
    @endif
</div>