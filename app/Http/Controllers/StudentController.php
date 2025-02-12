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
    // Validate the form input, including uniqueness of IC/MyKid number
    $request->validate([
        'full_name' => 'required|string|max:255',
        'ic_number' => 'required|string|max:20|unique:students,ic_number', // Ensure IC number is unique
        'age' => 'required|integer|min:3|max:100',
        'address' => 'required|string|max:500',
        'parent_name' => 'required|string|max:255',
        'contact_number' => 'required|string|max:15'], [
        'ic_number.unique' => 'Student already exists', // Custom error message for IC number
    ]);


    // Get the currently authenticated educator's user_id
    $educatorUserId = Auth::user()->user_id; // Ensure 'user_id' is being retrieved properly

    // Create a new student record
    Student::create([
        'full_name' => $request->full_name,
        'ic_number' => $request->ic_number, // Save the IC/MyKid number
        'age' => $request->age,
        'address' => $request->address,
        'parent_name' => $request->parent_name,
        'contact_number' => $request->contact_number,
        'educator_user_id' => $educatorUserId, // Store educator's user_id
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

    public function learningModule1()
    {
        // Return the view for Learning Module 1
        return view('student.learning_module');  // This view will contain your learning activity logic
    }

}
