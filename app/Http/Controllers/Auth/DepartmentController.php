<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Http\Requests\Auth\DepartmentRequestForm;

class DepartmentController extends Controller
{
    public function index()
    {
        $title = [
            'title' => 'SIS | Departments'
        ];
        $departments = Department::orderBy('id', 'DESC')->get();

        return view('admin.departments.index', $title, compact('departments'));
    }

    public function create()
    {
        $title = [
            'title' => 'SIS | Add department'
        ];

        return view('admin.departments.add-department', $title);
    }

    public function save(DepartmentRequestForm $request)
    {
        $validatedData = $request->validated();

        $department = new Department();
        $department->name = $validatedData['name'];
        $department->description = $validatedData['description'];

        $department->save();
        return redirect()->route('departments')->with('success', 'Department has been added successfully!');
    }

    public function edit($department_id)
    {
        $title = [
            'title' => 'SIS | Update department'
        ];

        $department = Department::findOrFail($department_id);
        return view('admin.departments.edit-department', $title, compact('department'));
    }

    public function update(DepartmentRequestForm $request, $department_id)
    {
        $department = Department::findOrFail($department_id);
        $validatedData = $request->validated();

        $department->name = $validatedData['name'];
        $department->description = $validatedData['description'];

        $department->update();
        return redirect()->route('departments')->with('success', 'Department has been updated successfully!');
    }

    public function destroy($department_id)
    {
        $department = Department::findOrFail($department_id);
        $department->delete();
        return redirect()->route('departments')->with('error', 'Department has been deleted successfully!');
    }
}
