<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Mail\AfterVerificationMailForDoc;
use App\Mail\CompleteRegistration;
use App\Mail\ForgotPassword;
use App\Mail\Registration;
use App\Models\OtpVerification;
use App\Models\Role;
use App\Models\UserProfile;
use App\Models\UserRole;
use App\Models\Cms;
use App\Models\ChildToAdult;
use App\Notifications\UserNotification;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Redirect;
use Session;
use Validator;

class UserController extends Controller
{
    function dashboard()
    {
    	 return view('user.index');
    }


    function login(Request $request)
    {
      if( Auth::guard('sitePatient')->user() ) {
        return redirect()->route('patientDashboard');
      }
      if( Auth::guard('siteDoctor')->user() ) {
        return redirect()->route('doctorDashboard');
      }
      if( Auth::guard('sitePharmacist')->user() ) {
        return redirect()->route('pharmacistDashboard');
      }
      if ( $request->all() ) {
        $validator = $request->validate(
        [
        "email"=>"required|email",
        "password"=>"required|min:6",
        ],[
        "email.email" => "Enter valid email addess.",
        "password.min" => "Minimum value is 6 chareacter."
        ]
        );
        // if(!$validator->fails()){
        $user_info = array(
        "email"=>$request->email,
        "password"=>$request->password,
        );
        if($request->user_type == '1') {
          if (Auth::guard("sitePatient")->attempt($user_info) && Auth::attempt($user_info) ) {
            $user_details = Auth::guard("sitePatient")->user();
            return redirect()->route('patientDashboard');
          }else {
            return redirect()->back()->withErrors([
              'credentials' => 'Please, check your credentials'
            ]);
          }
        }
        if($request->user_type == '2') {
          if (Auth::guard("siteDoctor")->attempt($user_info) && Auth::attempt($user_info) ) {
            $user_details = Auth::guard("siteDoctor")->user();
            return redirect()->route('doctorDashboard');
          }else {
            return redirect()->back()->withErrors([
              'credentials' => 'Please, check your credentials'
            ]);
          }
        }
        if($request->user_type == '3') {
          if (Auth::guard("sitePharmacist")->attempt($user_info) && Auth::attempt($user_info) ) {
            $user_details = Auth::guard("sitePharmacist")->user();
            return redirect()->route('pharmacistDashboard');
          }else {
            return redirect()->back()->withErrors([
              'credentials' => 'Please, check your credentials'
            ]);
          }
        }
      }
      return view('frontend.auth.login');
    }



    function registration(Request $request)
    {
        $get_privacy_policy = Cms::where('page_name','PRIVATE POLICY')->first();
      return view('frontend.registration', compact('get_privacy_policy'));
    }



    function createUser(Request $request)
    {

       $validator = $request->validate(
           [
              "user_type"=>"required",
              "forename"=>"required",
              "surname"=>"required",
              "email"=>"required|email|unique:users,email",
              "password"=>"required|min:6",
              "confirm_password"=>"required|same:password",
              // "terms_conditions"=>"required",
              "privacy_policy"=>"required",
            ],[
                'email.unique' => 'This email ID is already taken. Please use a different email ID',
                'terms_conditions.required'=>'Please read and tick to accept','privacy_policy.required'=>'Please read and tick to accept'
            ]
      );

        DB::beginTransaction();
    try {

      $user = new User;
      $user->registration_number = 'REGD'.date('YmdHis');
      $user->forename = $request->forename;
      $user->surname = $request->surname;
      $user->name = $request->forename.' '.$request->surname;
      $user->email = $request->email;
      $user->role = $request->user_type;
      $user->password = Hash::make($request->password);
      $user->save();
      $commission = Commission::latest()->first();
      $userProfile = new UserProfile;
      $userProfile->user_id = $user->id;
      if($request->user_type == 2 && $commission){

          $userProfile->commission = $commission->commission;
      }
      $userProfile->save();



         // $notifyDetails['title'] = 'New user Registration';
         // $notifyDetails['user_id'] = $user->id;
         // $notifyDetails['type'] = 'registration';
         // $notifyDetails['body'] = ucfirst($request->name).' Registration in your site';
         // $admin = User::whereRole(1)->first();
         // $admin->notify(new UserNotification($notifyDetails));

        DB::commit();
        Mail::to($request->email)->send(new Registration($user->id));
    	if(!empty($user->id)){
            // Session::flash('Success-sweet', 'Thank you for your Registration. Please check your email and activate your account.');
            Session::flash('Success-sweet', 'Please check your email to activate your account. If no welcome email appears please check your spam box or contact Admin@Registered-Doctor.com.');
          } else {
            Session::flash('Error-toastr', 'Something want wrong. Please try again.');
          }
          // if($user->role != 1){
          //   return redirect()->route('registration-step2', Crypt::encrypt($user->id));
          // } else {
             return redirect()->route('registration');
          // }


        } catch (\Exception $e) {
          // print_r($e->getMessage()); exit;
            Session::flash('Error-toastr', $e->getMessage());
            DB::rollback();
            return redirect()->back();
        }
    }


