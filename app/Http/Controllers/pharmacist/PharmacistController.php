<?php

namespace App\Http\Controllers\pharmacist;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Auth;


class PharmacistController extends Controller 
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','isPharmacist']);
        
    }


    public function dashboard() {
        return view('frontend.pharmacist.dashboard');
    }

}