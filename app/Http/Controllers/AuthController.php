<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login request
    public function login(Request $request)
    {
        $request->validate([
            'user_id' => 'required|string',
            'password' => 'required',
        ]);

        // Attempt to log in using user_id and password
        $credentials = [
            'user_id' => $request->user_id,  // Use 'user_id' instead of 'id'
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'user_id' => 'Invalid credentials provided.',  // Update error message for user_id
        ]);
    }

    // Logout user
    public function logout(Request $request)
    {
        Auth::logout(); // Log out the current user
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate the CSRF token

        return redirect()->route('welcome'); // Redirect to the login page or any other route
    }
}
