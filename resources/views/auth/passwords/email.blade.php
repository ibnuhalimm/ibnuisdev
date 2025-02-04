@extends('layouts.app')

@section('content')
<div class="w-full xl:w-2/3 xl:mx-auto">
    <form action="{{ route('password.email') }}" method="post">
        @csrf
    <div class="w-full bg-white shadow-md rounded-md mb-8">
        <div class="text-xl p-6 mb-3 flex items-center justify-start">
            <h2 class="text-lg">
                Reset Password
            </h2>
        </div>

        @if (session('status'))
            <div class="w-full xl:w-2/3 xl:mx-auto px-6 mb-6">
                <x-alert color="green" title="Success">
                    {{ session('status') }}
                </x-alert>
            </div>
        @endif

        @if ($errors->any())
            <div class="w-full xl:w-2/3 xl:mx-auto px-6 mb-6">
                <x-alert color="red" title="Error">
                    {{ $errors->first() }}
                </x-alert>
            </div>
        @endif

        <div class="w-full px-6 mb-6">
            <x-form-label-inline text="Email" required="true">
                <x-input-text type="email" name="email" required />
            </x-form-label-inline>
        </div>
        <div class="w-full px-6 text-center pb-10">
            <x-button type="submit" color="ib-three">
                Send Reset Link
            </x-button>
            <x-button-link href="{{ route('login') }}" color="ib-three">
                Back to Login
            </x-button-link>
        </div>
    </div>
    </form>
</div>
@endsection