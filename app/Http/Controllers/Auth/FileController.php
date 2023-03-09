<?php

namespace App\Http\Controllers\Auth;

use App\Models\NotesFile;
use App\Models\NotesFolder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\FileRequestForm;

class FileController extends Controller
{
    public function index()
    {
        $title = [
            'title' => 'SIS | Files'
        ];
        
        $files = DB::table('notes_folders')->select([
            'courses.title AS title',
            'notes_files.name',
            'courses.id'
        ])
        ->join('courses', 'notes_folders.course_id', 'courses.id')
        ->join('notes_files', 'notes_folders.course_id', 'notes_folders.course_id')
        ->where('notes_files.folder_id','notes_folders.course_id')
        ->get();

        return view('admin.files.index', $title, compact('files'));
    }

    public function create()
    {
        $title = [
            'title' => 'SIS | Add notes file'
        ];
        $folders = NotesFolder::all();

        return view('admin.files.add-file', $title, compact('folders'));
    }

    public function save(FileRequestForm $request)
    {
        $validatedData = $request->validated();
        $file = new NotesFile();
        $file->folder_id = $validatedData['folder_id'];
        if ($request->hasFile('file')) {
            $uploadPath = 'Notes' . '/';
            foreach ($request->file('file') as $notesFile) {
                $filename = $notesFile->getClientOriginalName();
                $notesFile->move($uploadPath, $filename);
                $finalFilePathName = $filename;

                $file->name = $finalFilePathName;
            }
        }
        $file->save();
        return redirect()->route('files')->with('success', 'File has been saved successfully!');
    }
}
