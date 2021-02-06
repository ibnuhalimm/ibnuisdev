@extends('layouts.app')

@section('content')
<div class="w-full xl:w-4/5 xl:mx-auto">
    @livewire('dashboard.profile.data')
    @livewire('dashboard.profile.change-password')
</div>
@endsection