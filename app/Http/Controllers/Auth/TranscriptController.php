<?php

namespace App\Http\Controllers\Auth;

use App\Models\Classes;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TranscriptController extends Controller
{
    public function index()
    {
        $title = [
            'title' => 'SIS | Classes'
        ];
        $classes = Classes::all();

        return view('admin.transcripts.index', $title, compact('classes'));
    }

    public function class_transcripts($class_id)
    {
        $title = [
            'title' => 'SIS | Students'
        ];

        $students = Student::where('class_id', $class_id)->orderBy('name', 'ASC')->get();
        return view('admin.transcripts.students', $title, compact('students'));
    }

    public function student_transcript($student_id)
    {
        $title = [
            'title' => 'SIS | Transcript'
        ];

        if (Auth::user()->role == '1') {
            $transcript_details = DB::table('examination_marks')->select([
                'courses.title',
                'courses.code',
                'courses.status',
                'courses.credit',
                'examination_marks.score',
                'grades.grade_name AS grade',
                'grades.point',
                'academic_years.name AS academic_year',
                'semesters.name AS semester'

            ])
                ->join('programmes', 'examination_marks.programme_id', 'programmes.id')
                ->join('students', 'examination_marks.student_id', 'students.id')
                ->join('courses', 'examination_marks.course_id', 'courses.id')
                ->join('grades', 'examination_marks.grade_id', 'grades.id')
                ->join('semesters', 'examination_marks.semester_id', 'semesters.id')
                ->join('academic_years', 'examination_marks.academic_year_id', 'academic_years.id')
                ->orderBy('semesters.name', 'ASC')
                ->where('students.id', $student_id)
                ->get();

                $student_details = DB::table('students')->select([
                    'students.reg_number',
                    'students.name',
                    'programmes.name AS program'
                ])
                ->join('programmes', 'students.programme_id', 'programmes.id')
                ->where('students.id', $student_id)
                ->get();




            return view('admin.transcripts.individual-transcript', $title, compact('transcript_details', 'student_details'));
        }
    }
}
