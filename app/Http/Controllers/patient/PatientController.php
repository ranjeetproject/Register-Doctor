<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use App\Models\BookTimeSlot;
use App\Models\CaseFile;
use App\Models\ChildsAccountsHolder;
use App\Models\DoctorAvailableDays;
use App\Models\DoctorReview;
use App\Models\DrugsDetails;
use App\Models\DrugsProblem;
use App\Models\FavouriteDoctor;
use App\Models\PastSymptoms;
use App\Models\PatientCase;
use App\Models\SymptromsDetails;
use App\Models\UserProfile;
use App\Models\WeeklyAvailableDays;
use App\Models\HandyDocument;
use App\Models\Payment;
use App\Models\SummaryDiagnosis;
use App\Models\SickNote;
use App\Models\Specialties;
use App\Models\pharma_req_prescription;
use App\Models\PrescriptionComment;
use App\Models\PersonTOPersonChat;
use App\User;
use App\UserDoctor;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Prescription_req_doctor;
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
        d_timezone('asd');
        return view('frontend.patient.dashboard');
    }

    public function profile(Request $request) {
        if($request->isMethod('post')){
         // $data = $request->validate([
      $validator = Validator::make($request->all(), [
      "forename"=>"required|min:3|max:100",
      "surname"=>"required|min:3|max:100",
      "telephone1"=>"required|digits:11",
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

    if($user->UPN == '') {
        $user->UPN = uniqid('REGP');
    }

     $user->save();
     $profile = UserProfile::where('user_id',$user->id)->first();

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
        $token = csrf_token();

        return view('frontend.patient.change_password',compact('token'));
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
                // "case_file.*"=>"nullable|max:2000",
                // "case_file"=>"image|mimes:jpeg,png,jpg|max:2000",
                
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
            if(($request->questions_type == 1) || ($request->questions_type == 2)){
                $booking_date = $booking_date;
            }else{
                $booking_date = null;
            }
            $case->booking_date = $booking_date;

            $case->booking_time = $request->booking_time;
            $case->time_duration = ($request->time_duration) ? $request->time_duration * 15 : '';
            $case->save();

            $img_did = [];
            if ($request->hasFile('case_file')){
              if(count($request->file('case_file'))>5){
                Session::flash('Error-toastr','File Upload Not Maxium 5');
                return redirect()->back();
              }else{
                foreach($request->file('case_file') as $image)
                {
                    $rand_val           = date('YMDHIS') . rand(11111, 99999);
                    $image_file_name    = md5($rand_val);
                    // $file               = $request->file('image');
                    $file               = $image;
                    $fileName           = $image_file_name.'.'.$file->getClientOriginalExtension();
                    $extension =  pathinfo(storage_path($fileName),PATHINFO_EXTENSION);
                    if($extension == 'jpg' || $extension == 'pdf' || $extension=='jpeg'){
                      $destinationPath    = public_path().'/uploads/cases/';
                      $file->move($destinationPath,$fileName);
                      $images['file_name']    = $fileName;
                      $images['patient_case_id']    = $case->id;
                      array_push($img_did, $images);
                    }else{
                      Session::flash('Error-toastr','File Formate Not Supported');
                      return redirect()->back();
                    }
                  
                }
              }
            }
            // print_r($img_did); exit;

            CaseFile::insert($img_did);

            // if ($request->hasFile('case_file')) {
            //    $rand_val           = date('YMDHis').rand(11111,99999);
            //    $image_file_name    = md5($rand_val);
            //    $file               = $request->file('case_file');
            //    $extension          = $request->file('case_file')->extension();
            //    $fileName           = $image_file_name.'.'.$extension;
            //    $destinationPath    = public_path().'/uploads/cases/';
            //    $file->move($destinationPath,$fileName);
            //    $case_file = new CaseFile;
            //    $case_file->patient_case_id = $case->id;
            //    $case_file->file_name = $fileName;
            //    $case_file->save();
            //  }

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


            if($request->questions_type == 1 || $request->questions_type == 2 || $request->questions_type == 4){
                return redirect()->route('patient.payment',$case->case_id);
                // return redirect()->route('patient.symptoms-checker',$case->case_id);
            }
            return redirect()->back();
        }


        // return view('frontend.patient.create_case');

    }

     public function medicalRecord(Request $request)
    {
        $login_user = Auth::guard('sitePatient')->user();

        $symptroms_details = SymptromsDetails::where('user_id',$login_user->id)->get();
        $last_symptroms_details = SymptromsDetails::where('user_id',$login_user->id)->orderBy('id','DESC')->first();
        $past_symptoms = PastSymptoms::where('user_id',$login_user->id)->where('type',1)->get();
        $past_symptoms2 = PastSymptoms::where('user_id',$login_user->id)->where('type',2)->get();
        $drugs_details = DrugsDetails::where('user_id',$login_user->id)->get();
        $drugs_problem = DrugsProblem::where('user_id',$login_user->id)->get();
        $cases = PatientCase::where('user_id',$login_user->id)->latest()->get();

        return view('frontend.patient.medical_record',compact('symptroms_details','past_symptoms','drugs_details','drugs_problem','login_user','past_symptoms2','cases','last_symptroms_details'));

    }

    public function myFavoriteDoctors(Request $request)
    {
        // $doctors = UserDoctor::where('role',2)->paginate(5);
        $doctors_speciality = Specialties::select('name','id')->orderBy('name')->get()->toArray();

         $doctors_speciality = array_map("unserialize", array_unique(array_map("serialize", $doctors_speciality)));
         // return $doctors_speciality;
        $login_user = Auth::guard('sitePatient')->user();

        $doctors = $login_user->userFavDoc()->where('status',1)->with('doctor')->paginate(8);
        // dd($doctors);

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
      $cases = PatientCase::with('sickNote')->where('user_id',Auth::guard('sitePatient')->user()->id)->latest()->paginate(10);
        return view('frontend.patient.requested_consults', compact('cases'));

    }


    public function acceptedConsults(Request $request,$id)
    {
      $case = PatientCase::where('user_id',Auth::guard('sitePatient')->user()->id)->where('case_type',2)->where('case_id',$id)->first();

        return view('frontend.patient.accepted_consults', compact('case'));

    }


    public function prescriptions(Request $request)
    {
      $cases = PatientCase::where('user_id',Auth::guard('sitePatient')->user()->id)->where('case_type',2)->where('accept_status',null)->latest()->paginate(10);
      $accepted_cases = PatientCase::where('user_id',Auth::guard('sitePatient')->user()->id)->where('case_type',2)->where('accept_status',1)->latest()->paginate(10);
      $ready_cases = PatientCase::where('user_id',Auth::guard('sitePatient')->user()->id)->where('case_type',2)->latest()->paginate(10);
        return view('frontend.patient.prescriptions', compact('cases','accepted_cases','ready_cases'));

    }

    public function closedCases(Request $request)
    {
        $closed_cases = PatientCase::with(['patientCaseCloseDate','doctor:id,name'])->where('status',4)->paginate(8);
        return view('frontend.patient.closed_cases', compact('closed_cases'));

    }

    public function prescriptionsIssued(Request $request)
    {
        $cases = PatientCase::where('user_id',Auth::guard('sitePatient')->user()->id)->where('accept_status',1)->get();
        return view('frontend.patient.prescriptions_issued',compact('cases'));

    }
    public function ajaxPatientCasedetails(Request $request)
    {

        $case = PatientCase::where( 'case_id', $request->case_id)->with('doctor')->get();
        $prescription = PatientCase::where( 'case_id', $request->case_id)->with('prescription')->get();

        $timezone = d_timezone();
        $pct = PrescriptionComment::where('case_id',$request->case_id)->get();
        // dd($pct,  empty($pct));
        if(!count($pct)){
            $pcv = [];
        }
        foreach($pct as $pcs){
            $pcl['comments'] = $pcs->comments;
            $pcl['created_at'] = timezoneAdjustmentFetchTwo($timezone,$pcs->created_at);
            $pcv[] = $pcl;
        }


        $return = array('case_details'=>$case, 'prescription'=>$prescription,'comments'=>$pcv);
        return response()->json( $return);

    }

    public function pharmacies(Request $request)
    {
        $success = '';
        $error = '';
        if(isset($request->post_sub)){
          //echo $request->c_id .' '.$request->s_id;
          if($request->c_id !='' && $request->s_id != ''){
            $case = Prescription_req_doctor::where( 'priscription_id', $request->s_id)->first();
            if($case ==''){
              $req = new Prescription_req_doctor();
              $req->priscription_id = $request->s_id;
              $req->case_id = $request->c_id;
              $req->status = 1;
              $req->send_status = 2;
              $req->created_at = date("Y-m-d h:i:s");
              $req->updated_at = date("Y-m-d h:i:s");
              $req->save();
              //print_r($priscription);
              if(!empty($req)){
                $success = 'Request send successfully';
              }else{
                $error = 'There is some problem please try again';
              }
            }else{
              $error = 'Request already sended';
              if($case->send_status == 1){
                $success = 'Please check your mail Doctor already send the priscription';
              }
            }
          }else{
            $error = 'There is some problem please try again';
          }
        }
        $pharmacies = User::whereRole(3)->latest()->get();
        $pharma_ids = array();
        $pharma_req = pharma_req_prescription::where('priscription_id','=',$request->s_id)->where('case_id','=',$request->c_id)->get();
        foreach($pharma_req as $ph){
         $pharma_ids[] = $ph->pharma_id;
        }
        //print_r($pharma_ids);
        $data = array( 'pharma_ids'=> $pharma_ids, 'pharmacies'=>$pharmacies, 'success' => $success, 'error' => $error);
        //print_r($data);
        return view('frontend.patient.pharmacies',compact('data'));
    }
    public function ajaxSend_req_to_Pharma(Request $request)
    {
      //print_r($request->pharma_id);
      if( $request->pharma_id !=''){
        $pharma = new pharma_req_prescription();
        $pharma->case_id = $request->case_id;
        $pharma->priscription_id = $request->prisc_id;
        $pharma->pharma_id = $request->pharma_id;
        $pharma->created_at = date("Y-m-d h:i:s");
        $pharma->updated_at = date("Y-m-d h:i:s");
        $pharma->save();
        //print_r($pharma);
        if(!empty($pharma)){
          // $case = PatientCase::where( 'case_id', $_POST['case_id'])->with('user')->get();
          // $prescription = PatientCase::where( 'case_id', $_POST['case_id'])->with('prescription')->get();
          // need to send email//
          $return = array('sucess'=>'y', 'error'=>'');
          return response()->json( $return);
        }else{
          $return = array('sucess'=>'', 'error'=>'n');
          return response()->json( $return);
        }
      }
    }

    public function searchPharmacies(Request $request)
    {
        $pharmacies = User::whereRole(3)->latest()->get();
        return view('frontend.patient.search_pharmacies',compact('pharmacies'));

    }


    public function viewDoctorProfile($id)
    {
        $id = Crypt::decryptString($id);
        $doctor = User::findOrFail($id);
        $getBookedSlot = BookTimeSlot::select('time_slot_id')->get()->toArray();

        $available_days = DoctorAvailableDays::where('user_id',$doctor->id)->where('date','>=',date('Y-m-d'))->get();
        // return $available_days;
        $get_current_day = DoctorAvailableDays::where('user_id',$doctor->id)->where('date',date('Y-m-d'))->get();
        $weekly_available_days = WeeklyAvailableDays::where('user_id',$doctor->id)->orderBy('num_val_for_day')->get();

        return view('frontend.patient.view_doctor_profile',compact('doctor','available_days','get_current_day','weekly_available_days','getBookedSlot'));
    }

    public function bookPrescriptions($id)
    {
        $id = Crypt::decryptString($id);
        $doctor = User::findOrFail($id);
        $getBookedSlot = BookTimeSlot::select('time_slot_id')->get()->toArray();

        $available_days = DoctorAvailableDays::where('user_id',$doctor->id)->where('date','>=',date('Y-m-d'))->get();
        // return $available_days;
      $get_current_day = DoctorAvailableDays::where('user_id',$doctor->id)->where('date',date('Y-m-d'))->get();
      $weekly_available_days = WeeklyAvailableDays::where('user_id',$doctor->id)->orderBy('num_val_for_day')->get();

        return view('frontend.patient.book_prespriptions',compact('doctor','available_days','get_current_day','weekly_available_days','getBookedSlot'));

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

        $getBookedSlot = BookTimeSlot::select('time_slot_id')->where('status','<',3)->get()->toArray();

        $available_days = DoctorAvailableDays::where(function($query) use($date, $request){
          $query->where('date',$date)->where('user_id', $request->doctor_id);
        })->get();

        $time_slot = '';

        // $time_zone = Auth::user()->profile->time_zone;
        $time_zone = d_timezone();
        // $h = '26';
        $hdlst = '26';
        $count_h_s = 0;

         foreach($available_days as $current_day){
            foreach($current_day->getSlot()->whereNotIn('id',$getBookedSlot)->orderby('start_time')->get() as $slot){

                // if ($time_zone ==1) {
                //     if(date('H', strtotime($slot->start_time)) == $hdlst){
                //         $time_slot.= '<tr>
                //         <td></td>
                //         <td></td>
                //         <td>'.date('H:i a', strtotime($slot->start_time)).'</td>
                //         <td>'.date('H:i a', strtotime($slot->end_time)).'</td>
                //         <td style="text-align: center;">
                //             <input type="checkbox" name="time_slot[]" value="'.$slot->id.'" onclick="caseDetails()">
                //         </td>
                //         </tr>';
                //     } else {
                //             $count_h_s++;
                //             if($count_h_s>1) {
                //                 $time_slot.= '</tbody></table></td></tr>';
                //             }
                //             $time_slot.= '<tr class="ts-collapse-icon" data-toggle="collapse" data-target="#time_slot_row_'.$count_h_s.'">';
                //             if($count_h_s == 1) {
                //                 $time_slot.= '<td>'.date('l',strtotime($current_day->date)) .'  '. date('F d Y',strtotime($current_day->date)).'</td>';

                //             }else {
                //                 $time_slot.= '<td></td>';

                //             }

                //             $time_slot.= '<td>'.date('H:i a', strtotime($slot->start_time)).'</td>
                //                             <td></td>
                //                             <td></td>
                //                             <td style="text-align: center;">
                //                             </td>
                //                         </tr>
                //                         <tr id="time_slot_row_'.$count_h_s.'" class="collapse">
                //                             <td colspan="5" class="time-slot-td">
                //                             <table>
                //                             <tbody >
                //                             <tr>
                //                                 <td></td>
                //                                 <td></td>
                //                                 <td>'.date('H:i a', strtotime($slot->start_time)).'</td>
                //                                 <td>'.date('H:i a', strtotime($slot->end_time)).'</td>
                //                                 <td style="text-align: center;">
                //                                     <input type="checkbox" name="time_slot[]" value="'.$slot->id.'" onclick="caseDetails()">
                //                                 </td>
                //                             </tr>';
                //     }
                //     $hdlst = date('H', strtotime($slot->start_time));

                // }

                // else {
                    if(date('H', strtotime(timezoneAdjustmentFetch($time_zone,$current_day->date,$slot->start_time))) == $hdlst){
                        $time_slot.= '<tr><td></td><td></td><td>'.date('H:i a', strtotime(timezoneAdjustmentFetch($time_zone,$current_day->date,$slot->start_time))).'</td><td>'.date('H:i a', strtotime(timezoneAdjustmentFetch($time_zone,$current_day->date,$slot->end_time))).'</td><td style="text-align: center;"><input type="checkbox" name="time_slot[]" value="'.$slot->id.'" onclick="caseDetails()"></td></tr>';
                    } else {

                        $count_h_s++;
                        if($count_h_s>1) {
                            $time_slot.= '</tbody></table></td></tr>';
                        }
                        $time_slot.= '<tr class="ts-collapse-icon" data-toggle="collapse" data-target="#time_slot_row_'.$count_h_s.'">';
                        if($count_h_s == 1) {
                            $time_slot.= '<td>'.date('l',strtotime($current_day->date)) .'  '. date('dS M Y',strtotime($current_day->date)).'</td>';

                        }else {
                            $time_slot.= '<td></td>';

                        }

                        $time_slot.= '<td>'.date('H:i a', strtotime(timezoneAdjustmentFetch($time_zone,$current_day->date,$slot->start_time))).'</td><td></td><td></td><td style="text-align: center;"></td></tr>';

                        $time_slot.= '<tr id="time_slot_row_'.$count_h_s.'" class="collapse">
                        <td colspan="5" class="time-slot-td">
                        <table>
                        <tbody ><tr><td></td><td></td>
                        <td>'.date('H:i a', strtotime(timezoneAdjustmentFetch($time_zone,$current_day->date,$slot->start_time))).'</td>
                        <td>'.date('H:i a', strtotime(timezoneAdjustmentFetch($time_zone,$current_day->date,$slot->end_time))).'</td>
                        <td style="text-align: center;"><input type="checkbox" name="time_slot[]" value="'.$slot->id.'" onclick="caseDetails()"></td></tr>';
                    }
                    $hdlst = date('H', strtotime(timezoneAdjustmentFetch($time_zone,$current_day->date,$slot->start_time)));

                // }

            }

         }
         $time_slot.= '</tbody></table></td></tr>';

         if(isset( $available_days)){
            // foreach($available_days as $current_day1){
            //     $avl_day['from_time'] = $current_day1->from_time;
            //     $avl_day['to_time'] = $current_day1->to_time;
            //     $avl_days[] = $avl_day;
            // }
            $available_days->each(function ($item, $key) use ($time_zone) {
                // if (/* condition */) {
                //     return false;
                // }
                if ($time_zone !=1) {
                    $item->from_time = date('H:i a', strtotime(timezoneAdjustmentFetch($time_zone,$item->date,$item->from_time)));
                    $item->to_time = date('H:i a', strtotime(timezoneAdjustmentFetch($time_zone,$item->date,$item->to_time)));
                    return $item;
                }
                print_r($item);
            });
      return response()->json(['success' =>true, 'message'=>'success','data'=>$available_days,'time_slot'=>$time_slot], 200);
      }else{
      return response()->json(['success' =>fails, 'message'=>'No data found.','data'=>$available_days], 200);
      }


    }


 function symptomsChecker(Request $request,$case_id)
    {
        $user = Auth::guard('sitePatient')->user();
        $last_symptroms = SymptromsDetails::where('user_id',$user->id)->latest()->first();
      
        if($request->isMethod('post')){
            // return $request->all();
            $case = PatientCase::where('case_id',$case_id)->first();

            if(isset($request->symptom) && !empty($request->symptom)){
                foreach ($request->symptom as $value) {
                    $symptoms = new PastSymptoms;
                    $symptoms->user_id = $user->id;
                    $symptoms->patient_case_id = $case->id;
                    $symptoms->symptom = $value;
                    $symptoms->type = 1;
                    $symptoms->save();
                }
              if(isset($request->symptom2) && !empty($request->symptom2)){
                  foreach ($request->symptom2 as $value) {
                      $symptoms = new PastSymptoms;
                      $symptoms->user_id = $user->id;
                      $symptoms->patient_case_id = $case->id;
                      $symptoms->symptom = $value;
                      $symptoms->type = 2;
                      $symptoms->save();
                  }
              }
            }



             // if(isset($request->weight) && !empty($request->weight)){

            $symptoms_details = new SymptromsDetails;
            $symptoms_details->user_id = $user->id;
            $symptoms_details->patient_case_id = $case->id;
            $symptoms_details->cond_not_covered = $request->cond_not_covered;
            $symptoms_details->cond_not_covered2 = $request->cond_not_covered2;
            $symptoms_details->details = $request->details;
            $symptoms_details->weight = $request->weight;
            $symptoms_details->height = $request->height;
            $symptoms_details->doctor_to_know = $request->doctor_to_know;
            $symptoms_details->gp_doctor_name = $request->gp_doctor_name;
            $symptoms_details->gp_doctor_address = $request->gp_doctor_address;
            $symptoms_details->save();
            // }

             if(isset($request->drug_name) && !empty($request->drug_name)){
            $i = 0;
             foreach ($request->drug_name as $value) {
            $drugs_details = new DrugsDetails;
            $drugs_details->user_id = $user->id;
            $drugs_details->patient_case_id = $case->id;
            $drugs_details->drug_name = $value;
            $drugs_details->dose = $request->dose[$i];
            $drugs_details->frequency = $request->frequency[$i];
            $drugs_details->currently_taking = $request->currently_taking[$i] ?? '2';
            $drugs_details->save();
            $i++;
            }
        }
         if(isset($request->drug_name2) && !empty($request->drug_name2)){
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
        }

            Session::flash('Success-toastr','Successfully submited');
            return redirect()->route('patient.requested-consults');

        }

         return view('frontend.patient.symptoms-checker',compact('last_symptroms'));
    }


   public function viewCase(Request $request,$id)
    {
        $case = PatientCase::where('case_id',$id)->first();
        return view('frontend.patient.view_case', compact('case'));

    }

    public function doctorReview(Request $request)
    {
            $validator = Validator::make($request->all(), [
            "case_id"=>"required",
            "rating"=>"required",
            "review"=>"required",
            ]);


            if ($validator->fails()) {
              Session::flash('Error-toastr','Please fill in all the fields before proceeding');
              return redirect()->back();
            }
            $doctor_id = PatientCase::where('case_id',$request->case_id)->value('doctor_id');
            PatientCase::where('case_id',$request->case_id)->update(['status' => 4]);

            $user = Auth::guard('sitePatient')->user();
            $review = new DoctorReview;
            $review->user_id = $user->id;
            $review->doctor_id = $doctor_id;
            $review->case_id = $request->case_id;
            $review->review = $request->review;
            $review->rating = $request->rating;
            $review->save();

            Session::flash('Success-toastr','Successfully submited');
            return redirect()->back();

    }



    public function accepteDoctor(Request $request)
    {
         $case = PatientCase::find($id);
          $case->doctor_id = $request->doctor_id;
          $case->accept_status = 1;
          $case->booking_date = $request->booking_date;
          $case->questions_type = $request->comu_type;
          $case->save();

             $booking_time_slot = new BookTimeSlot;
             $booking_time_slot->user_id = Auth::guard('sitePatient')->user()->id;
             $booking_time_slot->patient_case_id = $case->id;
             $booking_time_slot->time_slot_id = $request->slot_id;
             $booking_time_slot->save();

    }

    public function videoCall($id)
    {
        $case = PatientCase::where('accept_status',1)->where('user_id',Auth::guard('sitePatient')->user()->id)->where('case_id',$id)->first();

        return view('common.video_call_test',compact('case','id'));
    }

    public function handyDocument(Request $request)
    {
        $handy_docs = HandyDocument::where('user_role',1)->latest()->paginate(10);
        return view('frontend.patient.handy_document',compact('handy_docs'));
    }

    public function viewHandyDocument($id)
    {
        $handy_doc = HandyDocument::where('user_role',1)->where('id',$id)->first();
        return view('frontend.patient.view_handy_doc',compact('handy_doc'));
    }

    public function cancelBooking($id)
    {
        PatientCase::where('case_id',$id)->update(['status' => 3,'cancel_by' =>Auth::guard('sitePatient')->user()->id, 'cancel_date' => date('Y-m-d H:i:s')]);
        $case_primary_id = PatientCase::where('case_id',$id)->value('id');
        // return view('frontend.patient.view_handy_doc',compact('handy_doc'));
        $intent_id = Payment::where('case_id',$id)->value('intent_id');
        Payment::where('case_id',$id)->update(['status' => 4]);
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $re = \Stripe\Refund::create([
            'payment_intent' => $intent_id,
        ]);

        // $intent = \Stripe\PaymentIntent::retrieve($intent_id);
        // $intent->cancel();
        BookTimeSlot::where('patient_case_id',$case_primary_id)->update(['status'=> 3]);
//needs to create table of refund details
        // $refund = new RefundPayment;
        // $refund->balance_transaction = $re->balance_transaction;
        // $refund->charge = $re->charge;
        // $refund->payment_intent = $re->payment_intent;
        // $refund->status = $re->status;
        // $refund->amount = $re->amount;
        // $refund->case_id = $id;
        // $refund->save();
// dd($re);
        Session::flash('Success-toastr','Successfully canceled');
        return redirect()->back();
    }

    public function paymentDetail()
    {
        $payments = Payment::where('user_id',Auth::guard('sitePatient')->user()->id)->latest()->paginate(8);
        return view('frontend.patient.payment_detail',compact('payments'));
    }

    public function printCaseSummery($id)
    {
        $summary = SummaryDiagnosis::where('patient_case_id',$id)->first();
        $case_detail = PatientCase::where('case_id',$id)->first();
        return view('frontend.patient.print_case_summery',compact('summary','case_detail'));
    }

    public function sickNote($id)
    {
        $case = PatientCase::where('case_id',$id)->first();
        $sicknote = SickNote::where('case_id',$id)->first();
        return view('frontend.patient.sick_note',compact('case','sicknote'));

    }

    public function videoCallDocPres($case_id)
    {
        return view('common.video_call_pres',compact('case_id'));
    }

    public function directChats(Request $request, $id)
    {
        $sender_id = Auth::user()->id;
        $user_detail = User::findOrFail($id);


      if($user_detail->roll == 3){
        $chat_details = PersonTOPersonChat::where('p_id',$sender_id)->where('ph_id',$id)->first();
        // User::findOrFail($id)
      } elseif ($user_detail->roll == 2) {
        $chat_details = PersonTOPersonChat::where('p_id',$sender_id)->where('d_id',$id)->first();
      }

      if($chat_details) {
        $peerPeerId = $chat_details->id;
      } else {
        $chat = new PersonTOPersonChat;
        $chat->p_id = $sender_id;
        if ($user_detail->roll == 2) {
            # code...
            $chat->d_id = $id;
        } else {

            $chat->ph_id = $id;
        }
        $chat->save();
        $peerPeerId = $chat->id;
      }

      $chat_id = getDirectChatId($peerPeerId);

      return view('frontend.patient.direct_chats', compact('user','chat_id'));
    }

    public function directChat(Request $request)
    {
      return view('frontend.patient.direct_chat');
    }

    public function directChat_post(Request $request)
    {
        $key_per = $request->param;
        $val_sur = $request->search;
        $p_user = '';
        $d_user = '';

        if($request->param == 1){
            $users = User::where('name',$request->search)->where('role',3)->get();
        } elseif ($request->param == 2) {
            $users = User::where('registration_number',$request->search)->where('role',3)->get();
        } elseif ($request->param == 3) {
            $users = User::where('registration_number',$request->search)->where('role',2)->get();
        }elseif ($request->param == 4) {
            $users = User::where('registration_number',$request->search)->where('role',2)->get();
        }else{
            $presn = Prescription::where('prescription_no',$request->search)->first();
            if ($presn) {
                $p_user = User::find($presn->p_id);
                $d_user = User::find($presn->doc_id);
                # code...
            }
            $users = [];
        }
      return view('frontend.patient.direct_chat',compact('users','p_user','d_user','key_per','val_sur'));
    }
}
