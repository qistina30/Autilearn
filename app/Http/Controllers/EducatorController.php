<?php

namespace App\Http\Controllers;

use App\Models\Educator;
use App\Models\User;
use Illuminate\Http\Request;

class EducatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function create()
    {
        return view('educator.create');
    }

    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'contact_number' => 'required|string',
            'organization_name' => 'required|string|max:255',
        ]);

        // Generate default ID (ED12345 format)
        $lastUser = User::orderBy('id', 'desc')->first();  // Get the most recently created user based on 'id'
        $nextId = $lastUser ? $lastUser->id + 1 : 12345;  // Increment the last ID, or start from 12345 if no user exists
        $userId = 'ED' . str_pad($nextId, 5, '0', STR_PAD_LEFT);  // Generate ID, ensuring 5 digits

        // Create the user and store the generated userId
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'contact_number' => $request->contact_number,
            'organization_name' => $request->organization_name,
            'role' => 'educator',
            'user_id' => $userId,  // Save the generated ID in the 'user_id' column
        ]);

        // Redirect or return response
        return redirect()->route('educator.register')->with('success', 'User registered successfully. Your ID is: ' . $userId);
    }
    public function show(Educator $educator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Educator $educator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Educator $educator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Educator $educator)
    {
        //
    }
}