     function registrationStep2(Request $request,$id)
    {
       $user_id = Crypt::decrypt($id);
       $user = User::find($user_id);


      if ($request->isMethod('post')) {

       $validator = $request->validate(
           [
              "dr_gmc_licence"=>"sometimes|required",
              "telephone1"=>"sometimes|required",
              "pharmacy_name"=>"sometimes|required",
              "location"=>"sometimes|required",
           ],['telephone1.required'=>'contact number is required']
      );



        DB::beginTransaction();
    try {
      $userProfile = UserProfile::where('user_id',$user->id)->first();
      // dd($userProfile);
      if ($request->hasFile('dr_gmc_licence')) {
            $rand_val           = date('YMDHIS').rand(11111,99999);
            $image_file_name    = md5($rand_val);
            $file               = $request->file('dr_gmc_licence');
            $extension          = $request->file('dr_gmc_licence')->extension();
            $fileName           = $image_file_name.'.'.$extension;
            $destinationPath    = public_path().'/uploads/users/dr_gmc_licence/';
            $file->move($destinationPath,$fileName);
            // $profile->profile_photo = $fileName;
            $userProfile->dr_gmc_licence = $fileName;
          }

      $userProfile->pharmacy_name = $request->pharmacy_name;
      $userProfile->telephone1 = $request->telephone1;
      $userProfile->location = $request->location;
      $userProfile->save();

        // Mail::to($request->email)->send(new Registration($user->id));
        DB::commit();
            if(!empty($user->id)){
                Session::flash('Success-sweet', 'Successfully updated');
                return redirect()->route('registration');
            } else {
                Session::flash('Error-toastr', 'Something want wrong. Please try again.');
            }

        return redirect()->route('registration');
        } catch (\Exception $e) {
        //   print_r($e->getMessage()); exit;
            Session::flash('Error-toastr', $e->getMessage());
            DB::rollback();
            return redirect()->back();
        }
      }


      return view('frontend.registration_step2', compact('user'));

    }


    public function emailVerification($id)
    {
          $user_id = Crypt::decrypt($id);
          $user = User::find($user_id);
          if($user->email_verified_at != null){
          return redirect()->route('login')->with('Info-sweet','Your email already verified.');
          }
          $user->email_verified_at = date('Y-m-d H:i:s');
            if($user->role == 1){
              $user->terms_conditions = date('Y-m-d H:i:s');
              $user->privacy_policy = date('Y-m-d H:i:s');
            }
            // 0:Admin, 1:Patients, 2:Doctor, 3:Pharmacy
        if ($user->save()) {
          if($user->role == 1){
          Mail::to($user->email)->send(new CompleteRegistration($user->id));
          return redirect()->route('login')->with('Success-sweet','Your email successfully verified.');
          }
          if($user->role == 2){
          Mail::to($user->email)->send(new AfterVerificationMailForDoc($user->id));
           // return redirect()->route('registration-step2', Crypt::encrypt($user->id));
          return redirect()->route('registration')->with('Success-sweet','Your email successfully verified.Please check the mail and upload GMC licence and complete profile.');
          }
            if($user->role == 3) {
          // Mail::to($user->email)->send(new AfterVerificationMailForDoc($user->id));
           return redirect()->route('registration-step2', Crypt::encrypt($user->id))->with('Success-sweet','Your email successfully verified.');
          }

        } else {
          return redirect()->route('login')->with('Error-sweet','Something went wrong.');
        }
    }


    public function acceptTermsAndConditions($id)
    {
          $user_id = Crypt::decrypt($id);
          $user = User::find($user_id);
          if($user->terms_conditions != null) {
          return redirect()->route('login')->with('Info-sweet','Already accepted.');
          }
          $user->terms_conditions = date('Y-m-d H:i:s');
          $user->privacy_policy = date('Y-m-d H:i:s');
        if ($user->save()) {
          Mail::to($user->email)->send(new CompleteRegistration($user->id));
          return redirect()->route('login')->with('Success-toastr','Successfully accepted.');
        } else {
          return redirect()->route('login')->with('Error-toastr','Something went wrong.');
        }
    }



