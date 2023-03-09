<?php

namespace App\Http\Controllers\Auth;

use App\Models\Course;
use App\Models\Classes;
use App\Models\ClassCourse;
use Illuminate\Http\Request;
use App\Imports\ClassCourseImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\QueryException;
use App\Http\Requests\Auth\ClassCoursesRequestForm;

class ClassCourseController extends Controller
{
    public function index()
    {
        $title = [
            'title' => 'SIS | Class courses'
        ];

        if (auth()->user()->role == '1') {
            $class_courses = ClassCourse::join('classes', 'class_courses.class_id', 'classes.id')
                ->join('courses', 'class_courses.course_id', 'courses.id')->get();

            return view('admin.class-courses.index', $title, compact('class_courses'));
        } else if (auth()->user()->role == '0') {
            $class_courses = ClassCourse::join('classes', 'class_courses.class_id', 'classes.id')
                ->join('courses', 'class_courses.course_id', 'courses.id')->where('user_id', auth()->user()->id)->get();

            return view('admin.class-courses.index', $title, compact('class_courses'));
        }
    }

    public function create()
    {
        $title = [
            'title' => 'SIS | Add class course'
        ];
        $classes = Classes::orderBy('created_at', 'DESC')->get();
        $courses = Course::all();

        return view('admin.class-courses.add-class-course', $title, compact('classes', 'courses'));
    }

    public function save(ClassCoursesRequestForm $request)
    {
        $validatedData = $request->validated();

        $class_id = $validatedData['class'];
        $courses = $validatedData['courses'];

        try {
            $class = Classes::findOrFail($class_id);
            if ($class_id) {
                $class->courses()->attach($courses);

                return redirect()->route('classCourses')->with('success', 'Courses has been added in the class successfully!');
            }
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                return redirect()->back()->with('error', 'Sorry, this course(s) are already in class.');
            }
        }
    }

    public function destroy($course, $class)
    {
        $course_exist = Course::findOrFail($course);

        $course_exist->classes()->detach($class);

        return redirect()->route('classCourses')->with('error', 'Course has been removed from this class successfully!');
    }



    public function bulk_add_class_courses()
    {
        $title = [
            'title' => 'SIS | Add class courses'
        ];

        return view('admin.class-courses.bulk-add-class-courses', $title);
    }

    public function bulk_save_class_courses(Request $request)
    {

        Excel::import(new ClassCourseImport, $request->file);

        return redirect()->route('classCourses')->with('success', 'Course has been added successfully!');
    }
}
