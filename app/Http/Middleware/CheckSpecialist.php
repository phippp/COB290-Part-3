<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckSpecialist
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
        if(!($request->user()->employee->job->type == "Specialist")){
            if($request->wantsJSON()) {
                return response()->json(['Message','You dont have access to this!'],403);
            }
            abort(403,'You do not have access to this!');
        }
        return $next($request);
    }
}