    public function profile(Request $request)
    {
      if($request->isMethod('post')){
         $data = $request->validate([
      "name"=>"sometimes|required|min:3|max:100",
      "mobile"=>"sometimes|nullable|digits:11",
      "dob"=>"sometimes|nullable|date|before_or_equal:".now()->subYears(13)->format('Y-m-d'),
      "profile_photo"=>"sometimes|nullable|image|mimes:jpeg,png,jpg|max:2048",
      "old_password"=>"sometimes|nullable|required",
      "new_password"=>"sometimes|nullable|required|min:6",
      "confirm_password"=>"sometimes|nullable|required|same:new_password",
      ], ['dob.before_or_equal'=>'You must be 13 years old or above.']);


    try {
     $user = Auth::guard('sitePatient')->user();
      if(!empty($request->email) && ($user->email != $request->email)){
          $request->validate([
          'email' => 'sometimes|nullable|required|unique:users,email',
        ]);
         }
     if(!empty($request->name) ) $user->name = $request->name;
     if(!empty($request->email) && ($user->email != $request->email)) $user->email = $request->email;
      if (isset($request->old_password) && !empty($request->old_password)) {
        if (!(Hash::check($request->old_password, Auth::guard('sitePatient')->user()->password))) {
            Session::flash('Error-toastr', 'Your old password does not matches');
           return redirect()->back();
        } elseif (!empty($request->new_password)){
        $user->password = Hash::make($request->new_password);
        }
      }

     $user->save();
     $profile = UserProfile::where('user_id',$user->id)->first();
     $profile = $profile ?? new UserProfile;
     $profile->user_id = $user->id;

     if(!empty($request->dob) ) $profile->dob = $request->dob;
     if(!empty($request->mobile) ) $profile->mobile = $request->mobile;
     if(!empty($request->gender) ) $profile->gender = $request->gender;
     if(!empty($request->address) ) $profile->address = $request->address;
     if(!empty($request->about) ) $profile->about = $request->about;

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
      $user = Auth::user();
      return view('user.profile', compact('user'));
    }

    public function doctorProfile(Request $request, $id) {

        $form_name = 'profile';
        // $user_id = Crypt::decrypt($id);
        $user_id = $id;

         if($request->isMethod('post')){
             $form_name = $request->form_name;

             // dd($request->all());
          $data = $request->validate([
            //    $validator = Validator::make($request->all(), [
            "forename"=>"sometimes|nullable|required|min:3|max:100",
            "surname"=>"sometimes|nullable|required|min:3|max:100",
            "telephone1"=>"sometimes|nullable|required|digits:11",
            "profile_photo"=>"sometimes|nullable|image|mimes:jpeg,png,jpg",//|max:2048
            "address"=>"sometimes|nullable|required",
            "dr_name_of_medical_licencer"=>"sometimes|nullable|required",
            "dr_medical_license_no"=>"sometimes|nullable|required",
            "dr_speciality"=>"sometimes|nullable|required",
            "dr_see"=>"sometimes|nullable|required",
            // "gender"=>"required",
            // "dob"=>"date|before_or_equal:".now()->subYears(13)->format('Y-m-d'),

            ],['required'=>'This field is required']);

            //  if ($validator->fails()) {
            //    Session::flash('Error-toastr','Please fill in all the fields before proceeding');
            //    return redirect()->back();
            //  }

 // dd($request->all());

     // try {
    //   $user = Auth::guard('siteDoctor')->user();

      $user = User::find($user_id);

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
        if(!empty($request->pincode) ) $profile->pincode = $request->pincode;
        if(!empty($request->location) ) $profile->location = $request->location;


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

        //    Session::flash('Success-toastr','Profile Successfully updated');

        // } catch (\Exception $e) {
        //      Session::flash('Error-toastr', $e->getMessage());
        //  }
             return redirect()->route('registration')->with('Success-sweet','Your Profile Successfully updated.Please wait for admin varification.');


       }

        //  $user = Auth::guard('siteDoctor')->user();
        $user = User::find($user_id);
         // return $user->profile->dr_qa_fee_notification;
        //  return view('frontend.doctor.profile', compact('user','form_name'));
         return view('frontend.profile', compact('user','form_name'));

     }

    function childToAdult($id, Request $request){
        // $user_id = Crypt::decrypt($id);
        // $user = User::find($user_id);
        if($request->isMethod('post')){

            $validator = $request->validate(
                [

                "email"=>"required|email|unique:users,email",
                "password"=>"required|min:6",
                "confirm_password"=>"required|same:password",
                // "terms_conditions"=>"required",
                //    "privacy_policy"=>"required",
                ],[
                    'email.unique' => 'This email ID is already taken. Please use a different email ID',
                    'terms_conditions.required'=>'Please read and tick to accept','privacy_policy.required'=>'Please read and tick to accept'
                ]
            );
            $user_id = Crypt::decrypt($request->user_id);
            $child = new ChildToAdult;
            $child->user_id = $user_id;
            $child->email = $request->email;
            $child->password = Hash::make($request->password);
            $child->save();
            return redirect()->route('login')->with('Success-toastr','Successfully added.');
        }
        // $user->terms_conditions = date('Y-m-d H:i:s');
        //   $user->privacy_policy = date('Y-m-d H:i:s');
        // if ($user->save()) {
        //   Mail::to($user->email)->send(new CompleteRegistration($user->id));
        //   return redirect()->route('login')->with('Success-toastr','Successfully accepted.');
        // } else {
        //   return redirect()->route('login')->with('Error-toastr','Something went wrong.');
        // }
        return view('frontend.child-to-adult',compact('id'));
    }

     function logout()
     {
      Auth::guard()->logout();
     	Session::flush();
     	return redirect()->route('home');
     }


}
