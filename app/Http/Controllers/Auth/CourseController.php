<?php

namespace App\Http\Controllers\Auth;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Imports\CourseImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\Auth\CourseRequestForm;
use App\Models\Semester;

class CourseController extends Controller
{
    public function index()
    {
        $title = [
            'title' => 'SIS | Courses'
        ];
        $courses = Course::orderBy('id', 'DESC')->get();

        return view('admin.courses.index', $title, compact('courses'));
    }

    public function create()
    {
        $title = [
            'title' => 'SIS | Add course'
        ];

        $semesters = Semester::where('status', true)->get();
    
        return view('admin.courses.add-course', $title, compact('semesters'));
    }

    public function save(CourseRequestForm $request)
    {
        $validatedData = $request->validated();

        $course = new Course();
        $course->title = $validatedData['title'];
        $course->code = $validatedData['code'];
        $course->semester_id = $validatedData['semester'];
        $course->credit = $validatedData['credit'];
        $course->status = $validatedData['status'];

        $course->save();
        return redirect()->route('courses')->with('success', 'Course has been added successfully!');
    }

    public function edit($course_id)
    {
        $title = [
            'title' => 'SIS | Update course'
        ];

        $semesters = Semester::where('status', true)->get();

        $course = Course::findOrFail($course_id);
        return view('admin.courses.edit-course', $title, compact('course', 'semesters'));
    }

    public function update(Request $request, $course_id)
    {
        $course = Course::findOrFail($course_id); 

        $course->title = $request->title;
        $course->code = $request->code;
        $course->semester_id = $request->semester;
        $course->credit = $request->credit;
        $course->status = $request->status;

        $course->update();
        return redirect()->route('courses')->with('success', 'Course has been updated successfully!');
    }

    public function destroy($course_id)
    {
        $course = Course::findOrFail($course_id);
        if ($course->status == '1') {
            $course->status = '0';
            $course->update();
            return redirect()->route('courses')->with('error', 'Course has been deactivated successfully!');
        } else if ($course->status == '0') {
            $course->status = '1';
            $course->update();
            return redirect()->route('courses')->with('error', 'Course has been activated successfully!');
        }
    }

    public function bulk_add_courses()
    {
        $title = [
            'title' => 'SIS | Add course'
        ];

        return view('admin.courses.bulk-add-courses', $title);
    }

    public function bulk_save_courses(Request $request)
    {

        Excel::import(new CourseImport, $request->file);

        return redirect()->route('courses')->with('success', 'Course(s) has been added successfully!');
    }
}
