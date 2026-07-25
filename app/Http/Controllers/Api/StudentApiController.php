<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentApiController extends Controller
{
    // Get All Students
    public function index()
    {
        return response()->json([
            'students' => Student::all()
        ]);
    }


    // Create Student
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email',
            'course_id' => 'required|exists:courses,id',
        ]);


        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'course_id' => $request->course_id,
            'age' => 0,
        ]);


        return response()->json([
            'message' => 'Student Created Successfully',
            'data' => $student,
        ], 201);
    }



    // Get Single Student
    public function show($id)
    {
        $student = Student::find($id);


        if (!$student) {
            return response()->json([
                'message' => 'Student not found'
            ], 404);
        }


        return response()->json([
            'data' => $student
        ]);
    }



    // Update Student
    public function update(Request $request, $id)
    {
        $student = Student::find($id);


        if (!$student) {
            return response()->json([
                'message' => 'Student not found'
            ], 404);
        }


        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email,' . $id,
            'course_id' => 'required|exists:courses,id',
        ]);


        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'course_id' => $request->course_id,
        ]);


        return response()->json([
            'message' => 'Student Updated Successfully',
            'data' => $student
        ]);
    }




    // Delete Student
    public function destroy($id)
    {
        $student = Student::find($id);


        if (!$student) {
            return response()->json([
                'message' => 'Student not found'
            ], 404);
        }


        $student->delete();


        return response()->json([
            'message' => 'Student Deleted Successfully'
        ]);
    }
}