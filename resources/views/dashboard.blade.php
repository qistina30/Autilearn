@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Dashboard') }}
                    </h2>
                    <div class="mt-4">
                        <p>{{ __("You're logged in!") }}</p>
                        @auth
                            <!-- Show the logged-in user's name and user ID -->
                            <span class="me-3">Hi, {{ Auth::user()->name }} (ID: {{ Auth::user()->user_id }})!</span>
                        @else
                            <!-- Show message when the user is not authenticated -->
                            <span>Please log in to see your details.</span>
                        @endauth
{{--                        <a href="{{ route('student.create') }}" class="btn btn-secondary ms-2">{{ __('Add Student') }}</a>--}}
                        <a href="{{ route('student.create') }}" class="btn btn-outline-primary ms-2">Add Student</a>
                        <a href="{{ route('educator.register') }}" class="btn btn-outline-secondary ms-2">Register</a>
                        <!-- Link to Learning Module 1 -->
                        <a href="{{ route('student.learning_module') }}" class="btn btn-outline-primary ms-2">Start Learning Module 1</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
