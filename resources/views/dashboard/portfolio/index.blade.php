@extends('layouts.app')

@section('content')
<div class="w-full flex flex-col xl:flex-row items-start justify-between">

    @include('dashboard.__include.sidebar_homepage_content')

    <div class="w-full xl:w-5/6">
        <x-card-content>
            <x-card-title>
                <h2 class="text-lg">Portfolio</h2>
            </x-card-title>

            @livewire('dashboard.portfolio.table')
        </x-card-content>
    </div>
</div>
@endsection