<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;


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

    public function profile(Request $request) {
        if($request->isMethod('post')){
         $data = $request->validate([
      "forename"=>"required|min:3|max:100",
      "surname"=>"required|min:3|max:100",
      "telephone1"=>"required|digits:10",
      "gender"=>"required",
      "address"=>"required",
      "dob"=>"date|before_or_equal:".now()->subYears(13)->format('Y-m-d'),
      "profile_photo"=>"image|mimes:jpeg,png,jpg|max:2048",
      // "old_password"=>"sometimes|nullable|required",
      // "new_password"=>"sometimes|nullable|required|min:6",
      // "confirm_password"=>"sometimes|nullable|required|same:new_password",
      ], ['dob.before_or_equal'=>'You must be 13 years old or above.']);

// dd($request->all());

    try {
     $user = Auth::guard('sitePatient')->user();
      if(!empty($request->email) && ($user->email != $request->email)){
          $request->validate([
          'email' => 'sometimes|nullable|required|unique:users,email',
        ]);
         }
     if(!empty($request->forename) ) $user->forename = $request->forename;
     if(!empty($request->surname) ) $user->surname = $request->surname;
     if(!empty($request->forename) && !empty($request->surname)) $user->name = $request->forename.' '.$request->surname;
     if(!empty($request->email) && ($user->email != $request->email)) $user->email = $request->email;
      
     
     $user->save();
     $profile = UserProfile::where('user_id',$user->id)->first();
     $profile = $profile ?? new UserProfile;
     $profile->user_id = $user->id;

      $profile->dob = $request->dob;
      $profile->telephone1 = $request->telephone1;
      $profile->telephone2 = $request->telephone2;
      $profile->gender = $request->gender;
      $profile->address = $request->address;
      $profile->gp_name = $request->gp_name;
      $profile->gp_address = $request->gp_address;
      $profile->gp_telephone = $request->gp_telephone;
      $profile->gp_email = $request->gp_email;
      $profile->n_of_kin_name = $request->n_of_kin_name;
      $profile->n_of_kin_address = $request->n_of_kin_address;
      $profile->n_of_kin_relationship = $request->n_of_kin_relationship;
 
      if ($request->hasFile('profile_photo')) {
            $rand_val           = date('YMDHIS').rand(11111,99999);
            $image_file_name    = md5($rand_val);
            $file               = $request->file('profile_photo');
            $extension          = $request->file('profile_photo')->extension();
            $fileName           = $image_file_name.'.'.$extension;
            $destinationPath    = public_path().'/uploads/users/';
            $file->move($destinationPath,$fileName);
            $profile->profile_photo = $fileName;
          }
          $profile->save();
          Session::flash('Success-toastr','Profile Successfully updated');
       } catch (\Exception $e) {
            Session::flash('Error-toastr', $e->getMessage());
        }
            return redirect()->back();
      }


        $user = Auth::guard('sitePatient')->user();
        // return $user->profile;
        return view('frontend.patient.profile', compact('user'));
    }

    public function changePassword(Request $request)
    {
        if($request->isMethod('post')){
         $data = $request->validate([
             "old_password"=>"required",
             "new_password"=>"required|min:6",
             "confirm_password"=>"required|same:new_password",
         ]);

          $user = Auth::guard('sitePatient')->user();

         if (isset($request->old_password) && !empty($request->old_password)) {
        if (!(Hash::check($request->old_password, Auth::guard('sitePatient')->user()->password))) {
            Session::flash('Error-toastr', 'Your old password does not matches');
           return redirect()->back();
        } elseif (!empty($request->new_password)){
        $user->password = Hash::make($request->new_password);
        }
         }

         $user->save();
         Session::flash('Success-toastr','Your password successfully changed');
         return redirect()->back();

        }
        return view('frontend.patient.change_password');
    }


    public function saveCases(Request $request)
    {
        return view('frontend.patient.save_cases');
      
    }

     public function medicalRecord(Request $request)
    {
        return view('frontend.patient.medical_record');
      
    }

    public function myFavoriteDoctors(Request $request)
    {
        return view('frontend.patient.my-favorite-doctors');
      
    }


    public function requestedConsults(Request $request)
    {
        return view('frontend.patient.requested_consults');
      
    }

    public function closedCases(Request $request)
    {
        return view('frontend.patient.closed_cases');
      
    }

    public function prescriptionsIssued(Request $request)
    {
        return view('frontend.patient.prescriptions_issued');
      
    }

    public function pharmacies(Request $request)
    {
        return view('frontend.patient.pharmacies');
      
    }



}