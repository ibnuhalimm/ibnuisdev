@extends('layouts.app')

@section('content')
<div class="w-full flex flex-col xl:flex-row items-start justify-between">

    @include('dashboard.__include.sidebar_homepage_content')

    <div class="w-full xl:w-5/6">
        <x-card-content>
            <x-card-title>
                <a href="{{ route('dashboard.portfolio.index') }}" class="mr-4 hover:text-ib-three">
                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
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