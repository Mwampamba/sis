<?php

namespace App\Http\Controllers\Auth;

use App\Models\Semester;
use App\Models\AcademicYear;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SemesterRequestForm;

class SemesterController extends Controller
{
    public function index()
    {
        $title = [
            'title' => 'SIS | Semesters'
        ];
        $semesters = Semester::orderBy('status', 'DESC')->get();

        return view('admin.semesters.index', $title, compact('semesters'));
    }

    public function create()
    {
        $title = [
            'title' => 'SIS | Add semester'
        ];

        $years = AcademicYear::all();

        return view('admin.semesters.add-semester', $title, compact('years'));
    }

    public function save(SemesterRequestForm $request)
    {
        $validatedData = $request->validated();

        $semester = new Semester();
        $semester->name = $validatedData['name'];
        $semester->academic_year_id = $validatedData['year'];
        $semester->description = $validatedData['description'];
        $semester->status = $request->status == true ? '1' : '0';

        $semester->save();
        return redirect()->route('semesters')->with('success', 'Semester has been added successfully!');
    }


    public function edit($semester_id)
    {
        $title = [
            'title' => 'SIS | Update semester'
        ];

        $semester = Semester::findOrFail($semester_id);
        $years = AcademicYear::all();
        return view('admin.semesters.edit-semester', $title, compact('semester', 'years'));
    }

    public function update(SemesterRequestForm $request, $semester_id)
    {
        $semester = Semester::findOrFail($semester_id);
        $validatedData = $request->validated();

        $semester->name = $validatedData['name'];
        $semester->academic_year_id = $validatedData['year'];
        $semester->description = $validatedData['description'];
        $semester->status = $request->status == true ? '1' : '0';

        $semester->update();
        return redirect()->route('semesters')->with('success', 'Semester has been updated successfully!');
    }

    public function destroy($Semester_id)
    {
        $Semester = Semester::findOrFail($Semester_id);
        $Semester->delete();
        return redirect()->route('semesters')->with('delete', 'Semester has been deleted successfully!');
    }
}
