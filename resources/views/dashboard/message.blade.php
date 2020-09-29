@extends('layouts.app')

@section('content')
<x-card-content>
    <x-card-title>
        <h2 class="text-lg">Messages</h2>
    </x-card-title>

    @livewire('dashboard.message.table')

</x-card-content>
@endsection