<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use App\Models\BookTimeSlot;
use App\Models\CaseFile;
use App\Models\ChildsAccountsHolder;
use App\Models\DoctorAvailableDays;
use App\Models\DrugsDetails;
use App\Models\DrugsProblem;
use App\Models\FavouriteDoctor;
use App\Models\PastSymptoms;
use App\Models\PatientCase;
use App\Models\SymptromsDetails;
use App\Models\UserProfile;
use App\Models\WeeklyAvailableDays;
use App\User;
use App\UserDoctor;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
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
         // $data = $request->validate([
      $validator = Validator::make($request->all(), [ 
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


           if ($validator->fails()) { 

              Session::flash('Error-toastr','Please fill in all the fields before proceeding');
              return redirect()->back();
            }
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
        $cases = PatientCase::where('user_id',Auth::guard('sitePatient')->user()->id)->latest()->paginate(10);
        return view('frontend.patient.save_cases', compact('cases'));
      
    }

    public function createCase(Request $request)
    {

        if($request->isMethod('post')) {
         // $data = $request->validate([
          $validator = Validator::make($request->all(), [ 
             "health_problem"=>"required",
             "questions_type"=>"required",
             "case_file"=>"image|mimes:jpeg,png,jpg|max:2000",
         ]);

            if ($validator->fails()) { 
              // echo $validator->errors()->first(); exit;
              Session::flash('Error-toastr','Please fill in all the fields before proceeding');
              return redirect()->back();
            }
         // print_r($request->all()); exit;


         $case = new PatientCase;
         $case->user_id = Auth::guard('sitePatient')->user()->id;
         $case->case_id = 'C'.Auth::guard('sitePatient')->user()->id.date('YmdHis');
         $case->doctor_id = $request->doctor_id;
         $case->health_problem = $request->health_problem;
         $case->medicine_name = $request->medicine_name;
         $case->case_type = $request->case_type ?? 1;
         $case->questions_type = $request->questions_type;

         $booking_date = str_replace('/','-',$request->booking_date);
         $booking_date = date('Y-m-d',strtotime($booking_date));

         // echo $booking_date; exit;

         $case->booking_date = $booking_date;
         $case->booking_time = $request->booking_time;
         $case->time_duration = ($request->time_duration) ? $request->time_duration * 15 : '';
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

          if (isset($request->time_slot) && !empty($request->time_slot)) {

            foreach ($request->time_slot as $time_slot) {
             $booking_time_slot = new BookTimeSlot;
             $booking_time_slot->user_id = Auth::guard('sitePatient')->user()->id;
             $booking_time_slot->patient_case_id = $case->id;
             $booking_time_slot->time_slot_id = $time_slot;
             $booking_time_slot->save();
            }
            
          }

        Session::flash('Success-toastr','Successfully submited');
        if($request->questions_type == 1 || $request->questions_type == 2){
        return redirect()->route('patient.symptoms-checker',$case->case_id);
        }
        return redirect()->back();
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
            if($request->dr_speciality != 'all'){
            $query->where('dr_speciality',$request->dr_speciality);
            }

           

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
                $search_doctors = $search_doctors->appends(request()->query());
        }


        return view('frontend.patient.my-favorite-doctors', compact('doctors','doctors_speciality','search_doctors'));
    }


   public function showPrescriptionsRules(Request $request)
    {
      return view('frontend.patient.show-prescriptions-rules');
    }



    public function searchDoctors(Request $request)
    {
        // $doctors = UserDoctor::where('role',2)->paginate(5);
        $doctors_speciality = UserProfile::select('dr_speciality')->where('dr_speciality','!=',null)->orderBy('dr_speciality')->get()->toArray();

         $doctors_speciality = array_map("unserialize", array_unique(array_map("serialize", $doctors_speciality)));
         // return $doctors_speciality;
        $login_user = Auth::guard('sitePatient')->user();

        $doctors = User::where('role',2)->with('profile')->paginate(4);
        // return $doctors;

        $search_doctors = '';
        if(!empty($request->dr_speciality)) {
           $search_doctors = User::where('role',2)->whereHas('profile',function($query) use($request){
            if($request->dr_speciality != 'all'){
            $query->where('dr_speciality',$request->dr_speciality);
            }

           

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
                $search_doctors = $search_doctors->appends(request()->query());
        }


        return view('frontend.patient.search-doctors', compact('doctors','doctors_speciality','search_doctors'));
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
      $cases = PatientCase::where('user_id',Auth::guard('sitePatient')->user()->id)->where('case_type',1)->latest()->paginate(10);
        return view('frontend.patient.requested_consults', compact('cases'));
      
    }


    public function prescriptions(Request $request)
    {
      $cases = PatientCase::where('user_id',Auth::guard('sitePatient')->user()->id)->where('case_type',2)->latest()->paginate(10);
      $accepted_cases = PatientCase::where('user_id',Auth::guard('sitePatient')->user()->id)->where('case_type',2)->where('accept_status',1)->latest()->paginate(10);
      $ready_cases = PatientCase::where('user_id',Auth::guard('sitePatient')->user()->id)->where('case_type',2)->latest()->paginate(10);
        return view('frontend.patient.prescriptions', compact('cases','accepted_cases','ready_cases'));
      
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
        $available_days = DoctorAvailableDays::where('user_id',$doctor->id)->where('date','>=',date('Y-m-d'))->get();
        // return $available_days;
      $get_current_day = DoctorAvailableDays::where('user_id',$doctor->id)->where('date',date('Y-m-d'))->get();
      $weekly_available_days = WeeklyAvailableDays::where('user_id',$doctor->id)->orderBy('num_val_for_day')->get();

        return view('frontend.patient.view_doctor_profile',compact('doctor','available_days','get_current_day','weekly_available_days'));
      
    }

    public function bookPrescriptions($id)
    {
        $id = Crypt::decryptString($id);
        $doctor = User::findOrFail($id);
        $available_days = DoctorAvailableDays::where('user_id',$doctor->id)->where('date','>=',date('Y-m-d'))->get();
        // return $available_days;
      $get_current_day = DoctorAvailableDays::where('user_id',$doctor->id)->where('date',date('Y-m-d'))->get();
      $weekly_available_days = WeeklyAvailableDays::where('user_id',$doctor->id)->orderBy('num_val_for_day')->get();

        return view('frontend.patient.book_prespriptions',compact('doctor','available_days','get_current_day','weekly_available_days'));
      
    }

    public function viewChilds(Request $request)
    {
            $user = Auth::guard('sitePatient')->user();
         return view('frontend.patient.view_childs',compact('user'));
    }

    public function addChild(Request $request)
    {
            // echo 'string'; exit;
          $validator = Validator::make($request->all(), [ 
            'forename' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:users,email',
            // 'address' => 'required',
            'sex' => 'required',
            "dob"=>"date|before_or_equal:".now()->format('Y-m-d'),
            // 'telephone1' => 'required',
            'first_account_holder' => 'required',
            'relationship_fch' => 'required',
            'email_fch' => 'required',
            'telephone1_fch' => 'required',
            // 'second_account_holder' => 'required',
            // 'relationship_sch' => 'required',
            // 'email_sch' => 'required',
            // 'telephone1_sch' => 'required',
            ]);
          // .$validator->errors()->first()

          if ($validator->fails()) { 
              Session::flash('Error-toastr','Please fill in all the fields befor proceed');
              return redirect()->back()->withErrors($validator)->withInput();
            }


              DB::beginTransaction();
    try {
            $user = Auth::guard('sitePatient')->user();

      $child_account = new User;
      $child_account->registration_number = 'REGD'.date('YmdHis');
      $child_account->forename = $request->forename;
      $child_account->surname = $request->surname;
      $child_account->name = $request->forename.' '.$request->surname;
      $child_account->email = $request->email;
      $child_account->email_verified_at = date('Y-m-d H:i:s');
      $child_account->admin_verified_at = date('Y-m-d H:i:s');
      $child_account->terms_conditions = date('Y-m-d H:i:s');
      $child_account->privacy_policy = date('Y-m-d H:i:s');
      $child_account->role = 4;
      $child_account->password = Hash::make(123456);
      $child_account->save();
      $userProfile = new UserProfile;
      $userProfile->user_id = $child_account->id;

            // $child_account = new ChildsAccounts;
            // $child_account->child_id = 'RD'.date('YmdHis').rand(10,99);
            // $child_account->forename = $request->forename;
            // $child_account->surname = $request->surname;
            // $child_account->name = $request->forename.' '.$request->surname;
            // $child_account->email = $request->email;
            $userProfile->address = $request->address;
            $userProfile->gender = $request->sex;
            $dob = str_replace("/", "-", $request->dob);
            $dob = date("Y-m-d", strtotime($request->dob));
            $userProfile->dob = $dob;
            $userProfile->telephone1 = $request->telephone1;
            $userProfile->telephone2 = $request->telephone2;
            $userProfile->first_account_holder = $request->first_account_holder;
            $userProfile->relationship_fch = $request->relationship_fch;
            $userProfile->email_fch = $request->email_fch;
            $userProfile->address_fch = $request->address_fch;
            $userProfile->telephone1_fch = $request->telephone1_fch;
            $userProfile->telephone2_fch = $request->telephone2_fch;
            $userProfile->second_account_holder = $request->second_account_holder;
            $userProfile->email_sch = $request->email_sch;
            $userProfile->address_sch = $request->address_sch;
            $userProfile->telephone1_sch = $request->telephone1_sch;
            $userProfile->telephone2_sch = $request->telephone2_sch;
            $userProfile->save();
      

            $child_account_holder = new ChildsAccountsHolder;
            $child_account_holder->user_id = $user->id;
            $child_account_holder->child_id = $child_account->id;
            $child_account_holder->save();
            

            DB::commit();
            Session::flash('Success-toastr','Successfully added');
            return redirect()->back();


  } catch (\Exception $e) {
            Session::flash('Error-toastr', $e->getMessage());
            DB::rollback();
            return redirect()->back();
        }
    }


    public function changeAccount(Request $request)
    {
      $user_id = $request->user_id;
      $user_info = User::find($user_id);
      if(Auth::guard('sitePatient')->user()->role == 1){
      $request->session()->put('parent_id', Auth::guard('sitePatient')->user()->id);
      }
       Auth::guard('sitePatient')->logout();
       // Session::flush();

       $user_info = array(
        "email"=>$user_info->email,
        "password"=>123456,
        );

       if (Auth::guard("sitePatient")->attempt($user_info) && Auth::attempt($user_info) ) {
            $user_details = Auth::guard("sitePatient")->user();
           return response()->json(['success' =>true, 'message'=>'success'], 200);
            
          }else{

      return response()->json(['success' =>false, 'message'=>'error'], 200);
          }

    }

     public function chats(Request $request, $id)
    {
         $case = PatientCase::where('case_id',$id)->first();

         return view('frontend.patient.chats', compact('case'));
      
    }

    public function doctorAvailableDay(Request $request)
    {
        $date = str_replace('/','-',$request->date);
        $date = date('Y-m-d',strtotime($date));
        // echo $request->doctor_id; exit;

        $getBookedSlot = BookTimeSlot::select('time_slot_id')->get()->toArray();

        $available_days = DoctorAvailableDays::where(function($query) use($date, $request){
          $query->where('date',$date)->where('user_id', $request->doctor_id);
        })->get();

     $time_slot = '';

         foreach($available_days as $current_day){
            foreach($current_day->getSlot()->whereNotIn('id',$getBookedSlot)->get() as $slot){
              
              $time_slot.= '<tr>
              <td>'.date('l',strtotime($current_day->date)) .'  '. date('F d Y',strtotime($current_day->date)).'</td>
              <td>'.date('H:i a', strtotime($slot->start_time)).'</td>
              <td>'.date('H:i a', strtotime($slot->end_time)).'</td>
              <td style="text-align: center;"><input type="checkbox" name="time_slot[]" value="'.$slot->id.'" onclick="caseDetails()"></td>
              </tr>';
            }
         }

         if(isset( $available_days)){
      return response()->json(['success' =>true, 'message'=>'success','data'=>$available_days,'time_slot'=>$time_slot], 200);
      }else{
      return response()->json(['success' =>fails, 'message'=>'No data found.','data'=>$available_days], 200);
      }

      
    }


 function symptomsChecker(Request $request,$case_id)
    {
        $user = Auth::guard('sitePatient')->user();


        if($request->isMethod('post')){
            // return $request->all();
            $case = PatientCase::where('case_id',$case_id)->first();


            foreach ($request->symptom as $value) {
            $symptoms = new PastSymptoms;
            $symptoms->user_id = $user->id;
            $symptoms->patient_case_id = $case->id;
            $symptoms->symptom = $value;
            $symptoms->type = 1;
            $symptoms->save();
            }

            foreach ($request->symptom as $value) {
            $symptoms = new PastSymptoms;
            $symptoms->user_id = $user->id;
            $symptoms->patient_case_id = $case->id;
            $symptoms->symptom = $value;
            $symptoms->type = 2;
            $symptoms->save();
            }

            $symptoms_details = new SymptromsDetails;
            $symptoms_details->user_id = $user->id;
            $symptoms_details->patient_case_id = $case->id;
            $symptoms_details->cond_not_covered = $request->cond_not_covered;
            $symptoms_details->cond_not_covered2 = $request->cond_not_covered2;
            $symptoms_details->details = $request->details;
            $symptoms_details->width = $request->width;
            $symptoms_details->height = $request->height;
            $symptoms_details->doctor_to_know = $request->doctor_to_know;
            $symptoms_details->gp_doctor_name = $request->gp_doctor_name;
            $symptoms_details->gp_doctor_address = $request->gp_doctor_address;
            $symptoms_details->save();


            $i = 0;
             foreach ($request->drug_name as $value) {
            $drugs_details = new DrugsDetails;
            $drugs_details->user_id = $user->id;
            $drugs_details->patient_case_id = $case->id;
            $drugs_details->drug_name = $value;
            $drugs_details->dose = $request->dose[$i];
            $drugs_details->frequency = $request->frequency[$i];
            $drugs_details->save();
            $i++;
            }

            $j = 0;
            foreach ($request->drug_name2 as $value) {
            $drug_problems = new DrugsProblem;
            $drug_problems->user_id = $user->id;
            $drug_problems->patient_case_id = $case->id;
            $drug_problems->drug_name = $value;
            $drug_problems->what_happened = $request->what_happened[$j];
            $j++;
            $drug_problems->save();
            }

            Session::flash('Success-toastr','Successfully submited');
            return redirect()->route('requested-consults');
           
        }

         return view('frontend.patient.symptoms-checker');
    }


}