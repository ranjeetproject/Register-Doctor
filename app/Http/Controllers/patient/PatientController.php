<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;


class PatientController extends Controller 
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','isPatient']);
        
    }


    public function dashboard() {
        return view('frontend.patient.dashboard');
    }

    public function profile() {
        return view('frontend.patient.profile');
    }

}