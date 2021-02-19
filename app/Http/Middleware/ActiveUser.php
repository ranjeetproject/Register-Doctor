<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;

class ActiveUser
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
    
        if (Auth::check() && Auth::user()->notBlock()) {
          return $next($request);
        }else{
            Session::flush();
            $role = Auth::user()->role;
            switch ($role) {
                case '1':
                    Auth::guard("sitePatient")->logout();
                    return redirect()->route('login')->with('Info-sweet','Your profile has been blocked by admin');
                   break;
                case '2':
                    Auth::guard("siteDoctor")->logout();
                    return redirect()->route('login')->with('Info-sweet','Your profile has been blocked by admin');
                   break;
                case '3':
                    Auth::guard("sitePharmacist")->logout();
                    return redirect()->route('login')->with('Info-sweet','Your profile has been blocked by admin');
                    break;          
                default:
                    Auth::guard("sitePatient")->logout();
                    return redirect()->route('login')->with('Info-sweet','Your profile has been blocked by admin');
                   break;
            }
        }
        return redirect()->route('login')->with('Info-sweet','Your profile has been blocked by admin');
    }
}