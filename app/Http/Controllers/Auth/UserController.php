<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Course;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\LecturerCourse;
use App\Imports\LecturerImport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function dashboard()
    {
        $title = [
            'title' => 'SIS | Dashboard'
        ];

        $students = Student::all()->count();
        $lecturers = User::all()->count();
        $classes = Classes::all()->count();
        $courses = Course::all()->count();

        return view('admin.dashboard', $title, compact('students', 'lecturers', 'classes', 'courses'));
    }

    public function index()
    {
        $title = [
            'title' => 'SIS | Staffs'
        ];

        $staffs = User::orderBy('id', 'DESC')->get();
        return view('admin.staffs.index', $title, compact('staffs'));
    }

    public function staff_profile($staff_id)
    {
        $title = [
            'title' => 'SIS | Staff profile'
        ];
        $staff = User::findOrFail($staff_id);

        if ($staff) {
            $courses = LecturerCourse::join('users', 'course_user.user_id', 'users.id')
                ->join('class_courses', 'class_courses.course_id', 'course_user.course_id')
                ->join('courses', 'course_user.course_id', 'courses.id')->where('user_id', $staff->id)->get();
            return view('admin.staffs.profile', $title, compact('staff', 'courses'));
        } else {
            return back()->with('message', 'No such record founded!');
        }
    }

    public function create()
    {
        $title = [
            'title' => 'SIS | Add lecturer'
        ];

        $departments = Department::all();

        return view('admin.staffs.add-staff', $title, compact('departments'));
    }

    public function save(Request $request)
    {
        $user = new User;

        $password = Str::random(8);
        $hashed_password = Hash::make($password);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->department_id = $request->department;
        $user->staff_id = $request->staff_id;
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->password = $hashed_password;

        if ($request->hasfile('picture')) {

            $image_path = 'profile/staff/';
            $image_file = $request->file('picture');

            $extension = $image_file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $image_file->move($image_path, $filename);
            $final_image_path = $image_path . $filename;

            $user->picture = $final_image_path;
        }

        $user->save();

        $body = "You can now use this as your default password. Remember to change it";

        Mail::send(
            'admin.auth.default-password',
            ['password' => $password, 'body' => $body],
            function ($message) use ($request) {
                $message->from('sis@sis.ac.tz', 'Student Information System');
                $message->to($request->email, $request->name)
                    ->subject('Default Password');
            }
        );

        $user->save();
        return redirect()->route('staffs')->with('success', 'Lecturer has been added successfully!');
    }

    public function edit($staff_id)
    {
        $title = [
            'title' => 'SIS | Update staff'
        ];
        $staff = User::findOrFail($staff_id);
        $departments = Department::all();

        if ($staff) {
            return view('admin.staffs.edit-staff', $title, compact('staff', 'departments'));
        } else {
            return back()->with('message', 'No such staff record founded!');
        }
    }

    public function update(Request $request, $staff_id)
    {
        $user = User::findOrFail($staff_id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->department_id = $request->department;
        $user->staff_id = $request->staff_id;
        $user->phone = $request->phone;
        $user->role = $request->role; 

        if ($request->hasfile('picture')) {

            $image_path = 'profile/staff/';
            $image_file = $request->file('picture');

            $extension = $image_file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $image_file->move($image_path, $filename);
            $final_image_path = $image_path . $filename;

            $user->picture = $final_image_path;
        }

        $user->update();
        return redirect()->route('staffs')->with('success', 'Lecturer has been updated successfully!');
    }

    public function destroy($staff_id)
    {
        $user = User::findOrFail($staff_id);

        $user->delete();
        return redirect()->route('staffs')->with('error', 'Lecturer has been deleted successfully!');
    }


    public function bulk_add_staffs()
    {
        $title = [
            'title' => 'SIS | Add staff'
        ];

        return view('admin.staffs.bulk-add-staffs', $title);
    }

    public function bulk_save_staffs(Request $request)
    {

        Excel::import(new LecturerImport, $request->file);

        return redirect()->route('staffs')->with('success', 'Staff(s) has been added successfully!');
    }


    public function profile($staff_id)
    {
        $title = [
            'title' => 'SIS | Profile'
        ];

        $staff = User::find(Auth::user()->id);

        return view('admin.profile', $title, compact('staff'));
    }

    public function profile_update(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);

        $current_user = Auth::user();

        if (Hash::check($request->old_password, $current_user->password)) {
            $current_user->password = Hash::make($request->new_password);
            return redirect()->back()->with('success', 'Profile has been updated successfully!');
        } else {
            return back()->with('error', 'Old password is not corrent!');
        }
    }
}
