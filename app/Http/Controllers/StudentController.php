<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    
   public function index()
{
    $students = \App\Models\Student::all();

    return view('students', compact('students'));
}

    public function store(Request $request)
    
    {$request->validate([
    'name' => 'required',
    'email' => 'required|email|unique:students,email',
    'course' => 'required'
]);
        \App\Models\Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'course' => $request->course,
            'age' => 0
        ]);

        return redirect('/students');
    }
}