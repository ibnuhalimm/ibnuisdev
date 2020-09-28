@extends('layouts.app')

@section('content')
<x-card-content>
    <x-card-title>
        <h2 class="text-lg">Section</h2>
    </x-card-title>

    @livewire('dashboard.section.table')

</x-card-content>
@endsection