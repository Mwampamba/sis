<?php

namespace App\Http\Controllers\Auth;

use App\Models\Course;
use App\Models\NotesFolder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotesFolderController extends Controller
{
    public function index()
    {
        $title = [
            'title' => 'Notes Folders'
        ];

        if (Auth::user()->role == '1') {
            $folders = NotesFolder::orderBy('id', 'DESC')->get();

            return view('admin.notes-folders.index', $title, compact('folders'));
        } else if (Auth::user()->role == '0') {

            $folders = NotesFolder::join('courses', 'notes_folders.course_id', 'courses.id')
                ->join('course_user', 'notes_folders.course_id', 'course_user.course_id')
                ->select([
                    'courses.title',
                    'notes_folders.course_id'
                ])
                ->where('course_user.user_id', auth()->user()->id)
                ->get();

            return view('admin.notes-folders.index', $title, compact('folders'));
        }
    }
    public function create()
    {
        $title = [
            'title' => 'SIS | Add folder'
        ];

        $courses = Course::all();

        return view('admin.notes-folders.add-folder', $title, compact('courses'));
    }

    public function save(Request $request)
    {
        $folder = new NotesFolder();

        $folder->course_id = $request->course;

        $folder->save();
        return redirect()->route('notesFolders')->with('success', 'Notes Folder has been created successfully!');
    }

    public function view_folder_notes($folder_id)
    {
        $title = [
            'title' => 'SIS | Notes folder'
        ];

        if (Auth::user()->role == '1') {
            $folder = NotesFolder::findOrFail($folder_id);

            return view('admin.notes-folders.view-folder', $title, compact('folder'));
        }
    }

    public function createFolderFiles()
    {
        $title = [
            'title' => 'SIS | Add file'
        ];

        return view('admin.notes-folders.add-file', $title);
    }

    // public function saveFolderFile(FileRequestForm $request)
    // {
    //     $validatedData = $request->validated();
    //     $file = new File();

    //     $file->folder_id = $validatedData['folder_id'];
    //     if ($request->hasFile('file')) {
    //         $uploadPath = 'Notes' . '/';
    //         foreach ($request->file('file') as $notesFile) {
    //             $filename = $notesFile->getClientOriginalName();
    //             $notesFile->move($uploadPath, $filename);
    //             $finalFilePathName = $filename;

    //             $file->name = $finalFilePathName;
    //         }
    //     }

    //     $file->save();
    //     return redirect(route('files'))->with('message', 'File has been saved successfully!');
    // }

    public function destroy($folder_id)
    {
        $folder = NotesFolder::findOrFail($folder_id);

        $folder->delete();
        return redirect()->route('notesFolders')->with('success', 'Notes Folder has been delete successfully!');
    }
}
