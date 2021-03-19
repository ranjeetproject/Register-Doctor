<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use App\Models\UserProfile;
use App\Models\FavouriteDoctor;
use App\Models\PatientCase;
use App\Models\CaseFile;
use App\UserDoctor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;


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
        $cases = PatientCase::latest()->paginate(10);
        return view('frontend.patient.save_cases', compact('cases'));
      
    }

    public function createCase(Request $request)
    {

        if($request->isMethod('post')) {
         $data = $request->validate([
             "health_problem"=>"required",
             "case_file"=>"image|mimes:jpeg,png,jpg,mp4,3gp,flv,mov,avi,wmv|max:10000",
         ]);

         $case = new PatientCase;
         $case->user_id = Auth::guard('sitePatient')->user()->id;
         $case->case_id = 'C'.Auth::guard('sitePatient')->user()->id.date('YmdHis');
         $case->health_problem = $request->health_problem;
         $case->save();

         if ($request->hasFile('case_file')) {
            $rand_val           = date('YMDHis').rand(11111,99999);
            $image_file_name    = md5($rand_val);
            $file               = $request->file('case_file');
            $extension          = $request->file('case_file')->extension();
            $fileName           = $image_file_name.'.'.$extension;
            $destinationPath    = public_path().'/uploads/cases/';
            $file->move($destinationPath,$fileName);
            $case_file = new CaseFile;
            $case_file->patient_case_id = $case->id;
            $case_file->file_name = $fileName;
            $case_file->save();
          }
        Session::flash('Success-toastr','Successfully created');
        return redirect()->route('patient.save-cases');
        }


        return view('frontend.patient.create_case');
      
    }

     public function medicalRecord(Request $request)
    {
        return view('frontend.patient.medical_record');
      
    }

    public function myFavoriteDoctors(Request $request)
    {
        // $doctors = UserDoctor::where('role',2)->paginate(5);
        $doctors_speciality = UserProfile::select('dr_speciality')->where('dr_speciality','!=',null)->orderBy('dr_speciality')->get()->toArray();

         $doctors_speciality = array_map("unserialize", array_unique(array_map("serialize", $doctors_speciality)));
         // return $doctors_speciality;
        $login_user = Auth::guard('sitePatient')->user();

        $doctors = $login_user->userFavDoc()->where('status',1)->with('doctor')->paginate(1);

        $search_doctors = '';
        if(!empty($request->dr_speciality)) {
           $search_doctors = User::where('role',2)->whereHas('profile',function($query) use($request){
            $query->where('dr_speciality',$request->dr_speciality);

           

            if(!empty($request->video_consult)){
              if($request->video_consult == 'live_video'){
              $query->where('dr_live_video_fee_notification', 1);
              }
              if($request->video_consult == 'live_chat'){
              $query->where('dr_live_chat_fee_notification', 1);
              }
              if($request->video_consult == 'qa'){
              $query->where('dr_qa_fee_notification', 1);
              }
            }

            if(!empty($request->dr_see)){
            $query->where('dr_see', $request->dr_see);
            }

           if(!empty($request->price)){
            $query->orderBy('dr_standard_fee', $request->price);
            }

           })->with('profile');

            if(!empty($request->prescribers)){
              if($request->prescribers == 'yes'){
                $search_doctors->where('admin_verified_at', '<>', null);
              }else{
                $search_doctors->where('admin_verified_at', null);
              }
            }

           $search_doctors = $search_doctors->paginate(5);
        }


        return view('frontend.patient.my-favorite-doctors', compact('doctors','doctors_speciality','search_doctors'));
    }


     public function addToFavorite(Request $request)
      {
        try{
        $login_user_id = Auth::guard('sitePatient')->user()->id;
        $get_fav_doc = FavouriteDoctor::where('user_id',$login_user_id)->where('favourite_user_id',$request->doctor_id)->first();

        $satus = '';
        $message = 'Successfully added';

        if($get_fav_doc){

          if($get_fav_doc->status == '1'){
            $get_fav_doc->status = '2';
            $message = 'Successfully removed';
          }else if($get_fav_doc->status == '2'){
            $get_fav_doc->status = '1';

          }

         $get_fav_doc->save();
        $satus = $get_fav_doc->status;

        }else{
         
         $fav_doctor = new FavouriteDoctor;
         $fav_doctor->user_id = $login_user_id;
         $fav_doctor->favourite_user_id = $request->doctor_id;
         $fav_doctor->save();
         $satus = $fav_doctor->status;

       }

      
             return response()->json(['success' =>true, 'message'=>$message,'data'=>$satus], 200);
          

           } catch (\Exception $e) {
              return response()->json(['success' =>false, 'message'=>'Something went worng.'], 401);
            }
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

    public function viewDoctorProfile($id)
    {
        $id = Crypt::decryptString($id);
        $doctor = User::findOrFail($id);
        return view('frontend.patient.view_doctor_profile',compact('doctor'));
      
    }



}