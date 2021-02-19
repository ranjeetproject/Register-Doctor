<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers; 
use Illuminate\Validation\ValidationException;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::PATIENT_HOME;
    
    protected function redirectTo()
    {
        $user=Auth::user();

        if($user->role == 1){
            return redirect(RouteServiceProvider::PATIENT_HOME);
        }if($user->role == 2){
            return redirect(RouteServiceProvider::DOCTOR_HOME);
        }if($user->role == 3){
            return redirect(RouteServiceProvider::PHARMACIST_HOME);
        }else{
            return '/';
        }

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    

    protected function guard($guard_name)
    {
        $this->guardName = $guard_name;
        return Auth::guard($this->guardName);
    }


//
    public function showLoginForm()
    {
        return view('frontend.auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);
        

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }
        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        if($request->user_type == '1'){
            if (Auth::guard("sitePatient")->attempt($this->credentials($request)) && Auth::attempt($this->credentials($request)) ) {
                return redirect(RouteServiceProvider::PATIENT_HOME);
            }
        }
        if($request->user_type == '2'){
            if (Auth::guard("siteDoctor")->attempt($this->credentials($request)) && Auth::attempt($this->credentials($request)) ) {
                return redirect(RouteServiceProvider::DOCTOR_HOME);
            }
        }
        if($request->user_type == '3'){
            if (Auth::guard("sitePharmacist")->attempt($this->credentials($request)) && Auth::attempt($this->credentials($request)) ) {
                return redirect(RouteServiceProvider::PHARMACIST_HOME);
            }
        }
        // if($request->user_type == '1'){
        //     return $this->guard('sitePatient')->attempt(
        //         $this->credentials($request), $request->filled('remember')
        //     );
        // }
        // if($request->user_type == '2'){
        //     return $this->guard('siteDoctor')->attempt(
        //         $this->credentials($request), $request->filled('remember')
        //     );
        // }
        // if($request->user_type == '3'){
        //     return $this->guard('sitePharmacist')->attempt(
        //         $this->credentials($request), $request->filled('remember')
        //     );
        // }
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        //dd($this->redirectPath());
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);
        if($request->user_type == '1') {

            return $this->authenticated($request, $this->guard('sitePatient')->user())
                    ?: redirect()->intended($this->redirectPath());
        }
        if($request->user_type == '2') {

            return $this->authenticated($request, $this->guard('siteDoctor')->user())
                    ?: redirect()->intended($this->redirectPath());
        }
        if($request->user_type == '3') {

            return $this->authenticated($request, $this->guard('sitePharmacist')->user())
                    ?: redirect()->intended($this->redirectPath());
        }
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        if($user->role == 1){
            return redirect(RouteServiceProvider::PATIENT_HOME);
        } else if($user->role == 2) {
            return redirect(RouteServiceProvider::DOCTOR_HOME);
        } else if($user->role == 3) {
            return redirect(RouteServiceProvider::PHARMACIST_HOME);
        } else {
            return '/';
        }
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'email';
    }

    ////


    public function logout(Request $request)
    {
        if(Auth::user()->role == 1) {
            Auth::guard('sitePatient')->logout();
        }
        if(Auth::user()->role == 2) {
            Auth::guard('siteDoctor')->logout();
        }
        if(Auth::user()->role == 3) {
            Auth::guard('sitePharmacist')->logout();
        }
        Auth::guard('web')->logout();
        $request->session()->flush();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
