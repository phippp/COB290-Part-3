<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                //overwritten redirect when logged in
                if(auth()->user()->employee->job->type == "Specialist"){
                    return redirect()->route('specialist');
                } else if(auth()->user()->employee->job->type == "User"){
                    return redirect()->route('client');
                } else if(auth()->user()->employee->job->type == "Analyst"){
                    return redirect()->route('analyst');
                }
            }
        }

        return $next($request);
    }
}
