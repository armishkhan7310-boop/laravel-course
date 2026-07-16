@extends('layouts.app')

@section('content')
<x-message />

<h2>Student Registration Form</h2>

<form action="/students" method="POST" class="card p-4 shadow">
    @csrf
    @if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <label>Student Name</label><br>
   <input type="text" name="name" value="{{ old('name') }}" class="form-control">

    <label>Email</label><br>
    <input type="email" name="email" value="{{ old('email') }}" class="form-control">

    <label>Department</label><br>
    <input type="text" name="course" value="{{ old('course') }}" class="form-control">

    <button type="submit" class="btn btn-primary">Submit</button>

</form>
<h2>Students List</h2>

<table class="table table-bordered table-striped table-hover mt-4">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Department</th>
    </tr>
    <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Department</th>
    <th>Action</th>
</tr>

    @foreach($students as $student)
   <tr>
    <td>{{ $student->name }}</td>
    <td>{{ $student->email }}</td>
    <td>{{ $student->course }}</td>
    <td>
    <a href="/students/{{ $student->id }}/edit">Edit</a>

    <form action="/students/{{ $student->id }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</td>
</tr>
    @endforeach

</table>

@endsection