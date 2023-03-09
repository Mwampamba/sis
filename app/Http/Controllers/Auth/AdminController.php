<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Auth\LoginRequestForm;

class AdminController extends Controller
{
    public function get_login()
    {
        return view('admin.auth.login');
    }

    public function post_login(LoginRequestForm $request)
    {
        if (Auth::attempt($request->only([
            'email', 'password'
        ]))) {
            return redirect()->route('dashboard');
        } else {

            if (Auth::guard('student')->attempt($request->only([
                'email', 'password'
            ]))) {
                return redirect()->route('studentDashboard');
            } else {
                return redirect()->back()->with('error', 'You have entered invalid credentials');
            }

            return redirect()->back()->with('error', 'You have entered invalid credentials');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('getLogin');
    }

    public function get_forgot_password()
    {
        $title = [
            'title' => 'SIS | Password recovery'
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
        $body = "You can reset your password by clicking the link below";

        Mail::send(
            'admin.auth.email-verification',
            ['activation_link' => $activation_link, 'body' => $body],
            function ($message) use ($request) {
                $message->from('noreplay@sis.ac.tz', 'Student Information System');
                $message->to($request->email, $request->email)
                    ->subject('Reset Password');
            }
        );

        return redirect()->back()->with('success', 'We have sent you recovery link to your email');
    }

    public function reset_password(Request $request, $token = null)
    {
        return view('admin.auth.update-password')->with(['token' => $token, 'email' => $request->email]);
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
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
            User::where('email', $request->email)->update([
                'password' => Hash::make($request->password)
            ]);

            $body = "You have successfully changed your SIS password. Thank you for using our application";
            $remote_address =  $request->ip();
            $current_date = now()->format('d-m-Y') . ', ' . now()->format('H:i:s');

            Mail::send(
                'admin.auth.password-update-verification',
                ['body' => $body, 'remote_address' =>  $remote_address, 'current_date' => $current_date],
                function ($message) use ($request) {
                    $message->from('noreplay@sis.ac.tz', 'Student Information System');
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
}
