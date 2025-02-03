@extends('layouts.app')

@section('content')
    <!-- Session Status -->
    @if (session('status'))
        <div class="alert alert-success mb-4">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- User ID -->
        <div>
            <label for="user_id" class="form-label">{{ __('User ID') }}</label>
            <input id="user_id" type="text" class="form-control" name="user_id" required autofocus>
            @if ($errors->has('user_id'))
                <div class="text-danger mt-2">{{ $errors->first('user_id') }}</div>
            @endif
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
            @if ($errors->has('password'))
                <div class="text-danger mt-2">{{ $errors->first('password') }}</div>
            @endif
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <button type="submit" class="btn btn-primary ms-3">
                {{ __('Log in') }}
            </button>
        </div>
    </form>
@endsection
