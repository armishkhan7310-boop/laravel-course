@extends('layouts.app')

@section('content')

<h2>Edit Student</h2>

<form action="/students/{{ $student->id }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow">

    @csrf
    @method('PUT')


    <div class="mb-3">

        <label>Student Name</label>

        <input type="text"
               name="name"
               value="{{ $student->name }}"
               class="form-control">

    </div>


    <div class="mb-3">

        <label>Email</label>

        <input type="email"
               name="email"
               value="{{ $student->email }}"
               class="form-control">

    </div>


    <div class="mb-3">

        <label>Course</label>

        <select name="course_id" class="form-control">


            @foreach($courses as $course)

                <option value="{{ $course->id }}"
                
                @if($student->course_id == $course->id)
                    selected
                @endif>

                    {{ $course->course_name }}

                </option>

            @endforeach


        </select>

    </div>


    <div class="mb-3">

        <label>Current Image</label><br>


        @if($student->image)

            <img src="{{ asset('storage/'.$student->image) }}"
                 width="80"
                 height="80"
                 style="border-radius:50%;object-fit:cover;">

        @else

            No Image

        @endif


    </div>


    <div class="mb-3">

        <label>Change Image</label>

        <input type="file"
               name="image"
               class="form-control">

    </div>


    <button class="btn btn-primary">

        Update

    </button>


</form>


@endsection