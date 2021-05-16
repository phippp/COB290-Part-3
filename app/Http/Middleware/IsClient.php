<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsClient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!(auth()->user()->employee_id == $request->route()->parameter('problemlog')->client_id)){
            if($request->wantsJSON()) {
                return response()->json(['Message','This is not a problem created by you! As such you don\'t have access to this page.'],403);
            }
            abort(403,'This is not a problem created by you! As such you don\'t have access to this page.');
        }
        return $next($request);
    }
}
