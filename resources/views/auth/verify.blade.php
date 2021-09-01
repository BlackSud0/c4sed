@extends('layouts.app')

@section('content')
<div class="flex flex-col justify-center w-full">
    <div class="mx-auto">
        @if (session('resent'))
            <div class="max-w-2xl flex items-center justify-between p-4 mt-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif
        <div class="max-w-2xl px-4 py-3 mt-8 mb-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <p class="mb-4 text-gray-600 dark:text-gray-400">
            <strong>{{ __('Verify Your Email Address') }}</strong><br>

            <p class="text-gray-600 dark:text-gray-400">
            {{ __('A fresh verification link has been sent to your email address.') }}<br>
            {{ __('Before proceeding, please check your email for a verification link.') }}<br>
            {{ __('If you did not receive the email') }},
            </p>
        </div>

        <div>
            <form method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">{{ __('Click here to request another') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection
