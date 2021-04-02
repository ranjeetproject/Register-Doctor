<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;


class DoctorController extends Controller 
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','isDoctor']);
        
    }


    public function dashboard() {
        return view('frontend.doctor.dashboard');
    }

    public function profile(Request $request) {

       $form_name = 'profile';

        if($request->isMethod('post')){
            // dd($request->all());
         $data = $request->validate([
      "forename"=>"sometimes|nullable|required|min:3|max:100",
      "surname"=>"sometimes|nullable|required|min:3|max:100",
      "telephone1"=>"sometimes|nullable|required|digits:10",
      "profile_photo"=>"sometimes|nullable|image|mimes:jpeg,png,jpg|max:2048",
      "address"=>"sometimes|nullable|required",
      "dr_name_of_medical_licencer"=>"sometimes|nullable|required",
      "dr_medical_license_no"=>"sometimes|nullable|required",
      "dr_speciality"=>"sometimes|nullable|required",
      "dr_see"=>"sometimes|nullable|required",
      // "gender"=>"required",
      // "dob"=>"date|before_or_equal:".now()->subYears(13)->format('Y-m-d'),
     
      ],['required'=>'This field is required']);

// dd($request->all());

    // try {
     $user = Auth::guard('siteDoctor')->user();

      // if(!empty($request->email) && ($user->email != $request->email)){
      //     $request->validate([
      //     'email' => 'sometimes|nullable|required|unique:users,email',
      //   ]);
      //    }
     if(!empty($request->forename) ) $user->forename = $request->forename;
     if(!empty($request->surname) ) $user->surname = $request->surname;
     if(!empty($request->forename) && !empty($request->surname)) $user->name = $request->forename.' '.$request->surname;
     // if(!empty($request->email) && ($user->email != $request->email)) $user->email = $request->email;
      
     
    

    $profile = UserProfile::where('user_id',$user->id)->first();
     $profile = $profile ?? new UserProfile;
     
     $profile->user_id = $user->id;

       if(!empty($request->dr_speciality) ) $profile->dr_speciality = $request->dr_speciality;
       if(!empty($request->about) ) $profile->about = $request->about;
       if(!empty($request->dr_experience) ) $profile->dr_experience = $request->dr_experience;
       if(!empty($request->dr_qualifications) ) $profile->dr_qualifications = $request->dr_qualifications;
       if(!empty($request->dr_medical_license_no) ) $profile->dr_medical_license_no = $request->dr_medical_license_no;
       if(!empty($request->dr_name_of_medical_licencer) ) $profile->dr_name_of_medical_licencer = $request->dr_name_of_medical_licencer;
       if(!empty($request->dr_registered_no) ) $profile->dr_registered_no = $request->dr_registered_no;


       if(!empty($request->dr_standard_fee) ) $profile->dr_standard_fee = $request->dr_standard_fee;
       if(!empty($request->dr_live_video_fee) ) $profile->dr_live_video_fee = $request->dr_live_video_fee;
       if(!empty($request->dr_live_chat_fee) ) $profile->dr_live_chat_fee = $request->dr_live_chat_fee;
       if(!empty($request->dr_qa_fee) ) $profile->dr_qa_fee = $request->dr_qa_fee;
       // if(!empty($request->dr_qa_fee_notification)) $profile->dr_qa_fee_notification = $request->dr_qa_fee_notification;
       if($request->form_name=='profile'){
       $profile->dr_live_video_fee_notification = ($request->dr_live_video_fee_notification == null) ? 1:0;
       $profile->dr_standard_fee_notification = ($request->dr_standard_fee_notification == null) ? 1:0;
       $profile->dr_live_chat_fee_notification = ($request->dr_live_chat_fee_notification == null) ? 1:0;
       $profile->dr_qa_fee_notification = ($request->dr_qa_fee_notification == null) ? 1:0;

        $profile->dr_ratings_comments = ($request->dr_ratings_comments == null) ? 1:0;
      }

       // dd($request->profile);

       if(!empty($request->dr_see) ) $profile->dr_see = $request->dr_see;
       if(!empty($request->dr_signature) ) $profile->dr_signature = $request->dr_signature;

       if(!empty($request->dr_turnaround_time) && !empty($request->dr_turnaround_time_type)) $profile->dr_turnaround_time = $request->dr_turnaround_time.' '.$request->dr_turnaround_time_type;


       if(!empty($request->telephone1) ) $profile->telephone1 = $request->telephone1;
       if(!empty($request->telephone2) ) $profile->telephone2 = $request->telephone2;
       if(!empty($request->address) ) $profile->address = $request->address;
       if(!empty($request->account_number) ) $profile->account_number = $request->account_number;
       if(!empty($request->sort_code) ) $profile->sort_code = $request->sort_code;
       if(!empty($request->account_name) ) $profile->account_name = $request->account_name;
       if(!empty($request->bank_name) ) $profile->bank_name = $request->bank_name;
       if(!empty($request->iban_or_swift_code) ) $profile->iban_or_swift_code = $request->iban_or_swift_code;
       
 
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
          // print_r($profile); exit;
        
          $profile->save();
           $user->save();
        
          Session::flash('Success-toastr','Profile Successfully updated');

       // } catch (\Exception $e) {
       //      Session::flash('Error-toastr', $e->getMessage());
       //  }
       //      return redirect()->back();
         $form_name = $request->form_name;
      }

        $user = Auth::guard('siteDoctor')->user();
        // return $user->profile->dr_qa_fee_notification;
        return view('frontend.doctor.profile', compact('user','form_name'));
       
    }

    public function changePassword(Request $request)
    {
        if($request->isMethod('post')){
         $data = $request->validate([
             "old_password"=>"required",
             "new_password"=>"required|min:6",
             "confirm_password"=>"required|same:new_password",
         ]);

          $user = Auth::guard('siteDoctor')->user();

         if (isset($request->old_password) && !empty($request->old_password)) {
        if (!(Hash::check($request->old_password, Auth::guard('siteDoctor')->user()->password))) {
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
        return view('frontend.doctor.change_password');
    }

    public function handyDocument(Request $request)
    {
        return view('frontend.doctor.handy_document');
    }

    public function getThumbsUp(Request $request)
    {
        return view('frontend.doctor.get_thumbsUp');
    }

     public function appointment(Request $request)
    {
        return view('frontend.doctor.appointment');
    }

     public function sendPatientMessage(Request $request)
    {
        return view('frontend.doctor.send_patient_message');
    }

     public function createPrescription(Request $request)
    {
        return view('frontend.doctor.create_prescription');
    }

     public function prescriptionIssues(Request $request)
    {
        return view('frontend.doctor.prescription_issues');
    }

     public function closeCases(Request $request)
    {
        return view('frontend.doctor.close_cases');
    }



}