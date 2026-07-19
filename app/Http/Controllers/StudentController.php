<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
       $students = \App\Models\Student::with('courseRelation')->get();

     $courses = \App\Models\Course::all();

return view('students', compact('students', 'courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
    'name' => 'required',
    'email' => 'required|email|unique:students,email',
    'course_id' => 'required'
]);
        \App\Models\Student::create([
    'name' => $request->name,
    'email' => $request->email,
    'course_id' => $request->course_id,
    'age' => 0
]);

        return redirect('/students');
    }

    // 👇 Ye function yahan add karna hai
   public function edit($id)
{
    $student = \App\Models\Student::find($id);

    return view('edit', compact('student'));
}
public function update(Request $request, $id)
{
    $student = \App\Models\Student::find($id);

    $student->name = $request->name;
    $student->email = $request->email;
    $student->course = $request->course;

    $student->save();

    return redirect('/students');
}
public function destroy($id)
{
    $student = \App\Models\Student::find($id);

    $student->delete();

    return redirect('/students');
}
}