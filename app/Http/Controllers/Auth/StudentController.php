<?php

namespace App\Http\Controllers\Auth;

use App\Models\Classes;
use App\Models\Collage;
use App\Models\Student;
use App\Models\Programme;
use Illuminate\Http\Request;
use App\Imports\StudentImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\Auth\StudentRequestForm;

class StudentController extends Controller
{

    public function student_dashboard()
    {
        $title = [
            'title' => 'SIS | Dashboard'
        ];

        return view('admin.student-dashboard', $title);
    }
    
    public function index()
    {
        $title = [
            'title' => 'SIS | students'
        ];

        $students = Student::all();
        return view('admin.students.index', $title, compact('students'));
    }

    public function create()
    {
        $title = [
            'title' => 'SIS | Add student'
        ];

        $programmes = Programme::all();
        $collages = Collage::all();
        $classes = Classes::all();

        return view('admin.students.add-student', $title, compact('programmes', 'collages', 'classes'));
    }

    public function save(StudentRequestForm $request)
    {
        $default_password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $validatedData = $request->validated();

        $student = new Student;
        $student->name = $validatedData['name'];
        $student->phone = $validatedData['phone'];
        $student->email = $validatedData['email'];
        $student->reg_number = $validatedData['reg_no'];
        $student->class_id = $validatedData['class'];
        $student->programme_id = $validatedData['programme'];
        $student->collage_id = $validatedData['collage'];
        $student->password = $default_password;

        $student->save();
        return redirect()->route('students')->with('success', 'Student has been added successfully!');
    }

    public function edit($student_id)
    {
        $student = Student::findOrFail($student_id);
        $classes = Classes::all();
        $programmes = Programme::all();
        $collages = Collage::all();

        if ($student) {
            return view('admin.students.edit-student', compact('student', 'classes', 'programmes', 'collages'));
        } else {
            return back()->with('message', 'No such student record founded!');
        }
    }

    public function update(StudentRequestForm $request, $student_id)
    {
        $validatedData = $request->validated();

        $student = Student::findOrFail($student_id);

        $student->name = $validatedData['name'];
        $student->phone = $validatedData['phone'];
        $student->email = $validatedData['email'];
        $student->reg_number = $validatedData['reg_no'];
        $student->class_id = $validatedData['class'];
        $student->programme_id = $validatedData['programme'];
        $student->collage_id = $validatedData['collage'];

        $student->update();
        return redirect()->route('students')->with('success', 'Student records has been updated successfully!');
    }

    public function destroy($student)
    {
        $user = Student::findOrFail($student);

        $user->delete();
        return redirect()->route('students')->with('delete', 'Student has been deleted successfully!');
    }

    public function bulk_add_students(){
        $title = [
            'title' => 'SIS | Add student'
        ];

        return view('admin.students.bulk-add-students', $title);
    }

    public function bulk_save_students(Request $request){

        Excel::import(new StudentImport, $request->file);

        return redirect()->route('students')->with('success', 'Student(s) has been added successfully!');
    }
}
