@extends('layouts.app')

@section('content')
<div class="w-full flex flex-col xl:flex-row items-start justify-between">

    @include('dashboard.__include.sidebar_homepage_content')

    <div class="w-full xl:w-5/6">
        <x-card-content>
            <x-card-title>
                <h2 class="text-lg">Edit Portfolio</h2>
            </x-card-title>

            @if (session('alert-edit-status'))
                <x-alert color="{{ session('alert-edit-status') }}" title="{{ session('alert-edit-title') }}">
                    {{ session('alert-edit-body') }}
                </x-alert>
            @endif

            @livewire('dashboard.project.edit', [ 'project' => $project ])
        </x-card-content>
    </div>
</div>
@endsection