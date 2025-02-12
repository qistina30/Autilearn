@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Add New Student</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('student.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="full_name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="full_name" name="full_name" required>
            </div>

            <div class="mb-3">
                <label for="ic_number" class="form-label">IC/MyKid Number</label>
                <input type="text" class="form-control" id="ic_number" name="ic_number" required>
            </div>


            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age" required min="3" max="100">
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="parent_name" class="form-label">Parent's Name</label>
                <input type="text" class="form-control" id="parent_name" name="parent_name" required>
            </div>

            <div class="mb-3">
                <label for="contact_number" class="form-label">Contact Number</label>
                <input type="text" class="form-control" id="contact_number" name="contact_number" required>
            </div>

            <button type="submit" class="btn btn-primary">Add Student</button>
        </form>
    </div>
@endsection

