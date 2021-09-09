<?php

namespace App\Http\Controllers\common;

use App\Mail\ForgotPassword;
use App\Models\OtpVerification;
use App\User;
use App\Models\HandyDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Session;
use Response;
use Validator;
use Auth;

class CommHandyDocController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);

    }

    public function downloadHandyDoc($id)
    {
        $h_doc_id = Crypt::decrypt($id);
        $h_doc = HandyDocument::find($h_doc_id);
        $file = public_path()."/uploads/handydoc/".$h_doc->file_name;
        $headers = array('Content-Type: application/pdf',);
        return Response::download($file, $h_doc->topic_name.'.pdf',$headers);
        // $file = Storage::disk('public')->get($file_name);

        // return (new Response($file, 200))
        //       ->header('Content-Type', 'image/jpeg');
    }

    public function viewHandyDoc(Type $var = null)
    {
        # code...
    }

    public function setTimeZone(Request $request)
    {
        $user_profile = Auth::user()->profile;
        $user_profile->time_zone = $request->time_zone;
        $user_profile->save();
        return back();
    }

}
