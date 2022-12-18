<?php

namespace App\Http\Controllers\Auth;

use App\Models\Student;
use App\Models\ClassCourse;
use Illuminate\Http\Request;
use App\Models\ClassExamination;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MarkController extends Controller
{
    public function exam_classes_list($exam_id)
    {
        $title = [
            'title' => 'SIS | Class Examinations'
        ];

        if (Auth::user()->role == '1') {
            $class_exams = ClassExamination::join('examinations', 'class_examinations.examination_id', 'examinations.id')
                ->join('classes', 'class_examinations.class_id', 'classes.id')->where('examination_id', $exam_id)->get();

            return view('admin.examination-marks.index', $title, compact('class_exams'));
        } else if (Auth::user()->role == '0') {
            $class_exams = ClassExamination::join('examinations', 'class_examinations.examination_id', 'examinations.id')
                ->join('classes', 'class_examinations.class_id', 'classes.id')->where('examination_id', $exam_id)->get();

            return view('admin.examination-marks.index', $title, compact('class_exams'));
        }
    }

    public function class_students_marks($class_id)
    {
        $title = [
            'title' => 'SIS | Students marks'
        ];

        if (Auth::user()->role == '1') {
            $class_courses = ClassCourse::join('courses', 'class_courses.course_id', 'courses.id')
                ->join('classes', 'class_courses.class_id', 'classes.id')
                ->where('class_courses.class_id', $class_id)->get();

            $students = Student::where('class_id', $class_id)->orderBy('name', 'ASC')->get();
            return view('admin.examination-marks.class-marks', $title, compact('students', 'class_courses'));
        } else if (Auth::user()->role == '0') {
            $class_courses = ClassCourse::join('courses', 'class_courses.course_id', 'courses.id')
                ->join('classes', 'class_courses.class_id', 'classes.id')
                ->join('course_user', 'class_courses.course_id', 'course_user.course_id')
                ->where('course_user.user_id', Auth::user()->id)
                ->where('class_courses.class_id', $class_id)->get();

            $students = Student::where('class_id', $class_id)->orderBy('name', 'ASC')->get();
            return view('admin.examination-marks.class-marks', $title, compact('students', 'class_courses'));
        }
    }

    public function save_class_students_marks(Request $request)
    {

    }
}
