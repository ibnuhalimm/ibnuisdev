@extends('layouts.app')

@section('content')
<div class="w-full flex flex-col xl:flex-row items-start justify-between">

    @include('dashboard.__include.sidebar_homepage_content')

    <div class="w-full xl:w-5/6">
        <x-card-content>
            <x-card-title>
                <h2 class="text-lg">New Portfolio</h2>
            </x-card-title>

            @if (session('alert-create-status'))
                <x-alert color="{{ session('alert-create-status') }}" title="{{ session('alert-create-title') }}">
                    {{ session('alert-create-body') }}
                </x-alert>
            @endif

            @livewire('dashboard.portfolio.create')
        </x-card-content>
    </div>
</div>
@endsection