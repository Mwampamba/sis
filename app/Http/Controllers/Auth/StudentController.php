<?php

namespace App\Http\Controllers\Auth;

use App\Models\Classes;
use App\Models\Collage;
use App\Models\Student;
use App\Models\Programme;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Imports\StudentImport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\Auth\StudentRequestForm;
use App\Models\ExaminationMark;

class StudentController extends Controller
{

    public function index()
    {
        $title = [
            'title' => 'SIS | Students'
        ];

        $students = Student::orderBy('id', 'DESC')->get();
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
        $validatedData = $request->validated();

        $student = new Student;
        $student->name = $validatedData['name'];
        $student->phone = $validatedData['phone'];
        $student->email = $validatedData['email'];
        $student->reg_number = $validatedData['reg_number'];
        $student->class_id = $validatedData['class'];
        $student->programme_id = $validatedData['programme'];
        $student->collage_id = $validatedData['collage'];

        $password = Str::random(8);
        $hashed_password = Hash::make($password);

        $student->password = $hashed_password;

        if ($request->hasfile('picture')) {

            $image_path = 'profile/student/';
            $image_file = $request->file('picture');

            $extension = $image_file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $image_file->move($image_path, $filename);
            $final_image_path = $image_path . $filename;

            $student->profile = $final_image_path;
        }

        $student->save();

        $body = "You can now use this as your default password. Remember to change it";

        Mail::send(
            'admin.auth.default-password',
            ['password' => $password, 'body' => $body],
            function ($message) use ($request) {
                $message->from('info@sis.ac.tz', 'Student Information System');
                $message->to($request->email, $request->name)
                    ->subject('Default Password');
            }
        );

        return redirect()->route('students')->with('success', 'Student has been registered successfully!');
    }

    public function edit($student_id)
    {
        $title = [
            'title' => 'SIS | Update student'
        ];

        $student = Student::findOrFail($student_id);
        $classes = Classes::all();
        $programmes = Programme::all();
        $collages = Collage::all();

        if ($student) {
            return view('admin.students.edit-student', $title, compact('student', 'classes', 'programmes', 'collages'));
        } else {
            return back()->with('message', 'No such student record founded!');
        }
    }


    public function update(Request $request, $student_id)
    {
        // $validatedData = $request->validated();

        $student = Student::findOrFail($student_id);

        // $student->name = $validatedData['name'];
        // $student->phone = $validatedData['phone'];
        // $student->email = $validatedData['email'];
        // $student->reg_number = $validatedData['reg_number'];
        // // $student->class_id = $validatedData['class'];
        // $student->programme_id = $validatedData['programme'];
        // $student->collage_id = $validatedData['collage'];

        // $password = Str::random(8);
        // $hashed_password = Hash::make($password);

        // $student->password = $hashed_password;

        // dd($student->password, $password);

        // $body = "You can now use this as your default password. Remember to change it";

        // Mail::send(
        //     'admin.auth.default-password',
        //     ['password' => $password, 'body' => $body],
        //     function ($message) use ($request) {
        //         $message->from('info@sis.ac.tz', 'Student Information System');
        //         $message->to($request->email, $request->name)
        //             ->subject('Default Password');
        //     }
        // );

        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->reg_number = $request->reg_no;
        $student->programme_id = $request->programme;
        $student->collage_id = $request->collage;
        $student->class_id = $request->class;

        if ($request->hasfile('picture')) {

            $image_path = 'profile/student/';
            $image_file = $request->file('picture');

            $extension = $image_file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $image_file->move($image_path, $filename);
            $final_image_path = $image_path . $filename;

            $student->profile = $final_image_path;
        }
        $student->update();
        return redirect()->route('students')->with('success', 'Student records has been updated successfully!');
    }

    public function destroy($student)
    {
        $user = Student::findOrFail($student);

        $user->delete();
        return redirect()->route('students')->with('error', 'Student has been deleted successfully!');
    }

    public function reset_password($student_id)
    {
        $student = Student::findOrFail($student_id);

        if ($student) {
            $password = Str::random(8);
            $hashed_password = Hash::make($password);

            $student->password = $hashed_password;

            $body = "You can now use this as your default password. Remember to change it";

            Mail::send(
                'admin.auth.default-password',
                ['password' => $password, 'body' => $body],
                function ($message) use ($student) {
                    $message->from('info@sis.ac.tz', 'Student Information System');
                    $message->to($student->email, $student->name)
                        ->subject('Default Password');
                }
            );
            $student->update();
            return redirect()->route('students')->with('success', 'Student password has been reseated successfully!');
        }
    }

    public function bulk_add_students()
    {
        $title = [
            'title' => 'SIS | Add student'
        ];

        return view('admin.students.bulk-add-students', $title);
    }

    public function bulk_save_students(Request $request)
    {
        Excel::import(new StudentImport, $request->file);

        return redirect()->route('students')->with('success', 'Student(s) has been added successfully!');
    }
}
