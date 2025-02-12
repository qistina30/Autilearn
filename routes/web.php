<?php


use App\Http\Controllers\EducatorController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome'); // This view should exist in resources/views/welcome.blade.php
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


// Show registration form for educators
Route::get('/educator/register', [EducatorController::class, 'create'])->name('educator.register');

// Handle registration submission
Route::post('/educator/register', [EducatorController::class, 'store'])->name('educator.store');


    Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
    Route::post('/student/store', [StudentController::class, 'store'])->name('student.store');
Route::get('/student/learning_module', [StudentController::class, 'learningModule1'])->name('student.learning_module');
