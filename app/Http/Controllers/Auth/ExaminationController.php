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
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\ExaminationRequestForm;
use App\Models\LecturerCourse;

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
            'description' => $validatedData['description']
        ]);

        $classes = $validatedData['classes'];

        $exam = Examination::find($exam->id);

        if ($classes) {
            $exam->classes()->attach($classes);

            return redirect()->route('examinations')->with('success', 'Examination has been added successfully!');
        }
    }
}
