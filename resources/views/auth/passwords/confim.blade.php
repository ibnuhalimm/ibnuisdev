@extends('layouts.app')

@section('content')
<div class="w-full xl:w-2/3 xl:mx-auto">
    <form action="{{ route('password.confirm') }}" method="post">
        @csrf
    <div class="w-full bg-white shadow-md rounded-md mb-8">
        <div class="text-xl p-6 mb-3 flex items-center justify-start">
            <h2 class="text-lg">
                Confirm Your Password
            </h2>
        </div>

        @if ($errors->any())
            <div class="w-full xl:w-2/3 xl:mx-auto px-6 mb-6">
                <x-alert color="red" title="Error">
                    {{ $errors->first() }}
                </x-alert>
            </div>
        @endif

        <div class="w-full px-6 mb-6">
            <p>Before continue, please enter your password first.</p>
        </div>
        <div class="w-full px-6 mb-6">
            <x-form-label-inline text="Email" required="true">
                <x-input-text type="email" name="email" required />
            </x-form-label-inline>
        </div>
        <div class="w-full px-6 text-center pb-10">
            <x-button type="submit" color="ib-three">
                Confirm
            </x-button>

            @if (Route::has('password.request'))
                <x-button-link href="{{ route('password.request') }}" color="ib-three">
                    Forgot Password ?
                </x-button-link>
            @endif
        </div>
    </div>
    </form>
</div>
@endsection