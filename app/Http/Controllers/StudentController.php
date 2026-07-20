<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('courseRelation')->get();
        $courses = Course::all();

        return view('students', compact('students', 'courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email',
            'course_id' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->store('students', 'public');
        }

        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'course_id' => $request->course_id,
            'age' => 0,
            'image' => $imageName,
        ]);

        return redirect('/students');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);

        return view('edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        return redirect('/students');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect('/students');
    }
}