<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckOTPToken
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
        $validate_roles = array_intersect(['Administrator'], auth()->user()->roles()->get()->pluck('name')->toArray());
        if(count($validate_roles) === 0){
            return $next($request);
        }
        if(session('verify_otp') === true) {
            return $next($request);
        }
        return redirect()->route('frontend.auth.verify_otp');
    }
}
