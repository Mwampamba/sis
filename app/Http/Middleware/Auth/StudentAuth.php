<?php

namespace App\Http\Middleware\Auth;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('student')->check()) {
            if ((!auth()->guard('student')->id())) {
                return redirect()->route('getLogin')->with('error', 'You have to login to access the page');
            } else {
                return redirect()->route('getLogin')->with('error', 'You do not have permission to access the page');
            }
        }
        return $next($request);
    }
}
