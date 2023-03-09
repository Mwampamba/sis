<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequestForm;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class StudentAuthController extends Controller
{
    public function dashboard()
    {
        $title = [
            'title' => 'SIS | Dashboard'
        ];
        return view('admin.student-dashboard', $title);
    }

    public function get_login()
    {
        return view('admin.auth.student-login');
    }

    public function post_login(LoginRequestForm $request)
    {
        if (Auth::guard('student')->attempt($request->only([
            'email', 'password'
        ]))) {
            return redirect()->route('studentDashboard');
        } else {
            return redirect()->back()->with('error', 'You have entered invalid credentials');
        }
    }

    public function logout()
    {
        Auth::guard('student')->logout();
        return redirect()->route('getLogin');
    }

    public function get_forgot_password()
    {
        $title = [
            'title' => 'SIS | Password recovery'
        ];
        return view('admin.auth.student-forget-password', $title);
    }

    public function post_forgot_password(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:students,email'
        ]);

        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        $activation_link = route('studentResetPassword', [
            'token' => $token,
            'email' => $request->email,
        ]);
        $body = "You can now reset your password by clicking the link below";

        Mail::send(
            'admin.auth.email-verification',
            ['activation_link' => $activation_link, 'body' => $body],
            function ($message) use ($request) {
                $message->from('studentinfosystem@sis.ac.tz', 'Student Information System');
                $message->to($request->email, $request->name)
                    ->subject('Reset Password');
            }
        );

        return redirect()->back()->with('success', 'We have sent password recovery link to your email');
    }

    public function reset_password(Request $request, $token = null)
    {
        return view('admin.auth.student-update-password')->with(['token' => $token, 'email' => $request->email]);
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:students,email',
            'password' => 'required|min:8',
            'repeat_password' => 'required|same:password'
        ]);

        $verified_token = DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();

        if (!$verified_token) {
            return back()->withInput()->with('error', 'Activation link is arleady expired!');
        } else {
            Student::where('email', $request->email)->update([
                'password' => Hash::make($request->password)
            ]);

            $body = "You have successfully changed your SIS password. Thank you for using our application";
            $remote_address =  $request->ip();
            $current_date = now()->format('d-m-Y') . ', ' . now()->format('H:i:s');

            Mail::send(
                'admin.auth.password-update-verification',
                ['body' => $body, 'remote_address' =>  $remote_address, 'current_date' => $current_date],
                function ($message) use ($request) {
                    $message->from('studentinfosystem@uaut.ac.tz', 'Student Information System');
                    $message->to($request->email, $request->email)
                        ->subject('Password Changes');
                }
            );

            DB::table('password_resets')->where([
                'email' => $request->email
            ])->delete();

            return redirect()->route('getLogin')->with('success', 'Your password has changed, you can now login with new credentials');
        }
    }

    public function student_profile($student_id)
    {
        $title = [
            'title' => 'SIS | Profile'
        ];

        $student = Student::find(auth()->guard('student')->id());

        return view('admin.student-profile', $title, compact('student'));
    }


    public function profile_update(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);

        $current_user = Auth::guard('student');
        if (!Hash::check($request->old_password, 'password')) {
            $current_user->password = Hash::make($request->new_password);
            return redirect()->back()->with('success', 'Password has been updated successfully!');
        } else {
            return back()->with('error', 'Old password is not corrent!');
        }

        // $old_password = $request->old_password;

        // $student = Student::findOrFail(auth()->guard('student')->id());

        // $results = $student->where('password', $old_password)->get();

        // if ($results) {
        //     $new_password = $request->new_password;
        //     $confirm_password = $request->confirm_password;

        //     if ($new_password === $confirm_password) {

        //         Student::where('email', $request->email)->update([
        //             'password' => Hash::make($new_password)
        //         ]);
        //         return redirect()->back()->with('success', 'Profile has been updated successfully!');
        //     } else {
        //         return back()->with('error', 'New password MUST match!');
        //     }
        // } else {
        //     return back()->with('error', 'Wrong old password!');
        // }
    }

    public function evaluations()
    {
        $title = [
            'title' => 'SIS | Evaluations'
        ];
        return view('admin.evaluation-form', $title);
    }
}
