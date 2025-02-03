<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create'); // Create a view for adding students
    }

    public function store(Request $request)
    {
        // Validate the form input
        $request->validate([
            'full_name' => 'required|string|max:255',
            'age' => 'required|integer|min:3|max:100',
            'address' => 'required|string|max:500',
            'parent_name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:15',
        ]);

        // Get the currently authenticated user
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->withErrors(['error' => 'Please log in to add a student.']);
        }

        // Retrieve the educator's user_id
        $educatorUserId = $user->user_id;

        // Log the data to the log file
        \Log::info([
            'full_name' => $request->full_name,
            'educator_user_id' => $educatorUserId,
        ]);

        // Create a new student record with the educator's user_id
        Student::create([
            'full_name' => $request->full_name,
            'age' => $request->age,
            'address' => $request->address,
            'parent_name' => $request->parent_name,
            'contact_number' => $request->contact_number,
            'educator_user_id' => $educatorUserId, // Store educator's user_id here
        ]);

        return redirect()->route('student.create')->with('success', 'Student added successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
