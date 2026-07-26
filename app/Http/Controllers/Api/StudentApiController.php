<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentApiController extends Controller
{
    // Get All Students
    public function index()
    {
        $students = Student::with('course')->get();

        return response()->json([
            'status' => true,
            'message' => 'Students fetched successfully',
            'data' => StudentResource::collection($students)
        ], 200);
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
            'status' => true,
            'message' => 'Student Created Successfully',
            'data' => new StudentResource($student->load('course'))
        ], 201);
    }

    // Get Single Student
    public function show($id)
    {
        $student = Student::with('course')->find($id);

      if (!$student) {
    return response()->json([
        'status' => false,
        'message' => 'Student not found',
        'data' => null
    ], 404);
}

        return response()->json([
            'status' => true,
            'message' => 'Student fetched successfully',
            'data' => new StudentResource($student)
        ], 200);
    }

    // Update Student
    public function update(Request $request, $id)
    {
        $student = Student::find($id);

      if (!$student) {
    return response()->json([
        'status' => false,
        'message' => 'Student not found',
        'data' => null
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

        $student->load('course');

       return response()->json([
    'status' => true,
    'message' => 'Student Updated Successfully',
    'data' => new StudentResource($student)
], 200);
    }

    // Delete Student
    public function destroy($id)
    {
        $student = Student::find($id);

       if (!$student) {
    return response()->json([
        'status' => false,
        'message' => 'Student not found',
        'data' => null
    ], 404);
}

        $student->delete();

       return response()->json([
    'status' => true,
    'message' => 'Student Deleted Successfully'
], 200);
    }
}