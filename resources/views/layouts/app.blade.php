<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Autilearn') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        /* Standard Navbar Styling */
        .navbar-custom {
            background-color: #f8f8ff; /* Light background */
            padding: 10px 15px; /* Reduce padding for standard size */
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            position: fixed; /* Fix navbar at the top */
            top: 0;
            left: 0;
            width: 100%; /* Full width */
            z-index: 1000; /* Ensure it stays above other elements */
        }


        .navbar-brand {
            font-size: 20px;
            font-weight: bold;
            color: #333;
            display: flex;
            align-items: center;
        }

        .navbar-brand img {
            height: 35px;
            margin-right: 8px;
        }

        .nav-link {
            font-size: 15px;
            color: #333;
            font-weight: 500;
        }

        .nav-link:hover {
            color: #007bff;
        }

        /* Aligning items */
        .navbar-nav {
            align-items: center;
        }

        /* Remove shape from login & register buttons */
        .nav-item a {
            font-weight: 500;
            color: #333;
            padding: 5px 10px;
        }

        .nav-item a:hover {
            color: #007bff;
        }
        body {
            padding-top: 70px; /* Adjust based on navbar height */
        }

    </style>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">

        <!-- Logo and System Name -->
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('image/logo.png') }}" alt="Logo">
            AutiLearn
        </a>

        <!-- Navbar Toggle Button (for mobile) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('educator.register') }}">Register</a>
                    </li>
                @endguest

                @auth
                    <li class="nav-item">
                        <span class="nav-link">Hi, {{ Auth::user()->name }} (ID: {{ Auth::user()->user_id }})</span>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<div id="app">
    <main class="py-4">
        @yield('content') <!-- Page content will be injected here -->
    </main>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
