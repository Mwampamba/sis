<?php

namespace App\Http\Controllers\Auth;

use App\Models\Classes;
use App\Models\ExamType;
use App\Models\Semester;
use App\Models\Examination;
use App\Models\AcademicYear;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ExaminationRequestForm;

class ExaminationController extends Controller
{
    public function index()
    {
        $title = [
            'title' => 'SIS | Examinations'
        ];
        $exams = Examination::where('status', true)->orderBy('created_at', 'DESC')->get();

        return view('admin.examinations.index', $title, compact('exams'));
    }

    public function create()
    {
        $title = [
            'title' => 'SIS | Add examination'
        ];

        $exam_types = ExamType::all();
        $semesters = Semester::where('status', true)->orderBy('created_at', 'DESC')->get();
        $years = AcademicYear::where('status', true)->orderBy('created_at', 'DESC')->get();
        $classes = Classes::where('status', true)->get(); 

        return view('admin.examinations.add-exam', $title, compact('exam_types', 'semesters', 'years', 'classes'));
    }

    public function save(ExaminationRequestForm $request)
    {
        $validatedData = $request->validated();

        $exam_type = ExamType::findOrFail($validatedData['exam_type']);

        $exam = $exam_type->examinations()->create([
            'exam_name' => $validatedData['exam_name'],
            'exam_type_id' => $validatedData['exam_type'],
            'semester_id' => $validatedData['semester'],
            'academic_year_id' => $validatedData['year'],
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

    public function edit($exam_id)
    {
        $title = [
            'title' => 'SIS | Update examination'
        ];

        $exam = Examination::findOrFail($exam_id);

        if ($exam) {

            $exam_types = ExamType::all();
            $semesters = Semester::orderBy('id', 'DESC')->get();
            $years = AcademicYear::orderBy('id', 'DESC')->get();
            $classes = Classes::all();

            return view('admin.examinations.edit-exam', $title, compact('exam', 'semesters', 'exam_types', 'classes', 'years'));
        }
    }

    public function update(ExaminationRequestForm $request, $exam_id)
    {
        $exam = Examination::findOrFail($exam_id);

        if ($exam) {
            $validatedData = $request->validated();

            $exam_type = ExamType::findOrFail($validatedData['exam_type']);

            $exam = $exam_type->examinations()->update([
                'exam_name' => $validatedData['exam_name'],
                'exam_type_id' => $validatedData['exam_type'],
                'semester_id' => $validatedData['semester'],
                'academic_year_id' => $validatedData['year'],
                'status' => $validatedData['status']
            ]);

            $classes = $validatedData['classes'];

            $exam = Examination::find($exam->id);

            if ($classes) {
                $exam->classes()->attach($classes);

                return redirect()->route('examinations')->with('success', 'Examination has been added successfully!');
            }
        }
    }

    public function deactivated_examinations()
    {
        $title = [
            'title' => 'SIS | Deactived examinations'
        ];
        $exams = Examination::where('status', 0)->orderBy('created_at', 'DESC')->get();

        return view('admin.examinations.archive', $title, compact('exams'));
    }

    public function deactivate_examination($exam_id)
    {
        $examination = Examination::findOrFail($exam_id);

        if ($examination) {
            $examination->status = false;
            $examination->update();
            return redirect()->route('examinations')->with('error', 'Examination has been deactivated!');
        }
    }

    public function restore_examination($exam_id)
    {
        $exam = Examination::findOrFail($exam_id);

        if ($exam) {
            $exam->status = '1';
            $exam->update();
            return redirect()->route('examinations')->with('success', 'Examination has been activated!');
        }
    }

    public function destroy($exam_id)
    {
        $exam = Examination::findOrFail($exam_id);

        if ($exam) {
            $exam->status = true;
            $exam->update();
            return redirect()->route('examinations')->with('success', 'Examination has been activated!');
        }
    }
}
