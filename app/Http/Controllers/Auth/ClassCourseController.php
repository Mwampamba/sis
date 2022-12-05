<?php

namespace App\Http\Controllers\Auth;

use App\Models\Course;
use App\Models\Classes;
use App\Models\ClassCourse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ClassCourseRequestForm;

class ClassCourseController extends Controller
{
    public function index()
    {
        $title = [
            'title' => 'SIS | Class courses'
        ];
        // $collages = Collage::orderBy('id', 'DESC')->get();

        return view('admin.class-courses.index', $title);
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

    public function save(ClassCourseRequestForm $request)
    {
        $validatedData = $request->validated();

        dd($validatedData);

        // $courses->classes()->attach($validatedData);

        return redirect()->route('classCourses')->with('success', 'Class courses has been added successfully!');
    }
}
