<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Str;
use App\Models\StudentLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function get_login()
    {
        return view('admin.auth.login');
    }

    public function post_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $validated_credentials = auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        if ($validated_credentials) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('error', 'You have entered invalid credentials');
        }
    }

    public function student_get_login()
    {
        return view('admin.auth.student-login');
    }

    public function student_post_login(Request $request)
    {
        
        $request->validate([
            'email' => 'required|email|exists:students,email',
            'password' => 'required'
        ]);

        $students_validated_credentials = auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        if ($students_validated_credentials) {
            return redirect()->route('studentDashboard');
        } else {
            return redirect()->back()->with('error', 'You have entered invalid credentials');
        }


        // $validated_credentials = Student::where('email', $request->email)->get();

        // if ($validated_credentials) {

        //     return redirect()->route('studentDashboard');
        // } else {
        //     return redirect()->back()->with('error', 'You have entered invalid credentials');
        // }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('getLogin');
    }

    public function get_forgot_password()
    {
        $title = [
            'title' => 'SIS | Forget password'
        ];
        return view('admin.auth.forget-password', $title);
    }

    public function post_forgot_password(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        $activation_link = route('resetPassword', [
            'token' => $token,
            'email' => $request->email,
        ]);
        $body = "You can now reset your password by clicking the link below";

        Mail::send(
            'admin.auth.email-verification',
            ['activation_link' => $activation_link, 'body' => $body],
            function ($message) use ($request) {
                $message->from('noreplay@domain.ac.tz', 'Student Information System');
                $message->to($request->email, 'Your Name')
                    ->subject('Reset Password');
            }
        );

        return redirect()->back()->with('success', 'We have sent password recovery into your email');
    }

    public function reset_password(Request $request, $token = null)
    {
        return view('admin.auth.update-password')->with(['token' => $token, 'email' => $request->email]);
    }


    /// Proceed from here

    public function update_password(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);

        $verified_token = DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();

        if (!$verified_token) {
            return back()->withInput()->with('error', 'Activation link is arleady expired!');
        } else {
            User::where('email', $request->email)->update([
                'password'=>Hash::make($request->password)
            ]);

            DB::table('password_resets')->where([
                'email'=>$request->email
            ])->delete();

            return redirect()->route('getLogin')->with('success', 'Your password has changed, you can now login with new credentials');
        }
    }
}
