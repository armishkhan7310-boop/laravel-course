@extends('layouts.app')

@section('content')

<x-message />

<h2>Student Registration Form</h2>

<form action="/students" method="POST" enctype="multipart/form-data" class="card p-4 shadow">

    @csrf

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mb-3">
        <label>Student Name</label>
        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Course</label>

        <select name="course_id" class="form-control">
            <option value="">-- Select Course --</option>

            @foreach($courses as $course)
                <option value="{{ $course->id }}">
                    {{ $course->course_name }}
                </option>
            @endforeach

        </select>
    </div>

    <div class="mb-3">
        <label>Student Image</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">
        Submit
    </button>

</form>

<hr>

<h2>Students List</h2>

<table class="table table-bordered table-striped mt-4">

    <thead>

        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Department</th>
            <th>Action</th>
        </tr>

    </thead>

    <tbody>

        @foreach($students as $student)

        <tr>

            <td>

                @if($student->image)

                    <img src="{{ asset('storage/'.$student->image) }}"
                         width="70"
                         height="70"
                         style="border-radius:50%; object-fit:cover;">

                @else

                    No Image

                @endif

            </td>

            <td>{{ $student->name }}</td>

            <td>{{ $student->email }}</td>

            <td>

                @if($student->courseRelation)

                    {{ $student->courseRelation->course_name }}

                @else

                    No Course

                @endif

            </td>

            <td>

                <a href="/students/{{ $student->id }}/edit"
                   class="btn btn-warning btn-sm">

                    Edit

                </a>

                <form action="/students/{{ $student->id }}"
                      method="POST"
                      style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm">
                        Delete
                    </button>

                </form>

            </td>

        </tr>

        @endforeach

    </tbody>

</table>

@endsection