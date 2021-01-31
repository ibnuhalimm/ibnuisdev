@extends('layouts.app')

@section('content')
<div class="w-full flex flex-col xl:flex-row items-start justify-between">

    @include('dashboard.__include.sidebar_blog')

    <div class="w-full xl:w-5/6">
        <x-card-content>
            <x-card-title>
                <h2 class="text-lg">Posts</h2>
            </x-card-title>

            @livewire('dashboard.blog.post.table')
        </x-card-content>
    </div>
</div>
@endsection