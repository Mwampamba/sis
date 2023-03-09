<?php

namespace App\Http\Controllers\Auth;

use App\Models\Student;
use App\Models\Examination;
use Illuminate\Http\Request;
use App\Models\ExaminationMark;
use App\Models\ClassExamination;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ExaminationMarkImport;

class ExaminationMarkController extends Controller
{
    public function select_academic_year()
    {
        $title = [
            'title' => 'SIS | Select examination'
        ];

        $years = DB::table('academic_years')->where('status', '1')->orderBy('id', 'DESC')->get();
        $years_data['academic_year'] = $years;

        return view('admin.examination-marks.select-exam', $title, compact('years'));
    }

    public function fetch_examinations($year_id = null)
    {
        $exams = DB::table('examinations')
            ->where('academic_year_id', $year_id)
            ->where('status', 1)
            ->get();

        return response()->json([
            'status' => 1,
            'exams' => $exams
        ]);
    }

    public function post_exam_mark($year_id = null)
    {
        $check_grade = '';
        if (request('score') >= 70 && request('score') <= 100) {
            $check_grade = 'A';
        }
        if (request('score') >= 60 && request('score') <= 69) {
            $check_grade = 'B+';
        }
        if (request('score') >= 50 && request('score') <= 59) {
            $check_grade = 'B';
        }
        if (request('score') >= 40 && request('score') <= 49) {
            $check_grade = 'C';
        }
        if (request('score') >= 35 && request('score') <= 39) {
            $check_grade = 'D';
        }
        if (request('score') >= 0 && request('score') <= 34) {
            $check_grade = 'E';
        }


        $grade = DB::table('grades')->where('grade_name', $check_grade)->first();
        $course = DB::table('courses')->where('id', request('course_id'))->first();
        $student = DB::table('students')->where('id', request('student_id'))->first();
        $exam = DB::table('examinations')->where('id', request('exam_id'))->first();

        $mark =  ExaminationMark::where([
            'student_id' => $student->id,
            'course_id' => $course->id,
            'examination_id' => $exam->id
        ])->first();

        if (empty($mark)) {
            ExaminationMark::create([
                'score' => request('score'),
                'student_id' => request('student_id'),
                'course_id' => request('course_id'),
                'grade_id' => $grade->id,
                'class_id' => $student->class_id,
                'programme_id' => $student->programme_id,
                'examination_id' => $exam->id,
                'semester_id' => $exam->semester_id,
                'academic_year_id' => $exam->academic_year_id
            ]);
            echo '<small class="alert alert-success form-control rounded">recorded</small>';
        } else {
            ExaminationMark::where([
                'student_id' => $student->id,
                'course_id' => $course->id,
                'examination_id' => $exam->id
            ])->update([
                'score' => request('score'),
                'grade_id' => $grade->id,
            ]);

            echo '<small class="alert alert-success form-control rounded">updated</small>';
        }
    }

    public function fetch_classes(Request $request)
    {
        $title = [
            'title' => 'SIS | Examinations'
        ];
        $class_exams = ClassExamination::join('examinations', 'class_examinations.examination_id', 'examinations.id')
            ->join('classes', 'class_examinations.class_id', 'classes.id')
            ->select([
                'examinations.exam_name',
                'class_examinations.examination_id AS exam_id',
                'classes.name AS classname',
                'classes.id as class_id',
                'classes.programme_id'
            ])
            ->where('examinations.exam_name', $request->exam)->get();

        return view('admin.examination-marks.index',  $title, compact('class_exams'));
    }

