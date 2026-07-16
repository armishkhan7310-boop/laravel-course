@extends('layouts.app')

@section('content')

<h2>Edit Student</h2>
<form action="/students/{{ $student->id }}" method="POST">
    @csrf
    @method('PUT')

<label>Student Name</label><br>
<input type="text" name="name" value="{{ $student->name }}"><br><br>

<label>Email</label><br>
<input type="email" name="email" value="{{ $student->email }}"><br><br>

<label>Department</label><br>
<input type="text" name="course" value="{{ $student->course }}"><br><br>

<button>Update</button>

</form>

@endsection