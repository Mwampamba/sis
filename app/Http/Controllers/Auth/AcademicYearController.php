<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AcademicYearRequestForm;
use App\Models\AcademicYear;

class AcademicYearController extends Controller
{
    public function index()
    {
        $title = [
            'title' => 'SIS | Academic years'
        ];
        $years = AcademicYear::orderBy('id', 'DESC')->get();
        return view('admin.academic_years.index', $title, compact('years'));
    }

    public function create()
    {
        $title = [
            'title' => 'SIS | Add academic year'
        ];

        return view('admin.academic_years.add-year', $title);
    }

    public function save(AcademicYearRequestForm $request)
    {
        $validatedData = $request->validated();

        $year = new AcademicYear();
        $year->name = $validatedData['name'];
        $year->description = $validatedData['description'];
        $year->status = $request->status == true ? '1' : '0';

        $year->save();
        return redirect()->route('academicYears')->with('success', 'Academic year has been added successfully!');
    }

    public function edit($year_id)
    {
        $title = [
            'title' => 'SIS | Update academic year'
        ];

        $year = AcademicYear::findOrFail($year_id);
        return view('admin.academic_years.edit-year', $title, compact('year'));
    }

    public function update(AcademicYearRequestForm $request, $year_id)
    {
        $year = AcademicYear::findOrFail($year_id);
        $validatedData = $request->validated();

        $year->name = $validatedData['name'];
        $year->description = $validatedData['description'];
        $year->status = $request->status == true ? '1' : '0';

        $year->update();
        return redirect()->route('academicYears')->with('success', 'Academic year has been updated successfully!');
    }

    public function destroy($year_id)
    {
        $year = AcademicYear::findOrFail($year_id);
        $year->delete();
        return redirect()->route('academicYears')->with('success', 'Academic year has been deleted successfully!');
    }
}
