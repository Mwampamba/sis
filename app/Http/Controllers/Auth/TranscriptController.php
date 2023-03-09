<?php

namespace App\Http\Controllers\Auth;

use App\Models\Classes;
use App\Models\Student;
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
        $classes = Classes::where('status', true)->get();

        return view('admin.transcripts.index', $title, compact('classes'));
    }

    public function select_class_to_view_transcripts($class_id)
    {
        $title = [
            'title' => 'SIS | Classes'
        ];

        $students = Student::where('class_id', $class_id)->orderBy('name', 'ASC')->get();
        return view('admin.transcripts.students-transcripts', $title, compact('students'));
    }

    public function student_transcript($student_id)
    {
        $title = [
            'title' => 'SIS | Provisional results'
        ];

        if (Auth::user()->role == '1') {
            $student_profile = Student::findOrFail($student_id);

            $student = DB::table('students')->distinct()->select([
                'students.name as name',
                'students.reg_number',
                'classes.name AS class',
                'students.programme_id AS programme_id',

            ])->join('examination_marks', 'examination_marks.student_id', 'students.id')
            ->join('classes', 'students.class_id', 'classes.id')
                ->where('examination_marks.student_id', $student_id)->get();

            $score_results = DB::table('examination_marks')->distinct()->select([
                'courses.title',
                'courses.code',
                'courses.status',
                'courses.credit',
                'examination_marks.score',
                'grades.grade_name AS grade',
                'grades.point',
                'semesters.name AS semester_name',
                'semesters.id AS semester_id',
                'academic_years.name AS academic_year'

            ])->join('courses', 'examination_marks.course_id', 'courses.id')
                ->join('grades', 'examination_marks.grade_id', 'grades.id')
                ->join('students', 'examination_marks.student_id', 'students.id')
                ->join('examinations', 'examination_marks.examination_id', 'examinations.id')
                ->join('academic_years', 'examination_marks.academic_year_id', 'academic_years.id')
                ->join('semesters', 'examination_marks.semester_id', 'semesters.id')
                ->where('examination_marks.student_id', $student_id)
                ->where('examinations.status', false)->get(); 
            if (($score_results->count()) > 0) {
                return view('admin.transcripts.student-transcript', $title, compact('student', 'score_results', 'student_profile'));
            } else {
                return view('admin.transcripts.empty-transcript', $title, compact('student', 'score_results', 'student_profile'));
            }
        }
        
    }
}
