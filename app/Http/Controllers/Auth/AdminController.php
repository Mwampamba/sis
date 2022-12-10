<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return view('admin.auth.student_login');
    }

    public function student_post_login(Request $request)
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
            return redirect()->route('studentDashboard');
        } else {
            return redirect()->back()->with('error', 'You have entered invalid credentials');
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('getLogin');
    }
}
