@extends('layouts.app')

@section('content')
    <div class="container py-12">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">{{ __('Welcome to the Application') }}</div>

                    <div class="card-body text-center">
                        <p class="lead">{{ __('This is the welcome page of the application.') }}</p>

                        <p>
                            {{ __('Please log in or register to get started.') }}
                        </p>

                        <div class="mt-4">
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}" class="btn btn-primary">{{ __('Login') }}</a>
                            @endif

                            <a href="{{ route('educator.register') }}" class="btn btn-secondary ms-2">{{ __('Register as Educator') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
