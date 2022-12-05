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

        $admin_validated = auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
            'role' => 1
        ]);

        $lecturer_validated = auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
            'role' => 0
        ]);

        if ($admin_validated) {
            return redirect()->route('dashboard');
        } elseif ($lecturer_validated) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('getLogin')->with('success', 'You are now logged out');
    }
}
