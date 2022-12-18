<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Course;
use App\Models\LecturerCourse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LecturerCoursesRequestForm;

class LecturerCourseController extends Controller
{
    public function index()
    {
        $title = [
            'title' => 'SIS | Lecturer courses'
        ];

        if (auth()->user()->role == '1') {
            $lecturer_courses = LecturerCourse::join('users', 'course_user.user_id', 'users.id')
                ->join('courses', 'course_user.course_id', 'courses.id')->get();

            return view('admin.lecturer-courses.index', $title, compact('lecturer_courses'));
        } else if (auth()->user()->role == '0') {
            $lecturer_courses = LecturerCourse::join('users', 'course_user.user_id', 'users.id')
                ->join('courses', 'course_user.course_id', 'courses.id')->where('user_id', auth()->user()->id)->get();

            return view('admin.lecturer-courses.index', $title, compact('lecturer_courses'));
        }
    }

    public function create()
    {
        $title = [
            'title' => 'SIS | Add lecturer course'
        ];
        $lecturers = User::where('role', '0')->get();
        $courses = Course::all();

        return view('admin.lecturer-courses.add-lecturer-course', $title, compact('lecturers', 'courses'));
    }

    public function save(LecturerCoursesRequestForm $request)
    {
        $validatedData = $request->validated();

        $lecturer_id = $validatedData['lecturer'];
        $courses = $validatedData['courses'];

        $lecturer = User::findOrFail($lecturer_id);
        if ($lecturer_id) {
            $lecturer->courses()->attach($courses);

            return redirect()->route('lecturerCourses')->with('success', 'Courses has been assign to lecturer successfully!');
        }
    }

    public function destroy($course_id, $lecturer)
    {
        
        $course = Course::findOrFail($course_id);
        $course->lecturers()->detach($lecturer);
       
        return redirect()->route('lecturerCourses')->with('delete', 'Course has been removed from lecturer successfully!');
    }
}
