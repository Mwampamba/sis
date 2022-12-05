<?php

namespace App\Http\Controllers\Auth;

use App\Models\Classes;
use App\Models\Collage;
use App\Models\AcademicYear;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ClassRequestForm;

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

    public function create()
    {
        $title = [
            'title' => 'SIS | Add class'
        ];

        $years = AcademicYear::all();
        $collages = Collage::all();

        return view('admin.classes.add-class', $title, compact('years', 'collages'));
    }

    public function save(ClassRequestForm $request)
    {
        $validatedData = $request->validated();

        $class = new Classes();
        $class->name = $validatedData['name'];
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

        return view('admin.classes.edit-class', $title, compact('class', 'years', 'collages'));
    }

    public function update(ClassRequestForm $request, $class_id)
    {
        $class = Classes::findOrFail($class_id);
        $validatedData = $request->validated();

        $class->name = $validatedData['name'];
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
        return redirect()->route('classes')->with('success', 'Class has been deleted successfully!');
    }
}
