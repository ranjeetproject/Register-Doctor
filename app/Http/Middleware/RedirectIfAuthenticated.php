<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        //dd(Auth::guard('siteDoctor')->user());
        
        if(Auth::guard('sitePatient')->check()){
            return redirect(RouteServiceProvider::PATIENT_HOME);
        }
        if (Auth::guard('siteDoctor')->check()) {
            return redirect(RouteServiceProvider::DOCTOR_HOME);
        }
        if (Auth::guard('sitePharmacist')->check()) {
            return redirect(RouteServiceProvider::PHARMACIST_HOME);
        }
        if (Auth::guard($guard)->check()) {
            return redirect('/');
        }
        return $next($request);
    }
}
