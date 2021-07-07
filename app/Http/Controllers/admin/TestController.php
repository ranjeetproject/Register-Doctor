<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use App\Models\UserProfile;
use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use Validator;

class TestController extends Controller
{
    function video_call()
    {
    	 return view('admin.video_call_test');
    }


}
