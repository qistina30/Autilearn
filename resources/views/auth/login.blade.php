@extends('layouts.app')

@section('content')

    <style>
        /* Prevent Scrolling */
        html, body {
            overflow: hidden;
            height: 100%;
        }

        /* Background Styling */
        body {
            background: linear-gradient(to bottom, #a1c4fd, #c2e9fb);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Main Container */
        .container-custom {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            width: 100%;

        }

        /* Logo and System Name */
        .logo-container img {
            height: 70px;
        }

        /* Tagline Styling */
        .tagline {
            font-size: 22px;
            font-weight: bold;
            color: #333;
            margin-top: 15px;
        }

        /* Form Styling */
        .form-container {
            margin-top: 30px;
        }

        .form-label {
            text-align: left;
        }

        .btn-custom {
            background: #007bff;
            color: white;
            font-size: 18px;
            font-weight: bold;
            padding: 12px 25px;
            border-radius: 30px;
            width: 100%;
            text-decoration: none;
            margin-top: 20px;
        }

        /* Remember Me */
        .form-check-label {
            font-size: 14px;
            color: #777;
        }

        /* Forgot Password Link */
        .forgot-password {
            font-size: 14px;
            color: #007bff;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        /* Register Link */
        .register-link {
            font-size: 14px;
            color: #007bff;
        }

        .register-link:hover {
            text-decoration: underline;
        }
    </style>

    <div class="container">
        <div class="container-custom">
            <!-- Logo and System Name -->
            <div class="logo-container text-center">
                <img src="{{ asset('image/logo.png') }}" alt="System Logo">
            </div>

            <!-- Tagline -->
            <h4 class="tagline text-center">Welcome Back!</h4>
            <p class="welcome-message text-center">Please log in to continue your journey with us.</p>


            <!-- Login Form -->
            <div class="form-container">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- User ID -->
                    <div class="mb-3">
                        <label for="user_id" class="form-label">User ID</label>
                        <input id="user_id" type="text" class="form-control" name="user_id" required autofocus>
                        @if ($errors->has('user_id'))
                            <div class="text-danger mt-2">{{ $errors->first('user_id') }}</div>
                        @endif
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                        @if ($errors->has('password'))
                            <div class="text-danger mt-2">{{ $errors->first('password') }}</div>
                        @endif
                    </div>

                    <!-- Remember Me -->
                    <div class="form-check mb-3">
                        <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                        <label for="remember_me" class="form-check-label text-muted">Remember me</label>
                    </div>

                    <!-- Forgot Password Link and Submit Button -->
                    <div class="d-flex justify-content-between align-items-center">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="forgot-password">Forgot your password?</a>
                        @endif

                        <button type="submit" class="btn btn-custom">
                            Log in
                        </button>
                    </div>
                </form>

                <!-- Register Link -->
                <div class="mt-3">
                    <p class="text-center">
                        New Educator? <a href="{{ route('educator.register') }}" class="register-link">Register</a>
                    </p>
                </div>
            </div>

        </div>
    </div>

@endsection
