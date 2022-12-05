<?php

namespace App\Http\Controllers\Auth;

use App\Models\Collage;
use App\Models\Programme;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ProgrammeRequestForm;

class ProgrammeController extends Controller
{
    public function index()
    {
        $title = [
            'title' => 'SIS | Programmes'
        ];
        $programmes = Programme::orderBy('id', 'DESC')->get();

        return view('admin.programmes.index', $title, compact('programmes'));
    }

    public function create()
    {
        $title = [
            'title' => 'SIS | Add programme'
        ];

        $collages = Collage::all();

        return view('admin.programmes.add-programme', $title, compact('collages'));
    }

    public function save(ProgrammeRequestForm $request)
    {
        $validatedData = $request->validated();

        $programme = new Programme();
        $programme->name = $validatedData['name'];
        $programme->collage_id = $validatedData['collage'];
        $programme->description = $validatedData['description'];
        $programme->status = $request->status == true ? '1' : '0';

        $programme->save();
        return redirect()->route('programmes')->with('success', 'Collage has been added successfully!');
    }

    public function edit($programme_id)
    {
        $title = [
            'title' => 'SIS | Update programme'
        ];

        $collages = Collage::all();
        $programme = Programme::findOrFail($programme_id);
        return view('admin.programmes.edit-programme', $title, compact('programme', 'collages'));
    }

    public function update(ProgrammeRequestForm $request, $programme_id)
    {
        $programme = Programme::findOrFail($programme_id);
        $validatedData = $request->validated();

        $programme->name = $validatedData['name'];
        $programme->collage_id = $validatedData['collage'];
        $programme->description = $validatedData['description'];
        $programme->status = $request->status == true ? '1' : '0';

        $programme->update();
        return redirect()->route('programmes')->with('success', 'Programme has been updated successfully!');
    }

    public function destroy($programme_id)
    {
        $programme = Programme::findOrFail($programme_id);
        $programme->delete();
        return redirect()->route('programmes')->with('delete', 'Programme has been deleted successfully!');
    }

}
