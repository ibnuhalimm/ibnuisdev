@extends('layouts.app')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
    @livewire('dashboard.blog.last-day-visitor')
    @livewire('dashboard.blog.last-month-visitor')
    <x-card-dashboard text="Total<br>Blog Posts" number="{{ str_thousand($total_post) }}" />
    <x-card-dashboard text="Total<br>Administrator" number="{{ $total_admin }}" />
</div>

<div class="mt-8">
    @livewire('dashboard.blog.most-visited-pages', ['days' => 7])
</div>
@endsection
