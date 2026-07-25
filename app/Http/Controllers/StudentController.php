<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
  public function index(Request $request)
{
    $search = $request->search;

    $students = Student::with('courseRelation')
        ->where('name', 'like', "%$search%")
        ->orWhere('email', 'like', "%$search%")
        ->paginate(5);

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

  public function edit(Student $student)
{
    $courses = Course::all();

    return view('edit', compact('student','courses'));
}

   public function update(Request $request, Student $student)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'course_id' => 'required',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);


    $imageName = $student->image;


    if ($request->hasFile('image')) {


        if ($student->image) {
            Storage::disk('public')->delete($student->image);
        }


        $imageName = $request->file('image')->store('students', 'public');

    }


    $student->update([

        'name' => $request->name,
        'email' => $request->email,
        'course_id' => $request->course_id,
        'image' => $imageName,

    ]);


    return redirect('/students');
}

  public function destroy(Student $student)
{
    $student->delete();

    return redirect('/students');
}
}