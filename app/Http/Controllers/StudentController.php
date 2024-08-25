<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index(Request $request)
    {
        $query = Student::with('teacher');

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('student_name', 'LIKE', "%{$search}%");
        }

        $students = $query->paginate(10);

        return view('students.index', compact('students'));

        // $students = Student::with('teacher')->paginate(10);
        // return view('students.index', compact('students'));
    }

    public function create()
    {
        $teachers = Teacher::get();
        return view('students.create', compact('teachers'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        Student::create([
            'student_name' => $request->student_name,
            'class' => $request->class,
            'class_teacher_id' => $request->class_teacher_id,
            'admission_date' => $request->admission_date,
            'yearly_fees' => $request->yearly_fees,
        ]);
        return redirect()->route('home')->with('success', 'student details saved successfully');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        // return $id;
        $student = Student::find($id);
        $teachers = Teacher::get();
        return view('students.edit', compact('student', 'teachers'));
    }

    public function update(Request $request, string $id)
    {
        // return $id;
        // return $request->all();
        $student = Student::find($id);
        $student->update([
            'student_name' => $request->student_name,
            'class' => $request->class,
            'class_teacher_id' => $request->class_teacher_id,
            'admission_date' => $request->admission_date,
            'yearly_fees' => $request->yearly_fees,
        ]);
        return redirect()->route('home')->with('success', 'student details updated successfully');
    }

    public function destroy(string $id)
    {
        $student = Student::find($id);
        if ($student) {
            $student->delete(); // This performs a soft delete
            return redirect()->route('home')->with('success', 'Student deleted successfully.');
        }

        return redirect()->route('home')->with('error', 'Student not found.');
    }
}
