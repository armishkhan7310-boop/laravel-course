<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authentication Routes
require __DIR__.'/auth.php';

// ==============================
// Admin Routes
// ==============================

Route::get('/admin/dashboard', [AdminController::class, 'index'])
    ->middleware(['auth', 'admin'])
    ->name('admin.dashboard');

// Permission Test Route
Route::get('/students/delete-test', function () {
    return "You can delete students";
})->middleware(['auth', 'permission:delete_students']);

// ==============================
// Student Management Routes
// ==============================

// Students List
Route::get('/students', [StudentController::class, 'index'])->name('students.index');

// Add Student
Route::post('/students', [StudentController::class, 'store'])->name('students.store');

// Edit Student Form
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');

// Update Student
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');

// Delete Student
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');