<?php

namespace App\Http\Controllers\Auth;

use App\Models\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\CourseRequestForm;

class CourseController extends Controller
{
    public function index()
    {
        $title = [
            'title' => 'SIS | Courses'
        ];
        $courses = Course::all();

        return view('admin.courses.index', $title, compact('courses'));
    }

    public function create()
    {
        $title = [
            'title' => 'SIS | Add course'
        ];

        return view('admin.courses.add-course', $title);
    }

    public function save(CourseRequestForm $request)
    {
        $validatedData = $request->validated();

        $course = new Course();
        $course->name = $validatedData['name'];
        $course->code = $validatedData['code'];
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

        $course = Course::findOrFail($course_id);
        return view('admin.courses.edit-course', $title, compact('course'));
    }

    public function update(CourseRequestForm $request, $course_id)
    {
        $course = Course::findOrFail($course_id);
        $validatedData = $request->validated();

        $course->name = $validatedData['name'];
        $course->code = $validatedData['code'];
        $course->credit = $validatedData['credit'];
        $course->status = $validatedData['status'];

        $course->update();
        return redirect()->route('courses')->with('success', 'Course has been updated successfully!');
    }

    public function destroy($course_id)
    {
        $course = Course::findOrFail($course_id);
        $course->delete();
        return redirect()->route('courses')->with('success', 'Course has been deleted successfully!');
    }
}
