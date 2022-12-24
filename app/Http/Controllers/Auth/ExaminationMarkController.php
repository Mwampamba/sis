<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\ClassExamination;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ExaminationMarkImport;


class ExaminationMarkController extends Controller
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

    public function bulk_add_students_scores()
    {
        $title = [
            'title' => 'SIS | Examination marks'
        ];

        return view('admin.examination-marks.bulk-add-exam-marks', $title);
    }

    public function bulk_save_students_scores(Request $request)
    {

        Excel::import(new ExaminationMarkImport, $request->file);

        return redirect()->route('bulkStudentsScores')->with('success', 'Student(s) scores has been added successfully!');
    }

    public function class_students_scores($class_id)
    {
        $title = [
            'title' => 'SIS | Students marks'
        ];

        if (Auth::user()->role == '1') {
            $students = DB::table('students')->select([
                'students.id',
                'students.name'

            ])
                ->where('students.class_id', $class_id)
                ->orderBy('id')
                ->get();

            $courses = DB::table('class_courses')->select([
                'courses.title',
            ])
                ->join('courses', 'class_courses.course_id', 'courses.id')
                ->join('class_examinations', 'class_courses.class_id', 'class_examinations.class_id')
                ->join('examinations', 'class_courses.class_id', 'class_examinations.class_id')
                ->where('class_examinations.class_id', $class_id)
                ->get();

            $exam_scores = DB::table('examination_marks')->select([
                'examination_marks.score',
            ])
                ->where('examination_marks.class_id', $class_id)
                ->orderBy('student_id')
                ->get();

            return view('admin.examination-marks.class-marks', $title, compact('students', 'courses', 'exam_scores'));

        } else if (Auth::user()->role == '0') {
            $students = DB::table('students')->select([
                'students.id',
                'students.name'

            ])
                ->where('students.class_id', $class_id)
                ->orderBy('id')
                ->get();

            $courses = DB::table('class_courses')->select([
                'courses.title',
            ])
                ->join('courses', 'class_courses.course_id', 'courses.id')
                ->join('course_user', 'class_courses.course_id', 'course_user.course_id')
                ->where('class_courses.class_id', $class_id)
                ->where('course_user.user_id', Auth::user()->id)
                ->get();
            
            $exam_scores = DB::table('examination_marks')->select([
                'examination_marks.score',
            ])
                ->where('examination_marks.class_id', $class_id)
                ->orderBy('student_id')
                ->get();

            return view('admin.examination-marks.class-marks', $title, compact('exam_scores', 'students', 'courses'));
        }
    }
}
