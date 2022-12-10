<?php

namespace App\Http\Controllers\Auth;

use App\Models\Classes;
use App\Models\Collage;
use App\Models\AcademicYear;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ClassRequestForm;
use App\Models\Programme;
use App\Models\Student;

class ClassController extends Controller
{
    public function index()
    {
        $title = [
            'title' => 'SIS | Classes'
        ];
        $classes = Classes::all();

        return view('admin.classes.index', $title, compact('classes'));
    }

    public function view_class_students($class_id)
    {
        $title = [
            'title' => 'SIS | Students'
        ];
        $students = Student::where('class_id', $class_id)->orderBy('name', 'ASC')->get();
        return view('admin.students.index', $title, compact('students'));
    }

    public function create()
    {
        $title = [
            'title' => 'SIS | Add class'
        ];

        $years = AcademicYear::all();
        $collages = Collage::all();
        $programmes = Programme::all();

        return view('admin.classes.add-class', $title, compact('years', 'collages', 'programmes'));
    }

    public function save(ClassRequestForm $request)
    {
        $validatedData = $request->validated();

        $class = new Classes();
        $class->name = $validatedData['name'];
        $class->programme_id = $validatedData['programme'];
        $class->collage_id = $validatedData['collage'];
        $class->academic_year_id = $validatedData['year'];
        $class->description = $validatedData['description'];

        $class->save();
        return redirect()->route('classes')->with('success', 'Class has been added successfully!');
    }

    public function edit($class_id)
    {
        $title = [
            'title' => 'SIS | Update class'
        ];

        $class = Classes::findOrFail($class_id);
        $collages = Collage::all();
        $years = AcademicYear::all();
        $programmes = Programme::all();

        return view('admin.classes.edit-class', $title, compact('class', 'years', 'collages','programmes'));
    }

    public function update(ClassRequestForm $request, $class_id)
    {
        $class = Classes::findOrFail($class_id);
        $validatedData = $request->validated();

        $class->name = $validatedData['name'];
        $class->programme_id = $validatedData['programme'];
        $class->collage_id = $validatedData['collage'];
        $class->academic_year_id = $validatedData['year'];
        $class->description = $validatedData['description'];

        $class->update();
        return redirect()->route('classes')->with('success', 'Class has been updated successfully!');
    }

    public function destroy($class_id)
    {
        $class = Classes::findOrFail($class_id);
        $class->delete();
        return redirect()->route('classes')->with('delete', 'Class has been deleted successfully!');
    }
}
