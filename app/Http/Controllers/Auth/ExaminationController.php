<?php

namespace App\Http\Controllers\Auth;

use App\Models\Classes;
use App\Models\Student;
use App\Models\ExamType;
use App\Models\Semester;
use App\Models\ClassCourse;
use App\Models\Examination;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use App\Models\ClassExamination;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ExaminationRequestForm;

class ExaminationController extends Controller
{
    public function index()
    {
        $title = [
            'title' => 'SIS | Examinations'
        ];
        $exams = Examination::orderBy('id', 'DESC')->get();

        return view('admin.examinations.index', $title, compact('exams'));
    }

    public function create()
    {
        $title = [
            'title' => 'SIS | Examinations'
        ];

        $exam_types = ExamType::all();
        $semesters = Semester::orderBy('id', 'DESC')->get();
        $years = AcademicYear::orderBy('id', 'DESC')->get();
        $classes = Classes::all();

        return view('admin.examinations.add-exam', $title, compact('exam_types', 'semesters', 'years', 'classes'));
    }

    public function save(ExaminationRequestForm $request)
    {
        $validatedData = $request->validated();

        $exam_type = ExamType::findOrFail($validatedData['exam_type']);

        $exam = $exam_type->examinations()->create([
            'exam_name' => $validatedData['name'],
            'exam_type_id' => $validatedData['exam_type'],
            'semester_id' => $validatedData['semester'],
            'academic_year_id' => $validatedData['year'],
            'starting_date' => $validatedData['starting_date'],
            'ending_date' => $validatedData['ending_date'],
            'status' => $validatedData['status'],
            'description' => $validatedData['description'],
        ]);

        return redirect()->route('examinations')->with('success', 'Examination has been added successfully!');
    }

    public function classes_list($exam_id)
    {
        $title = [
            'title' => 'SIS | Classes list'
        ];

        $class_exams = ClassExamination::join('examinations', 'class_examination.examination_id', 'examinations.id')
            ->join('classes', 'class_examination.class_id', 'classes.id')->get();

        return view('admin.examination-marks.index', $title, compact('class_exams'));
    }

    public function class_students_marks($class_id)
    {
        $title = [
            'title' => 'SIS | Students'
        ];

        $class_courses = ClassCourse::join('courses', 'class_course.course_id', 'courses.id')
            ->join('classes', 'class_course.class_id', 'classes.id')->where('class_course.class_id', $class_id)->get();

        $students = Student::where('class_id', $class_id)->orderBy('name', 'ASC')->get();
        return view('admin.examination-marks.class-marks', $title, compact('students', 'class_courses'));
    }

    public function save_class_students_marks(Request $request)
    {

        $scores = $request->courses;
        // $marks_2 = $request->course_2;
        // $marks_3 = $request->course_3;
        // $marks_4 = $request->course_4;
        // $marks_5 = $request->course_5;
        // $marks_6 = $request->course_6;


        dd($scores);

        // $class_courses = ClassCourse::join('courses', 'class_course.course_id', 'courses.id')
        // ->join('classes', 'class_course.class_id', 'classes.id')->get();

        // $students = Student::where('class_id', $class_id)->orderBy('name', 'ASC')->get();
        // return view('admin.examination-marks.class-marks', $title, compact('students', 'class_courses'));
    }
}
