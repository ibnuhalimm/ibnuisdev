@extends('layouts.app')

@section('content')
<x-card-content>
    <x-card-title>
        <h2 class="text-lg">Skills</h2>
    </x-card-title>

    @livewire('dashboard.skills.table')

</x-card-content>
@endsection