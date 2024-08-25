@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Student</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="student_name" class="form-label">Student Name</label>
                <input type="text" class="form-control" id="student_name" name="student_name"
                    value="{{ old('student_name', $student->student_name) }}">
            </div>
            <div class="mb-3">
                <label for="class" class="form-label">Class</label>
                <input type="text" class="form-control" id="class" name="class"
                    value="{{ old('class', $student->class) }}">
            </div>
            <div class="mb-3">
                <label for="class_teacher_id" class="form-label">Class Teacher</label>
                <select class="form-select" id="class_teacher_id" name="class_teacher_id">
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}"
                            {{ $student->class_teacher_id == $teacher->id ? 'selected' : '' }}>
                            {{ $teacher->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="admission_date" class="form-label">Admission Date</label>
                <input type="date" class="form-control" id="admission_date" name="admission_date"
                    value="{{ old('admission_date', $student->admission_date) }}">
            </div>
            <div class="mb-3">
                <label for="yearly_fees" class="form-label">Yearly Fees</label>
                <input type="number" step="0.01" class="form-control" id="yearly_fees" name="yearly_fees"
                    value="{{ old('yearly_fees', $student->yearly_fees) }}">
            </div>
            <button type="submit" class="btn btn-primary">Update Student</button>
        </form>
    </div>
@endsection
