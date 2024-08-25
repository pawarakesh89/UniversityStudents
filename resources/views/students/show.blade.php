@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Student Details</h1>

    <table class="table table-bordered">
        <tr>
            <th>Student Name</th>
            <td>{{ $student->student_name }}</td>
        </tr>
        <tr>
            <th>Class</th>
            <td>{{ $student->class }}</td>
        </tr>
        <tr>
            <th>Teacher</th>
            <td>{{ $student->teacher->name }}</td>
        </tr>
        <tr>
            <th>Admission Date</th>
            <td>{{ $student->admission_date }}</td>
        </tr>
        <tr>
            <th>Yearly Fees</th>
            <td>{{ $student->yearly_fees }}</td>
        </tr>
    </table>

    <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>
@endsection
