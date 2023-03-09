<?php

namespace App\Http\Controllers\Auth;

use App\Models\Grade;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\GradeRequestForm;

class GradeController extends Controller
{
    public function index()
    {
        $title = [
            'title' => 'SIS | Grades'
        ];

        $grades = Grade::all();
        return view('admin.grades.index', $title, compact('grades'));
    }

    public function create()
    {
        $title = [
            'title' => 'SIS | Add grade'
        ];

        return view('admin.grades.add-grade', $title);
    }

    public function save(GradeRequestForm $request)
    {
        $validatedData = $request->validated();

        $grade = new Grade();
        $grade->grade_name = $validatedData['grade'];
        $grade->mark_from = $validatedData['mark_from'];
        $grade->mark_up_to = $validatedData['mark_up_to'];
        $grade->point = $validatedData['point'];
        $grade->remarks = $validatedData['remarks'];

        $grade->save();
        return redirect()->route('grades')->with('success', 'Grade has been added successfully!');
    }

    public function edit($grade_id)
    {
        $title = [
            'title' => 'SIS | Update grade'
        ];

        $grade = Grade::findOrFail($grade_id);
        return view('admin.grades.edit-grade', $title, compact('grade'));
    }

    public function update(GradeRequestForm $request, $grade_id)
    {
        dd($request);
        $validatedData = $request->validated();
        
        $grade = Grade::findOrFail($grade_id);

        $grade->grade_name = $validatedData['grade'];
        $grade->mark_from = $validatedData['mark_from'];
        $grade->mark_up_to = $validatedData['mark_up_to'];
        $grade->point = $validatedData['point'];
        $grade->remarks = $validatedData['remarks'];

        $grade->update();
        return redirect()->route('grades')->with('success', 'Grade has been updated successfully!');
    }

    public function destroy($grade_id)
    {
        $grade = Grade::findOrFail($grade_id);
        $grade->delete();
        return redirect()->route('grades')->with('error', 'Grade has been deleted successfully!');
    }
}
