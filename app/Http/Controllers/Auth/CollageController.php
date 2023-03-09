<?php

namespace App\Http\Controllers\Auth;

use App\Models\Collage;
use App\Http\Controllers\Controller;;
use App\Http\Requests\Auth\CollageRequestForm;

class CollageController extends Controller
{
    public function index()
    {
        $title = [
            'title' => 'SIS | Collages'
        ];
        $collages = Collage::orderBy('created_at', 'DESC')->get();

        return view('admin.collages.index', $title, compact('collages'));
    }

    public function create()
    {
        $title = [
            'title' => 'SIS | Add collage'
        ];

        return view('admin.collages.add-collage', $title);
    }

    public function save(CollageRequestForm $request)
    {
        $validatedData = $request->validated();

        $collage = new Collage();
        $collage->name = $validatedData['name'];
        $collage->description = $validatedData['description'];

        $collage->save();
        return redirect()->route('collages')->with('success', 'Collage has been added successfully!');
    }

    public function edit($collage_id)
    {
        $title = [
            'title' => 'SIS | Update collage'
        ];

        $collage = Collage::findOrFail($collage_id);
        return view('admin.collages.edit-collage', $title, compact('collage'));
    }

    public function update(CollageRequestForm $request, $collage_id)
    {
        $collage = Collage::findOrFail($collage_id);
        $validatedData = $request->validated();

        $collage->name = $validatedData['name'];
        $collage->description = $validatedData['description'];

        $collage->update();
        return redirect()->route('collages')->with('success', 'Collage has been updated successfully!');
    }

    public function destroy($collage_id)
    {
        $collage = Collage::findOrFail($collage_id);
        $collage->delete();
        return redirect()->route('collages')->with('error', 'Collage has been deleted successfully!');
    }
}

