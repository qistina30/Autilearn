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
            padding: 50px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            max-width: 800px;
            text-align: center;
        }

        /* Logo and System Name */
        .logo-container {
            display: flex;
            align-items: center;
            justify-content: center;
        }

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

        /* Welcome Message */
        .welcome-message {
            font-size: 16px;
            color: #555;
            margin-top: 10px;
        }

        /* Get Started Button */
        .btn-custom {
            background:blue;
            color: white;
            font-size: 18px;
            font-weight: bold;
            padding: 12px 25px;
            border-radius: 30px;
            text-decoration: none;
        }

        /* Feature Section */
        .features {
            display: flex;
            justify-content: space-around;
            margin-top: 30px;
        }

        .feature-card {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            background: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            margin: 10px;
        }

        .feature-card i {
            font-size: 35px;
            margin-bottom: 8px;
        }

        .icon-1 { color: #ff6b6b; }
        .icon-2 { color: #1dd1a1; }
        .icon-3 { color: #ff9f43; }

    </style>

    <div class="container">
        <div class="container-custom text-center">

            <!-- Logo and System Name -->
            <div class="logo-container">
                <img src="{{ asset('image/logo.png') }}" alt="AutiLearn Logo">
            </div>

            <!-- Tagline and Welcome Message -->
            <h4 class="tagline">Empowering Every Child to Learn</h4>
            <p class="welcome-message">A personalized learning journey designed for children to explore, learn, and succeed.</p>

            <!-- Get Started Button -->
            <div class="mt-4">
                <a href="{{ route('login') }}" class="btn btn-custom">Get Started</a>
            </div>

            <!-- Features Section -->
            <div class="features">
                <div class="feature-card">
                    <i class="fas fa-eye icon-1"></i>
                    <span>Visual Learning</span>
                </div>
                <div class="feature-card">
                    <i class="fas fa-chart-line icon-2"></i>
                    <span>Progress Tracking</span>
                </div>
                <div class="feature-card">
                    <i class="fas fa-book-open icon-3"></i>
                    <span>Step-by-Step Guidance</span>
                </div>
            </div>

        </div>
    </div>

@endsection
