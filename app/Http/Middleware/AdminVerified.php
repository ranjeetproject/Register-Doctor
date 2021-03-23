<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;

class AdminVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      // dd(Auth::user()->emailVerification());
        if (Auth::check() && Auth::user()->adminVerification()) {
            // echo 'string'; exit;
          return $next($request);
        }else{
            Session::flush();
            Auth::guard("sitePatient")->logout();
           return redirect()->route('login')->with('Warning-sweet','Your are not verified. Please wait for admin verification.');
        }

    }
}
