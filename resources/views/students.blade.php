@extends('layouts.app')

@section('content')

<h2>Student Registration Form</h2>

<form action="/students" method="POST">
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
    <input type="text" name="name" value="{{ old('name') }}">

    <label>Email</label><br>
    <input type="email" name="email" value="{{ old('email') }}">

    <label>Department</label><br>
    <input type="text" name="course" value="{{ old('course') }}">

    <button type="submit">Submit</button>

</form>
<h2>Students List</h2>

<table border="1">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Department</th>
    </tr>

    @foreach($students as $student)
    <tr>
        <td>{{ $student->name }}</td>
        <td>{{ $student->email }}</td>
        <td>{{ $student->course }}</td>
    </tr>
    @endforeach

</table>

@endsection