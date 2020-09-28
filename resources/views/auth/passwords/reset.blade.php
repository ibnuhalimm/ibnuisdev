@extends('layouts.app')

@section('content')
<div class="w-full xl:w-2/3 xl:mx-auto">
    <form action="{{ route('password.update') }}" method="post">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="w-full bg-white shadow-md rounded-md mb-8">
            <div class="text-xl p-6 mb-3 flex items-center justify-start">
                <h2 class="text-lg">
                    Reset Password
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
                <x-form-label-inline text="Email" required="true">
                    <x-input-text type="email" name="email" value="{{ $email ?? old('email') }}" class="bg-gray-200 cursor-not-allowed" readonly required />
                </x-form-label-inline>
                <x-form-label-inline text="New Password" required="true">
                    <x-input-text type="password" name="password" required />
                </x-form-label-inline>
                <x-form-label-inline text="Confirm Password" required="true">
                    <x-input-text type="password" name="password_confirmation" required />
                </x-form-label-inline>
            </div>
            <div class="w-full px-6 text-center pb-10">
                <x-button type="submit" color="ib-three">
                    Reset Password
                </x-button>
            </div>
        </div>
    </form>
</div>
@endsection