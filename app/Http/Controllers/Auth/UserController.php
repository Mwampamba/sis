<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Course;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Imports\LecturerImport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\Auth\UserRequestForm;

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


    public function profile($staff_id)
    {
        $title = [
            'title' => 'SIS | Profile'
        ];

        $staff = User::findOrFail(Auth::user()->id);

        return view('admin.profile', $title, compact('staff'));
    }


    public function index()
    {
        $title = [
            'title' => 'SIS | Staffs'
        ];

        $staffs = User::orderBy('id', 'DESC')->get();
        return view('admin.staffs.index', $title, compact('staffs'));
    }

    public function create()
    {
        $title = [
            'title' => 'SIS | Add lecturer'
        ];

        $departments = Department::all();

        return view('admin.staffs.add-staff', $title, compact('departments'));
    }

    public function save(UserRequestForm $request)
    {
        $default_password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $validatedData = $request->validated();

        $user = new User;
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->department_id = $validatedData['department'];
        $user->staff_id = $validatedData['staffID'];
        $user->phone = $validatedData['phone'];
        $user->role = $validatedData['role'];
        $user->password = $default_password;

        $user->save();
        return redirect()->route('staffs')->with('success', 'Lecturer has been added successfully!');
    }

    public function edit($staff_id)
    {
        $staff = User::findOrFail($staff_id);
        $departments = Department::all();

        if ($staff) {
            return view('admin.staffs.edit-staff', compact('staff', 'departments'));
        } else {
            return back()->with('message', 'No such staff record founded!');
        }
    }

    public function update(UserRequestForm $request, $staff_id)
    {
        $validatedData = $request->validated();

        $user = User::findOrFail($staff_id);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->department_id = $validatedData['department'];
        $user->staff_id = $validatedData['staffID'];
        $user->phone = $validatedData['phone'];
        $user->role = $validatedData['role'];

        $user->update();
        return redirect()->route('staffs')->with('success', 'Lecturer has been updated successfully!');
    }

    public function destroy($staff_id)
    {
        $user = User::findOrFail($staff_id);

        $user->delete();
        return redirect()->route('staffs')->with('delete', 'Lecturer has been deleted successfully!');
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


    public function profile_update(UserRequestForm $request, $staff_id)
    {
        $validatedData = $request->validated();
        dd($validatedData);
        $old_password = $validatedData['old_password'];

        $user = User::findOrFail($staff_id);

        $results = $user->where('password', $old_password)->get();
        

        if ($results) {
            $new_password = $validatedData['new_password'];
            $confirm_password = $validatedData['confirm_password'];

            if ($new_password === $confirm_password) {

                User::where('email', $request->email)->update([
                    'password' => Hash::make($new_password)
                ]);
                return redirect()->route('profile')->with('success', 'Profile has been updated successfully!');
            } else {
                return back()->with('error', 'New password MUST match!');
            }
        } else {
            return back()->with('error', 'Wrong old password!');
        }
    }
}
