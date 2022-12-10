<?php

namespace App\Http\Controllers\Auth;

use App\Models\Course;
use App\Models\Classes;
use App\Http\Controllers\Controller;
use App\Models\ClassCourse;

class ClassCourseController extends Controller
{
    public function index()
    {
        $title = [
            'title' => 'SIS | Class courses' 
        ];

        if (auth()->user()->role == '1') {
            $class_courses = ClassCourse::join('classes', 'class_course.class_id', 'classes.id')
                ->join('courses', 'class_course.course_id', 'courses.id')->get();

            return view('admin.class-courses.index', $title, compact('class_courses'));
        }
        else if (auth()->user()->role == '0') {
            $class_courses = ClassCourse::join('classes', 'class_course.class_id', 'classes.id')
                ->join('courses', 'class_course.course_id', 'courses.id')->where('user_id', auth()->user()->id)->get();

            return view('admin.class-courses.index', $title, compact('class_courses'));
        }
    }


    public function create()
    {
        $title = [
            'title' => 'SIS | Add class course'
        ];
        $classes = Classes::all();
        $courses = Course::all();

        return view('admin.class-courses.add-class-course', $title, compact('classes', 'courses'));
    }

}
