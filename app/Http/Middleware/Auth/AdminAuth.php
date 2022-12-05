<?php

namespace App\Http\Middleware\Auth;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
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
        if (auth()->check()) {
            if ((!auth()->user()->role == '1') && (!auth()->user()->role == '0')) {
                return redirect()->route('getLogin')->with('error', 'You do not have permission to access the page');
            }
        } else {
            return redirect()->route('getLogin')->with('error', 'You must log in to access the page');
        }
        return $next($request);
    }
}
