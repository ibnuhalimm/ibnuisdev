@extends('layouts.app')

@section('content')
<x-card-content>
    <x-card-title>
        <h2 class="text-lg">Edit Project</h2>
    </x-card-title>

    @if (session('alert-edit-status'))
        <x-alert color="{{ session('alert-edit-status') }}" title="{{ session('alert-edit-title') }}">
            {{ session('alert-edit-body') }}
        </x-alert>
    @endif

    @livewire('dashboard.project.edit', [ 'project' => $project ])
</x-card-content>
@endsection