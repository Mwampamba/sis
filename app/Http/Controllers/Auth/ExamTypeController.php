<?php

namespace App\Http\Controllers\Auth;

use App\Models\ExamType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ExamTypeRequestForm;

class ExamTypeController extends Controller
{
    public function index()
    {
        $title = [
            'title' => 'SIS | Exam types'
        ];
        $exams = ExamType::orderBy('id', 'DESC')->get();

        return view('admin.exam-types.index', $title, compact('exams'));
    }

    public function create()
    {
        $title = [
            'title' => 'SIS | Add exam type'
        ];

        return view('admin.exam-types.add-exam', $title);
    }
    public function save(ExamTypeRequestForm $request)
    {
        $validatedData = $request->validated();

        $exam = new ExamType();
        $exam->exam_type = $validatedData['name'];
        $exam->description = $validatedData['description'];
        $exam->status = $request->status == true ? '1' : '0';

        $exam->save();
        return redirect()->route('examTypes')->with('success', 'Examination has been added successfully!');
    }


    public function edit($exam_id)
    {
        $title = [
            'title' => 'SIS | Update examination'
        ];

        $exam = ExamType::findOrFail($exam_id);
        return view('admin.exam-types.edit-exam', $title, compact('exam'));
    }

    public function update(ExamTypeRequestForm $request, $exam_id)
    {
        $exam = ExamType::findOrFail($exam_id);
        $validatedData = $request->validated();

        $exam->exam_type = $validatedData['name'];
        $exam->description = $validatedData['description'];
        $exam->status = $request->status == true ? '1' : '0';

        $exam->update();
        return redirect()->route('examTypes')->with('success', 'Examination has been updated successfully!');
    }

    public function destroy($exam_id)
    {
        $exam = ExamType::findOrFail($exam_id);
        $exam->delete();
        return redirect()->route('examTypes')->with('delete', 'Examination has been deleted successfully!');
    }
}
