@extends('layouts.app')

@section('content')
<x-card-content>
    <x-card-title>
        <h2 class="text-lg">Add New Project</h2>
    </x-card-title>

    @if (session('alert-create-status'))
        <x-alert color="{{ session('alert-create-status') }}" title="{{ session('alert-create-title') }}">
            {{ session('alert-create-body') }}
        </x-alert>
    @endif

    @livewire('dashboard.project.create')
</x-card-content>
@endsection