    public function scores_based_on_student_class($class_id, $exam_id)
    {
        $title = [
            'title' => 'SIS | Students scores'
        ];
        $exam =  Examination::findOrFail($exam_id);

        if (Auth::user()->role == '1') {

            $students = DB::table('students')->select([
                'students.id',
                'students.name',
                'students.reg_number'
            ])
                ->where('students.class_id', $class_id)
                ->orderBy('id')
                ->get();

            $courses = DB::table('class_courses')->distinct()->select(['courses.code', 'courses.id'])
                ->join('courses', 'class_courses.course_id', 'courses.id')
                ->join('class_examinations', 'class_courses.class_id', 'class_examinations.class_id')
                ->where('class_examinations.class_id', $class_id)
                ->where('class_examinations.examination_id', $exam_id)
                ->where('courses.semester_id', $exam->semester_id)
                ->get();

            $exam_scores = DB::table('examination_marks')->select([
                'examination_marks.score',
            ])
                ->where('examination_marks.class_id', $class_id)
                ->orderBy('student_id')
                ->get();
            $exam = DB::table('examinations')->where('id', $exam_id)
                ->first();
            return view('admin.examination-marks.class-marks', $title, compact('students', 'exam', 'courses', 'exam_scores'));
        } else if (Auth::user()->role == '0') {
            $students = DB::table('students')->select([
                'students.id',
                'students.name',
                'students.reg_number'
            ])
                ->where('students.class_id', $class_id)
                ->orderBy('id')
                ->get();

            $courses = DB::table('class_courses')->distinct()->select([
                'courses.code',
                'courses.id'
            ])

                ->join('courses', 'class_courses.course_id', 'courses.id')
                ->join('class_examinations', 'class_courses.class_id', 'class_examinations.class_id')
                ->join('course_user', 'class_courses.course_id', 'course_user.course_id')
                ->where('class_examinations.class_id', $class_id)
                ->where('class_examinations.examination_id', $exam_id)
                ->where('course_user.user_id', Auth::user()->id)
                ->where('courses.semester_id', $exam->semester_id)
                ->get();

            $exam_scores = DB::table('examination_marks')->select([
                'examination_marks.score',
            ])
                ->where('examination_marks.class_id', $class_id)
                ->orderBy('student_id')
                ->get();
            $exam = DB::table('examinations')->where('id', $exam_id)->first();
            return view('admin.examination-marks.class-marks', $title, compact('students', 'exam', 'courses', 'exam_scores'));
        }
    }

    public function preview_student_scores_base_on_exam($exam_id, $student_id)
    {
        $title = [
            'title' => 'SIS | Preview student scores',
        ];

        $student_profile = Student::findOrFail($student_id);
        $exam = Examination::findOrFail($exam_id);

        $student = DB::table('students')->distinct()->select([
            'students.name as name',
            'students.reg_number',
            'students.programme_id AS programme_id',

        ])->join('examination_marks', 'examination_marks.student_id', 'students.id')
            ->where('examination_marks.student_id', $student_id)
            ->where('examination_marks.examination_id', $exam_id)->get();

        $score_results = DB::table('examination_marks')->select([
            'courses.title',
            'courses.code',
            'courses.status',
            'courses.credit',
            'examination_marks.score',
            'grades.grade_name AS grade',
            'grades.point'

        ])->join('courses', 'examination_marks.course_id', 'courses.id')
            ->join('grades', 'examination_marks.grade_id', 'grades.id')
            ->where('examination_marks.examination_id', $exam_id)
            ->where('examination_marks.student_id', $student_id)->get();

        $ac_year_and_semester = DB::table('examination_marks')->distinct()->select([
            'academic_years.name AS year',
            'semesters.name AS semester'
        ])->join('semesters', 'examination_marks.semester_id', 'semesters.id')
            ->join('academic_years', 'examination_marks.academic_year_id', 'academic_years.id')
            ->where('examination_marks.examination_id', $exam_id)->get();

            if (($score_results->count()) > 0) {
                return view('admin.transcripts.preview-transcript', $title, compact('student', 'exam', 'score_results', 'student_profile', 'ac_year_and_semester'));
            } else {
                return view('admin.transcripts.empty-transcript', $title, compact('student', 'score_results', 'student_profile'));
            }

        
    }

    public function bulk_add_students_scores()
    {
        $title = [
            'title' => 'SIS | Examination scores'
        ];

        return view('admin.examination-marks.bulk-add-exam-marks', $title);
    }

    public function bulk_save_students_scores(Request $request)
    {

        Excel::import(new ExaminationMarkImport, $request->file);

        return redirect()->route('bulkStudentsScores')->with('success', 'Student(s) scores has been added successfully!');
    }

    public function publish_examination_results($exam_obj)
    {
        $exam = new ExaminationController();

        $exam->deactivate_examination($exam_obj);

        $students = DB::table('examination_marks')->distinct()->select([
            'students.email',
            'students.name',
            'examinations.exam_name AS examination_name',
        ])
            ->join('students', 'examination_marks.student_id', 'students.id')
            ->join('examinations', 'examination_marks.examination_id', 'examinations.id')
            ->where('examination_marks.examination_id', $exam_obj)
            ->get();

        // get emails in array format

      $emails = $students->pluck('email');

        $body = "Matokeo ya mtihani mwaka wa masomo 2019/ 2020 wakati ukiwa mwaka wa kwanza. 
                    Huu ni mfano wa email ambayo utakuwa unapokea kipindi matokeo ya UE yanapokuwa yametoka.";

        foreach ($emails as $email) {
            Mail::send('admin.examination-marks.send-email-student',
                ['email' => $email, 'body' => $body],
                function ($message) use ($email) {
                    $message->from('info@sis.ac.tz', 'Student Information System');
                    $message->to($email, $email)
                        ->subject('Matokeo ya Mtihani');
                }
            );
        }
        
        return redirect()->back()->with('success', 'Examination result has been published successfully!');
    }
    
}
