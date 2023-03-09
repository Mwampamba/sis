<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AcademicYearRequestForm;
use App\Models\AcademicYear;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{
    public function index()
    {
        $title = [
            'title' => 'SIS | Academic years'
        ];
        $years = AcademicYear::where('status', '1')->orderBy('created_at', 'DESC')->get();
        return view('admin.academic-years.index', $title, compact('years'));
    }

    public function create()
    {
        $title = [
            'title' => 'SIS | Add academic year'
        ];

        return view('admin.academic-years.add-year', $title);
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
        return view('admin.academic-years.edit-year', $title, compact('year'));
    }

    public function update(Request $request, $year_id)
    {
        $year = AcademicYear::findOrFail($year_id);
        $year->name = $request->name;
        $year->description = $request->description;
        $year->status = $request->status == true ? '1' : '0';

        $year->update();
        return redirect()->route('academicYears')->with('success', 'Academic year has been updated successfully!');
    }


    public function deactivated_academic_years()
    {
        $title = [
            'title' => 'SIS | Deactivated academic years'
        ];
        $years = AcademicYear::where('status', '0')->orderBy('created_at', 'DESC')->get();
        return view('admin.academic-years.archive', $title, compact('years'));
    }

    public function deactivate($year_id)
    {
        $year = AcademicYear::findOrFail($year_id);

        if ($year) {
            $year->status = '0';
            $year->update();
            return redirect()->route('academicYears')->with('error', 'Academic year has been deactivated');
        }

    }

    public function restore_academic_year($year_id)
    {
        $year = AcademicYear::findOrFail($year_id);
        if ($year) {
            $year->status = '1';
            $year->save();

            return redirect()->route('academicYears')->with('success', 'Academic year has been restored successfully!');
        }
    }

    public function destory($year_id)
    {
        $year = AcademicYear::findOrFail($year_id);
        if ($year) {
            $year->delete();

            return redirect()->route('academicYears')->with('error', 'Academic year has been deleted permanent!!');
        }
    }
}
