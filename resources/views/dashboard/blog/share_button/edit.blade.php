@extends('layouts.app')

@section('content')
<div class="w-full flex flex-col xl:flex-row items-start justify-between">

    @include('dashboard.__include.sidebar_blog')

    <div class="w-full xl:w-5/6">
        @livewire('dashboard.blog.share-button.edit', [ 'share_button' => $share_button ])
    </div>

</div>
@endsection