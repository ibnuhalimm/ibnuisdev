@extends('layouts.app')

@section('content')
<x-card-content>
    <x-card-title>
        <h2 class="text-lg">Projects / Portfolio List</h2>
    </x-card-title>

    @livewire('dashboard.project.table')

</x-card-content>
@endsection