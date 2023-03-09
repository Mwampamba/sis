<?php

namespace App\Http\Controllers\Auth;

use App\Models\Student;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StudentTranscriptController extends Controller
{
    public function provisional_results()
    {
        $title = [
            'title' => 'SIS | Provisional results'
        ];

        $student_profile = Student::findOrFail(auth()->guard('student')->id());

        $student = DB::table('students')->distinct()->select([
            'students.name as name',
            'students.reg_number',
            'students.class_id AS class',
            'students.programme_id AS programme_id',

        ])->join('examination_marks', 'examination_marks.student_id', 'students.id')
            ->where('examination_marks.student_id', auth()->guard('student')->id())->get();

        $score_results = DB::table('examination_marks')->select([
            'courses.title',
            'courses.code',
            'courses.status',
            'courses.credit',
            'examination_marks.score',
            'grades.grade_name AS grade',
            'grades.point'

        ])->join('courses', 'examination_marks.course_id', 'courses.id')
            ->join('examinations', 'examination_marks.examination_id', 'examinations.id')
            ->join('grades', 'examination_marks.grade_id', 'grades.id')
            ->where('examinations.status', false)
            ->where('examination_marks.student_id', auth()->guard('student')->id())->get();

        if (($score_results->count()) > 0) {
            return view('admin.transcripts.student.transcript', $title, compact('student', 'score_results', 'student_profile'));
        } else {
            return view('admin.transcripts.student.empty-transcript', $title, compact('student', 'score_results', 'student_profile'));
        }
    }
}
