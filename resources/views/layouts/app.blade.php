<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS (If Needed) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <!-- Logo on the left -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('image/logo.png') }}" alt="Logo" style="width: 50px; height: auto;">
            </a>

            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home</button>
            <a href="{{ route('student.create') }}" class="nav-link" id="nav-profile-tab" role="tab">
                Add New Student
            </a>
            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">##</button>
            <button class="nav-link" id="nav-disabled-tab" data-bs-toggle="tab" data-bs-target="#nav-disabled" type="button" role="tab" aria-controls="nav-disabled" aria-selected="false" disabled>##</button>

            <!-- Right-aligned login, register, and user info -->
            <div class="ms-auto d-flex align-items-center">
                @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-primary ms-2">Login</a>
                    <a href="{{ route('educator.register') }}" class="btn btn-outline-secondary ms-2">Register</a>
                @endguest

                @auth
                    <!-- Show the logged-in user's name and user ID -->
                    <span class="me-3">Hi, {{ Auth::user()->name }} (ID: {{ Auth::user()->user_id }})!</span>

                        <!-- Logout Button -->
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger ms-2">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

</head>

<body>

<div id="app">

    <main class="py-4">
        @yield('content') <!-- This will inject content from child pages -->
    </main>
</div>

<!-- Bootstrap JS (If Needed) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
