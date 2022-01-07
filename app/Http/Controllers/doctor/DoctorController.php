<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use App\Models\AcceptedPrescriptionDoc;
use App\Models\DoctorAvailableDays;
use App\Models\DrugsDetails;
use App\Models\DrugsProblem;
use App\Models\PastSymptoms;
use App\Models\PatientCase;
use App\Models\SickNote;
use App\Models\Prescription_req_doctor;
use App\Prescription;
use App\Models\SummaryDiagnosis;
use App\Models\SymptromsDetails;
use App\Models\TimeSlot;
use App\Models\UserProfile;
use App\Models\WeeklyAvailableDays;
use App\Models\HandyDocument;
use App\Models\ThumbsUp;
use App\Models\Payment;
use App\Models\BookTimeSlot;
use App\Models\PrescriptionComment;
use App\UserDoctor;
use App\helpers;
use App\User;
use App\Mail\FinalizePrescription;
use App\Mail\InviteVideo;
use App\Mail\AvailDayChangeNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Builder;
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
        //dd(findOutBSTStartEndDate('2021'));

      if(empty(Auth::guard('siteDoctor')->user()->profile->dr_name_of_medical_licencer)){
        return redirect()->route('doctor.profile');
      }
        return view('frontend.doctor.dashboard');
    }

    public function profile(Request $request) {

       $form_name = 'profile';

        if($request->isMethod('post')){
            $form_name = $request->form_name;

            // dd($request->all());
         // $data = $request->validate([
              $validator = Validator::make($request->all(), [
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

            if ($validator->fails()) {
              Session::flash('Error-toastr','Please fill in all the fields before proceeding');
              return redirect()->back();
            }

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
        $handy_docs = HandyDocument::where('user_role',2)->latest()->paginate(10);
        return view('frontend.doctor.handy_document',compact('handy_docs'));
    }

    public function viewHandyDocument($id)
    {
        $handy_doc = HandyDocument::where('user_role',2)->where('id',$id)->first();
        return view('frontend.doctor.view_handy_doc',compact('handy_doc'));
    }

    public function getThumbsUp(Request $request)
    {
        // dd(getThumbsUp(Auth::guard('siteDoctor')->user()->id));s
        if($request->isMethod('post')){
            $thumbsup = new ThumbsUp;
            $thumbsup->doc_name = $request->doctor_name;
            $thumbsup->doc_speciality = $request->speciality;
            $thumbsup->country = $request->country;
            $thumbsup->city = $request->city;
            $thumbsup->email = $request->email_id;
            $thumbsup->comment = $request->comment;
            $thumbsup->opinion_leader = $request->opinion_leader;
            $thumbsup->created_by = Auth::guard('siteDoctor')->user()->id;
            $thumbsup->save();
            Session::flash('Success-toastr','Successfully added');
            return redirect()->back();
        }
        return view('frontend.doctor.get_thumbsUp');
    }

    public function appointment(Request $request)
    {
      $cases = PatientCase::where('accept_status',1)->where('doctor_id',Auth::guard('siteDoctor')->user()->id)->latest()->paginate(8);
        return view('frontend.doctor.appointment',compact('cases'));
    }


    public function sendPatientMessage(Request $request)
    {
        $key_v = $request->key_v;
        $search = $request->search;
        $users = [];
        switch($key_v) {
            case 1:
                $users = User::where('name',$search)->where('role',1)->get();
            break;

            case 2:
                $users = User::where('registration_number',$search)->where('role',1)->get();
            break;

            case 3:
                $users = User::join('prescription','prescription.p_id','=','users.id')
                ->where('prescription.prescription_no',$search)->where('users.role',1)->get();
            break;
        }

        return view('frontend.doctor.send_patient_message',compact('users'));
    }

    public function createPrescription(Request $request)
    {
      $cases = PatientCase::where('doctor_id',Auth::guard('siteDoctor')->user()->id)->where('accept_status',1)->where('prescriptions_issued', '=', 'no')->get();
      return view('frontend.doctor.create_prescription',compact('cases'));
    }
    // public function AddPrescription(Request $request)
    // {
    //     $cases = PatientCase::where('doctor_id',Auth::guard('siteDoctor')->user()->id)->where('accept_status',1)->get();
    //     return view('frontend.doctor.create_prescription',compact('cases'));
    // }
    public function ajaxCasedetails(Request $request)
    {
        //print_r($request->case_id);
        $case = PatientCase::where( 'case_id', $request->case_id)->with('user')->get();
        // dd($case);
        $paitent_req = Prescription_req_doctor::where( 'case_id', $request->case_id)->first();
        $req_status = 'inactive';
        if($paitent_req !=''){
          //print_r($paitent_req->case_id);
          $req_status = ($paitent_req->status == 1) ? 'active' : 'inactive';
        }
        $prescription = PatientCase::where( 'case_id', $request->case_id)->with('prescription')->get();

        $return = array('case_details'=>$case, 'prescription'=>$prescription, 'req_status'=> $req_status);
        return response()->json( $return);

    }
    public function ajaxAddpriscription(Request $request){
      //print_r($_POST);
      if( !empty($_POST)){
        $priscription = new Prescription();
        $priscription->doc_id = $_POST['d_id'];
        $priscription->p_id = $_POST['p_id'];
        $priscription->case_no = $_POST['case_id'];
        $priscription->guardian_name = $_POST['g_name'];
        $priscription->prescription_no = '';
        $priscription->upn = $_POST['upn'];
        $priscription->drug = $_POST['drug'];
        $priscription->dose = $_POST['dose'];
        $priscription->frequency = $_POST['frequency'];
        $priscription->route = $_POST['route'];
        $priscription->duration = $_POST['duration'];
        $priscription->comments = $_POST['comments'];
        $priscription->created_at = date("Y-m-d h:i:s");
        $priscription->updated_at = date("Y-m-d h:i:s");
        $priscription->save();
        //print_r($priscription);
        if(!empty($priscription)){
          $case = PatientCase::where( 'case_id', $_POST['case_id'])->with('user')->get();
          $prescription = PatientCase::where( 'case_id', $_POST['case_id'])->with('prescription')->get();

          $return = array('case_details'=>$case, 'prescription'=>$prescription);
          return response()->json( $return);
        }else{
          $return = array();
          return response()->json( $return);
        }
      }
    }
    public function ajaxFinalpriscription(Request $request){
        //print_r($request->case_id);
        if($request->case_id !=''){
          $prescription_no = uniqid();
          $Prescription = Prescription::where(['case_no'=>$request->case_id])->update(['prescription_no'=>$prescription_no,'status'=>'y']);
          $Prescription_case = PatientCase::where(['case_id'=>$request->case_id])->update(['prescriptions_issued'=>'yes']);
          //print_r($Prescription);
          $case = PatientCase::where( 'case_id', $request->case_id)->with('user')->get();

          if($Prescription !=''){
            //email Finalize Prescription $case[0]->user->email
            Mail::to("koustav.mondal@brainiuminfotech.com")->send(new FinalizePrescription($request->case_id));
          }
          $prescription = PatientCase::where( 'case_id', $request->case_id)->with('prescription')->get();
          $return = array('case_details'=>$case, 'prescription'=>$prescription);
          return response()->json( $return);
        }

    }

     public function prescriptionIssues(Request $request)
    {
      $cases = PatientCase::where('accept_status',1)->where('prescriptions_issued', '=', 'yes')->with(['user','prescription','getPrescriptionComents' => function($c){
        $c->latest()->first();
    } ])->get();

      return view('frontend.doctor.prescription_issues',compact('cases'));
    }
    public function viewPrescription(Request $request,$cid)
    {

      //$cases = PatientCase::where('accept_status',1)->where('prescriptions_issued', '=', 'yes')->with('user')->with('prescription')->get();
      $case = PatientCase::where( 'case_id', $cid)->with(['user'])->first();
      $paitent_req = Prescription_req_doctor::where( 'case_id', $cid)->first();
      $req_status = 'inactive';
      if($paitent_req !=''){
        //print_r($paitent_req->case_id);
        $req_status = ($paitent_req->status == 1) ? 'active' : 'inactive';
      }
      $prescription = Prescription::where( 'case_no', $cid)->get();
      // print_r($prescription);
      // exit;
      $timezone = d_timezone();
        $pct = PrescriptionComment::where('case_id',$cid)->get();
        if(!count($pct)){

            $pcv = [];
        }
        foreach($pct as $pcs){
            $pcl['comments'] = $pcs->comments;
            $pcl['created_at'] = timezoneAdjustmentFetchTwo($timezone,$pcs->created_at);
            $pcv[] = $pcl;
        }

        // return $pcv;
      $return = array('case_details'=>$case, 'prescription'=>$prescription, 'req_status'=> $req_status, 'comments' => $pcv);
      //return response()->json( $return);
      return view('frontend.doctor.view_prescription',compact('return'));
    }

     public function closeCases(Request $request)
    {
        $close_cases = PatientCase::with('user')->where('case_closed', 'yes')->orderBy('closed_at','desc')->paginate(8);
        return view('frontend.doctor.close_cases', compact('close_cases'));
    }

     public function availableDays(Request $request)
    {
        $user = Auth::guard('siteDoctor')->user();

        if ($request->isMethod('post')) {
            try{
                $data = $request->validate([
                    "date"=>"required|after_or_equal:today",
                    "from_time"=>"required|date_format:H:i",
                    "to_time"=>"required|date_format:H:i|after:from_time",
                ]);

                $date = str_replace("/", "-", $request->date);
                $date = date('Y-m-d',strtotime($date));


                $from_date_time =  $date.' '.$request->from_time;
                $to_date_time =  $date.' '.$request->to_time;

                $from_date_time = Carbon::parse($from_date_time);

                $total_minutes = $from_date_time->diffInMinutes($to_date_time);
                // $total_time = (new Carbon($request->to_time))->diff(new Carbon($request->from_time))->format('%h:%I');
                // $slot = $total_minutes%15 ;

                if($total_minutes%15 != 0){
                    Session::flash('Error-toastr','Please match the 15 minute slot.');
                    return redirect()->back();
                }

                DB::beginTransaction();
                $time_zone = d_timezone();

                $available_day = new DoctorAvailableDays;
                $available_day->user_id = $user->id;
                $available_day->date = $date;
                $available_day->from_time = date('H:i:s', strtotime(timezoneAdjustmentStore($time_zone, $date.' '.$request->from_time)));
                $available_day->to_time = date('H:i:s', strtotime(timezoneAdjustmentStore($time_zone, $date.' '.$request->to_time)));
                $available_day->save();

                $number_of_slot = $total_minutes/15;
                $from_time = Carbon::parse($request->from_time,$time_zone)->setTimezone('UTC');
                $to_time =Carbon::parse($request->from_time,$time_zone)->setTimezone('UTC')->addMinutes(15);



                for ($i = 1; $i <= $number_of_slot; $i++) {
                    $time_slot = new TimeSlot;
                    $time_slot->user_id = $user->id;
                    $time_slot->available_day_id = $available_day->id;
                    $time_slot->start_time = $from_time->format('H:i');
                    $time_slot->end_time = $to_time->format('H:i');
                    $from_time = $from_time->addMinutes(15);
                    $to_time = $to_time->addMinutes(15);
                    $time_slot->save();
                    // echo '<pre>';
                    //    print_r($time_slot);
                }
                // exit;
                DB::commit();

                Session::flash('Success-sweet','Successfully added');
            } catch (\Exception $e) {
                Session::flash('Error-sweet', $e->getMessage());
                DB::rollback();
                return redirect()->back();
            }
        }

        $available_days_for_month = DoctorAvailableDays::where('user_id',$user->id);
        if($request->from_date && $request->to_date){
            $from_date = str_replace("/", "-", $request->from_date);
            $from_date = date('Y-m-d',strtotime($from_date));

            $to_date = str_replace("/", "-", $request->to_date);
            $to_date = date('Y-m-d',strtotime($to_date));

            $available_days_for_month = $available_days_for_month->where('date','>=',$from_date)->where('date','<=',$to_date);
        }else{
            $available_days_for_month = $available_days_for_month->whereMonth('date',date('m'));
        }
        $available_days_for_month =  $available_days_for_month->orderBy('date')->get();

        $available_days = DoctorAvailableDays::where('user_id',$user->id)->orderBy('date')->get();
        $get_current_day = DoctorAvailableDays::where('user_id',$user->id)->where('date',date('Y-m-d'))->get();
        $weekly_available_days = WeeklyAvailableDays::where('user_id',$user->id)->orderBy('num_val_for_day')->get();
        return view('frontend.doctor.available_days', compact('available_days','weekly_available_days','get_current_day','available_days_for_month'));
    }

    public function editAvailableDay(Request $request)
    {
        $user = Auth::guard('siteDoctor')->user();
        $time_zone = d_timezone();
        if(!empty($request->available_day_id)){
            //for single edit
            $id = $request->available_day_id;
            $available = DoctorAvailableDays::find($id);
            // dd($available_day);
            $available_da['from_time'] = date('H:i:s', strtotime(timezoneAdjustmentFetch($time_zone, $available->date, $available->from_time)));
            $available_da['to_time'] = date('H:i:s', strtotime(timezoneAdjustmentFetch($time_zone, $available->date, $available->to_time)));
            $available_da['date'] = $available->date;
            $available_da['id'] = $available->id;
            $available_da['user_id'] = $available->user_id;
            // $available_d[] = $available_da;
            $available_day = $available_da;
        }elseif (!empty($request->date)) {
            $date = str_replace('/','-',$request->date);
            $date = date('Y-m-d',strtotime($date));
            $available_day = DoctorAvailableDays::where('date',$date)->get();
            // dd($available_day );
            // $time_zone = $user->profile->time_zone;


            foreach($available_day as $available) {
                // if($time_zone == 2) {

                    $available_da['from_time'] = date('H:i:s', strtotime(timezoneAdjustmentFetch($time_zone, $available->date, $available->from_time)));
                    $available_da['to_time'] = date('H:i:s', strtotime(timezoneAdjustmentFetch($time_zone, $available->date, $available->to_time)));
                    $available_da['date'] = $available->date;
                // } else {

                //     $available_da['from_time'] = $available->from_time;
                //     $available_da['to_time'] = $available->to_time;
                //     $available_da['date'] = $available->date;
                // }
                $available_d[] = $available_da;
            }
            $available_day = $available_d;

        }

        if ($request->isMethod('post')) {

            $data = $request->validate([
                "date"=>"required",
                "from_time"=>"required|date_format:H:i",
                "to_time"=>"required|date_format:H:i|after:from_time",
            ]);

            $date = str_replace("/", "-", $request->date);
            $date = date('Y-m-d',strtotime($date));


            $from_date_time =  $date.' '.$request->from_time;
            $to_date_time =  $date.' '.$request->to_time;

            $from_date_time = Carbon::parse($from_date_time);

            $total_minutes = $from_date_time->diffInMinutes($to_date_time);
            // $total_time = (new Carbon($request->to_time))->diff(new Carbon($request->from_time))->format('%h:%I');
            // $slot = $total_minutes%15 ;

            if($total_minutes%15 != 0){
                Session::flash('Error-toastr','Please match the 15 minute slot.');
                return redirect()->back();
            }


            foreach ($available_day->getSlot as $slot) {
                $slot->delete();
            }

            // DB::beginTransaction();
            // $available_day = new DoctorAvailableDays;
            $available_day->user_id = $user->id;
            $available_day->date = $date;
            $available_day->from_time = date('H:i:s', strtotime(timezoneAdjustmentStore($time_zone, $date.' '.$request->from_time)));
            $available_day->to_time = date('H:i:s', strtotime(timezoneAdjustmentStore($time_zone, $date.' '.$request->to_time)));
            $available_day->save();

            $number_of_slot = $total_minutes/15;
            $from_time = Carbon::parse($request->from_time,$time_zone)->setTimezone('UTC');
            $to_time =Carbon::parse($request->from_time,$time_zone)->setTimezone('UTC')->addMinutes(15);



            for ($i = 1; $i <= $number_of_slot; $i++) {
                $time_slot = new TimeSlot;
                $time_slot->user_id = $user->id;
                $time_slot->available_day_id = $available_day->id;
                $time_slot->start_time = $from_time->format('H:i');
                $time_slot->end_time = $to_time->format('H:i');
                $from_time = $from_time->addMinutes(15);
                $to_time = $to_time->addMinutes(15);
                $time_slot->save();
                // echo '<pre>';
                //    print_r($time_slot);
            }
            // exit;
             // DB::commit();

            //   $data = $request->validate([
            //      "date"=>"required",
            //      "from_time"=>"required",
            //      "to_time"=>"required",
            //  ]);

            //  $date = str_replace("/", "-", $request->date) ;
            //  $date = date('Y-m-d',strtotime($date));

            // // $available_day->user_id = $user->id;
            // $available_day->date = $date;
            // $available_day->from_time = $request->from_time;
            // $available_day->to_time = $request->to_time;
            // $available_day->save();
            Session::flash('Success-toastr','Successfully updated');
            return redirect()->back();
        }

        if(isset( $available_day)) {
            return response()->json(['success' =>true, 'message'=>'success','data'=>$available_day], 200);
        } else{
            return response()->json(['success' =>fails, 'message'=>'No data found.','data'=>$available_day], 200);
        }
    }

    public function availableDateCheck(Request $request)
    {
        $user = Auth::guard('siteDoctor')->user();
        $time_zone = d_timezone();
        if(!empty($request->available_date_id)){
            //for single edit
            $id = $request->available_date_id;
            $available = DoctorAvailableDays::withCount('getBookedSlot')->whereHas('getBookedSlot.getCase', function($query){
                $query->where('patient_cases.accept_status',1);
            })->find($id);

            $available_pending = DoctorAvailableDays::withCount('getBookedSlot')->whereHas('getBookedSlot.getCase', function($query){
                $query->whereNull('patient_cases.accept_status');
            })->find($id);
            // dd($available, $available_pending);
        }

        if(isset( $id)) {
            return response()->json(['success' =>true, 'message'=>'success','data'=>['approve_case'=>$available,'pending_case'=>$available_pending,'available_date_id'=>$id]], 200);
        } else{
            return response()->json(['success' =>fails, 'message'=>'No data found.','data'=>$available_day], 200);
        }
    }

    public function deleteAvailableDay($id)
    {
      $available_day = DoctorAvailableDays::find($id);
      $available = DoctorAvailableDays::with('getBookedSlot.getCase.user')->withCount('getBookedSlot')->whereHas('getBookedSlot.getCase', function($query){
            $query->where('patient_cases.accept_status',1);
        })->find($id);

        $available_pending = DoctorAvailableDays::with('getBookedSlot.getCase.user')->withCount('getBookedSlot')->whereHas('getBookedSlot.getCase', function($query){
            $query->whereNull('patient_cases.accept_status');
        })->find($id);
// dd($available,$available_pending);
      if($available)
      {
          foreach($available->getBookedSlot as $bookedSlot) {
            Mail::to($bookedSlot->getCase->user->email)->send(new AvailDayChangeNotification($bookedSlot->getCase->user->name, 'Please do appointment on any other available date, and you also get refund.'));
          }
        }
        if($available_pending){
          foreach($available->getBookedSlot as $bookedSlot) {
            Mail::to($bookedSlot->getCase->user->email)->send(new AvailDayChangeNotification($bookedSlot->getCase->user->name, 'Please request for booking appointment for any other date.'));
          }
        // dd('not');


      }

          $available_day->delete();

      Session::flash('Success-toastr','Successfully deleted');
      return redirect()->back();
    }

    function addWeeklyDay(Request $request)
    {
        try{
            $time_zone = d_timezone();
            $user = Auth::guard('siteDoctor')->user();
            $weekly_day = new WeeklyAvailableDays;
            $weekly_day->user_id = $user->id;
            $weekly_day->day = $request->day;

            switch ($request->day) {
                case "monday":
                    $weekly_day->num_val_for_day = 1;
                break;
                case "tuesday":
                    $weekly_day->num_val_for_day = 2;
                break;
                case "wednesday":
                $weekly_day->num_val_for_day = 3;
                break;

                    case "thursday":
                $weekly_day->num_val_for_day = 4;
                break;
                    case "friday":
                $weekly_day->num_val_for_day = 5;
                break;
                    case "saturday":
                $weekly_day->num_val_for_day = 6;
                break;
                case "sunday":
                $weekly_day->num_val_for_day = 7;
                break;

            default:
                $weekly_day->num_val_for_day = 0;
            }
            DB::beginTransaction();

            $weekly_day->day = $request->day;
            $weekly_day->from_time = date('H:i:s', strtotime(timezoneAdjustmentStore($time_zone, date('Y-m-d').' '.$request->from_time)));
            $weekly_day->to_time = date('H:i:s', strtotime(timezoneAdjustmentStore($time_zone, date('Y-m-d').' '.$request->to_time)));
            $weekly_day->save();
            $startDate = date('Y-m-d');
            $endDate = (date('Y')+5).'-12-31';
            $endDate = strtotime($endDate);

            for($i = strtotime(ucfirst($request->day), strtotime($startDate)); $i <= $endDate; $i = strtotime('+1 week', $i)){
                $date = date('Y-m-d', $i);

                $from_date_time =  $date.' '.$request->from_time;
                $to_date_time =  $date.' '.$request->to_time;

                $from_date_time = Carbon::parse($from_date_time);

                $total_minutes = $from_date_time->diffInMinutes($to_date_time);


                $available_day = new DoctorAvailableDays;
                $available_day->user_id = $user->id;
                $available_day->date = $date;
                $available_day->from_time = date('H:i:s', strtotime(timezoneAdjustmentStore($time_zone, $date.' '.$request->from_time)));
                $available_day->to_time = date('H:i:s', strtotime(timezoneAdjustmentStore($time_zone, $date.' '.$request->to_time)));
                $available_day->save();

                $number_of_slot = $total_minutes/15;
                $from_time = Carbon::parse($request->from_time,$time_zone)->setTimezone('UTC');
                $to_time =Carbon::parse($request->from_time,$time_zone)->setTimezone('UTC')->addMinutes(15);



                for ($j = 1; $j <= $number_of_slot; $j++) {
                    $time_slot = new TimeSlot;
                    $time_slot->user_id = $user->id;
                    $time_slot->available_day_id = $available_day->id;
                    $time_slot->start_time = $from_time->format('H:i');
                    $time_slot->end_time = $to_time->format('H:i');
                    $from_time = $from_time->addMinutes(15);
                    $to_time = $to_time->addMinutes(15);
                    $time_slot->save();
                    // echo '<pre>';
                    //    print_r($time_slot);
                }
                    // exit;

            }
            DB::commit();

        } catch (\Exception $e) {
            Session::flash('Error-toastr', $e->getMessage());
            DB::rollback();
            return redirect()->back();
        }
 // exit;
        Session::flash('Success-toastr','Successfully added');
        return redirect()->back();
    }
 public function deleteWeeklyDay($id)
    {
      $user = Auth::guard('siteDoctor')->user();
      $available_day = WeeklyAvailableDays::find($id);

      // return $available_day;

      $startDate = date('Y-m-d');
      $endDate = (date('Y')+5).'-12-31';
      $endDate = strtotime($endDate);
for($i = strtotime(ucfirst($available_day->day), strtotime($startDate)); $i <= $endDate; $i = strtotime('+1 week', $i)){
         $date = date('Y-m-d', $i);
$get_day = DoctorAvailableDays::where('date',$date)->where('user_id',$user->id)->where('from_time',$available_day->from_time)->where('to_time',$available_day->to_time)->first();

if($get_day){
$get_day = $get_day->delete();
}

       //   $from_date_time =  $date.' '.$request->from_time;
       //   $to_date_time =  $date.' '.$request->to_time;

       //   $from_date_time = Carbon::parse($from_date_time);

       //   $total_minutes = $from_date_time->diffInMinutes($to_date_time);


       //  $available_day = new DoctorAvailableDays;
       //  $available_day->user_id = $user->id;
       //  $available_day->date = $date;
       //  $available_day->from_time = $request->from_time;
       //  $available_day->to_time = $request->to_time;
       //  $available_day->save();

       //  $number_of_slot = $total_minutes/15;
       //  $from_time = Carbon::parse($request->from_time);
       //  $to_time =Carbon::parse($request->from_time)->addMinutes(15);



       // for ($j = 1; $j <= $number_of_slot; $j++) {
       //  $time_slot = new TimeSlot;
       //  $time_slot->user_id = $user->id;
       //  $time_slot->available_day_id = $available_day->id;
       //  $time_slot->start_time = $from_time->format('H:i');
       //  $time_slot->end_time = $to_time->format('H:i');
       //  $from_time = $from_time->addMinutes(15);
       //  $to_time = $to_time->addMinutes(15);
       //  $time_slot->save();
       //  // echo '<pre>';
       //  //    print_r($time_slot);
       // }
        // exit;

}


      $available_day->delete();
      Session::flash('Success-toastr','Successfully deleted');
      return redirect()->back();
    }


     public function editWeeklyDay(Request $request)
    {
      $id = $request->weekly_day_id;
      $time_zone = d_timezone();
      $weekly_day = WeeklyAvailableDays::find($id);
      $weekly_da['from_time'] = date('H:i:s',strtotime(timezoneAdjustmentFetch($time_zone, date('Y-m-d'), $weekly_day->from_time)));
      $weekly_da['to_time'] = date('H:i:s',strtotime(timezoneAdjustmentFetch($time_zone, date('Y-m-d'), $weekly_day->to_time)));
      $weekly_da['id'] = $weekly_day->id;
      $weekly_da['user_id'] = $weekly_day->user_id;
      $weekly_da['day'] = $weekly_day->day;

      $weekly_day = $weekly_da;
      if ($request->isMethod('post')) {
         //  $data = $request->validate([
         //     "day"=>"required",
         //     "from_time"=>"required",
         //     "to_time"=>"required",
         // ]);
            switch ($request->day) {
                case "monday":
                    $weekly_day->num_val_for_day = 1;
                    break;
                case "tuesday":
                    $weekly_day->num_val_for_day = 2;
                    break;
                case "wednesday":
                    $weekly_day->num_val_for_day = 3;
                    break;

                    case "thursday":
                    $weekly_day->num_val_for_day = 4;
                    break;
                    case "friday":
                    $weekly_day->num_val_for_day = 5;
                    break;
                    case "saturday":
                    $weekly_day->num_val_for_day = 6;
                    break;
                    case "sunday":
                    $weekly_day->num_val_for_day = 7;
                    break;

                default:
                    $weekly_day->num_val_for_day = 0;
            }

        $weekly_day->day = $request->day;
        $weekly_day->from_time = date('H:i:s',strtotime(timezoneAdjustmentStore($time_zone, date('Y-m-d').' '.$request->from_time)));
        $weekly_day->to_time = date('H:i:s',strtotime(timezoneAdjustmentStore($time_zone, date('Y-m-d').' '.$request->to_time)));
        $weekly_day->save();
         Session::flash('Success-toastr','Successfully updated');
         return redirect()->back();


      }
      return response()->json(['success' =>true, 'message'=>'success','data'=>$weekly_day], 200);
    }


    public function cases(Request $request, $questions_type, $status=null)
    {
      $cases = PatientCase::select('*');

      if($status == 'accepted'){
      $cases = $cases->where('accept_status',1)->where('status','!=',3);
      }else{
      $cases = $cases->where('accept_status',null)->where('status','!=',3);
      }

      $cases = $cases->where('case_type',1);


      // if($questions_type == 'live-chat'){
      //   $cases = $cases->where('questions_type',1)->where('doctor_id',Auth::guard('siteDoctor')->user()->id);

      // }
      //  if($questions_type == 'live-video'){
      //   $cases = $cases->where('questions_type',2)->where('doctor_id',Auth::guard('siteDoctor')->user()->id);
      // }
      //  if($questions_type == 'quick-questions'){
      //   $cases = $cases->where('questions_type',3)->where(function($query){
      //     $query->where('doctor_id',Auth::guard('siteDoctor')->user()->id)->orWhere('doctor_reply',null);
      //   });
      // }
      //  if($questions_type == 'book-qa'){
      //    $cases = $cases->where('questions_type',4)->where('doctor_id',Auth::guard('siteDoctor')->user()->id);
      // }

       $cases = $cases->where(function($query){
          $query->where('doctor_id',Auth::guard('siteDoctor')->user()->id)->orWhere('doctor_reply',null);
           });

      $cases = $cases->orderBy('id','desc')->paginate(6);
      // echo $q_type; exit;



        return view('frontend.doctor.cases', compact('cases'));

    }



     public function quickQuestions(Request $request)
    {
        $quick_questions = PatientCase::where('questions_type',3)->where(function($query){
          $query->where('doctor_id',Auth::guard('siteDoctor')->user()->id)->orWhere('doctor_reply',null);
        })->orderBy('id','desc')->paginate(6);
        return view('frontend.doctor.quick_questions', compact('quick_questions'));

    }


     public function prescriptions(Request $request)
    {
        $quick_questions = PatientCase::where('case_type',2)->where(function($query){
          $query->where('doctor_id',Auth::guard('siteDoctor')->user()->id)->orWhere('doctor_id',null);
        })->orderBy('id','desc')->paginate(6);
        return view('frontend.doctor.prescriptions', compact('quick_questions'));

    }


    public function liveChats(Request $request)
    {
        $live_chats = PatientCase::where('questions_type',1)->where('doctor_id',Auth::guard('siteDoctor')->user()->id)->orderBy('id','desc')->paginate(6);
        return view('frontend.doctor.live_chat', compact('live_chats'));

    }

    public function liveVideo(Request $request)
    {
        $live_chats = PatientCase::where('questions_type',2)->where('doctor_id',Auth::guard('siteDoctor')->user()->id)->orderBy('id','desc')->paginate(6);
        return view('frontend.doctor.live_video', compact('live_chats'));
    }

    public function viewCase(Request $request,$id)
    {
        $case = PatientCase::where('case_id',$id)->first();
        return view('frontend.doctor.view_case', compact('case'));

    }

    public function viewMedicalRecorde(Request $request,$id)
    {
        $case = PatientCase::where('case_id',$id)->first();
         $symptroms_details = SymptromsDetails::where('user_id',$case->user->id)->get();
        $last_symptroms_details = SymptromsDetails::where('user_id',$case->user->id)->orderBy('id','DESC')->first();
        $past_symptoms = PastSymptoms::where('user_id',$case->user->id)->where('type',1)->get();
        $past_symptoms2 = PastSymptoms::where('user_id',$case->user->id)->where('type',2)->get();
        $drugs_details = DrugsDetails::where('user_id',$case->user->id)->get();
        $drugs_problem = DrugsProblem::where('user_id',$case->user->id)->get();
        $cases = PatientCase::where('user_id',$case->user->id)->latest()->get();

        return view('frontend.doctor.medical_record', compact('case','symptroms_details','past_symptoms','drugs_details','drugs_problem','past_symptoms2','cases','last_symptroms_details'));

    }

    public function chats(Request $request, $id)
    {
      $case = PatientCase::where('case_id',$id)->first();
      return view('frontend.doctor.chats', compact('case'));
    }

    public function doctorReplyCase(Request $request)
    {
      $case = PatientCase::where('case_id',$request->case_id)->first();
      $case->doctor_id = Auth::guard('siteDoctor')->user()->id;
      $case->doctor_reply = 1;
      $case->save();
       return response()->json(['success' =>true, 'message'=>'success.','data'=>$case], 200);
    }

    public function doctorAcceptCase(Request $request,$id)
    {
      $case = PatientCase::find($id);
      if(($case->case_type == 2) && ($case->questions_type == 3)){

        $accept_case = new AcceptedPrescriptionDoc;
        $accept_case->patient_case_id = $case->id;
        $accept_case->doctor_id = Auth::guard('siteDoctor')->user()->id;
        $accept_case->save();
      Session::flash('Success-toastr','Successfully Accepted');
      return redirect()->back();

      }else{
      $case->doctor_id = Auth::guard('siteDoctor')->user()->id;
      }

      $case->accept_status = 1;
      $case->save();
      Session::flash('Success-toastr','Successfully Accepted');
      return redirect()->back();
    }

    public function summaryDiagnosis(Request $request,$id)
    {
      $case = PatientCase::where('case_id',$id)->first();

      if($request->isMethod('post')){


        $summary_diagnosis = SummaryDiagnosis::where('patient_case_id',$case->id)->first();
        if(empty($summary_diagnosis)){
        $summary_diagnosis = new SummaryDiagnosis;
            PatientCase::where('case_id',$id)->update(['case_closed' => 'yes','closed_at' => date('Y-m-d')]);
        }


        $summary_diagnosis->user_id = $case->user_id;
        $summary_diagnosis->patient_case_id = $case->id;
        $summary_diagnosis->summary_diagnose = $request->summary_diagnose;
        $summary_diagnosis->future_reference = $request->future_reference;
        $summary_diagnosis->save();
        Session::flash('Success-toastr','Successfully added');
      }

      return view('frontend.doctor.summary_diagnosis', compact('case'));
    }

    public function cancelBooking($id)
    {
        // dd($id);
        PatientCase::where('case_id',$id)->update(['status' => 3,'cancel_by' =>Auth::guard('siteDoctor')->user()->id, 'cancel_date' => date('Y-m-d H:i:s')]);
        $case_primary_id = PatientCase::where('case_id',$id)->value('id');
        // return view('frontend.patient.view_handy_doc',compact('handy_doc'));
        BookTimeSlot::where('patient_case_id',$case_primary_id)->update(['status'=> 3]);
        $intent_id = Payment::where('case_id',$id)->value('intent_id');
        Payment::where('case_id',$id)->update(['status' => 4]);
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $re = \Stripe\Refund::create([
            'payment_intent' => $intent_id,
        ]);

        // $intent = \Stripe\PaymentIntent::retrieve($intent_id);
        // $intent->cancel();
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

    public function videoCallDoc($id)
    {
        $case = PatientCase::where('accept_status',1)->where('doctor_id',Auth::guard('siteDoctor')->user()->id)->where('case_id',$id)->first();
        return view('common.video_call_test',compact('case','id'));
    }

    public function printCaseSummery($id)
    {
        $summary = SummaryDiagnosis::where('patient_case_id',$id)->first();
        $case_detail = PatientCase::where('case_id',$id)->first();
        return view('frontend.patient.print_case_summery',compact('summary','case_detail'));
    }

    public function ajaxDeletePriscription(Request $request){
        //print_r($request->id);
        $return = array('success'=>'no');
        //exit;
        if($request->id !=''){
          $prescription_no = uniqid();
          $Prescription = Prescription::where('id','=',$request['id'])->delete();
          $return = array('success'=>'yes');
        }
        return response()->json( $return);

    }

    public function prescriptionComment(Request $request) {
        $p_ct = new PrescriptionComment;
        $p_ct->case_id = $request->case_id;
        $p_ct->comments = $request->comments;
        $p_ct->save();
        return redirect()->back();
    }

    public function prescriptionCommentlist(Request $request) {
        $timezone = d_timezone();
        $pct = PrescriptionComment::where('case_id',$request->case_id)->get();
        foreach($pct as $pcs){
            $pcl['comments'] = $pcs->comments;
            $pcl['created_at'] = timezoneAdjustmentFetchTwo($timezone,$pcs->created_at);
            $pcv[] = $pcl;
        }

        return $pcv;
    }

    public function sickNote(Request $request,$id)
    {
        $case = '';
        $case = PatientCase::where('case_id',$id)->first();

        if($request->isMethod('post')){


            $sicknotes = SickNote::where('case_id',$id)->first();
            if(empty($sicknotes)){
            $sicknotes = new SickNote;
                // PatientCase::where('case_id',$id)->update(['case_closed' => 'yes','closed_at' => date('Y-m-d')]);
            }


            $sicknotes->user_id = $case->user_id;
            $sicknotes->case_id = $case->case_id;
            $sicknotes->medical_condition = $request->medical_condition;
            $sicknotes->remarks = $request->remarks;
            $sicknotes->save();
            Session::flash('Success-toastr','Successfully added');
        }
        $sicknote = SickNote::where('case_id',$id)->first();

        return view('frontend.doctor.sick_note', compact('case','sicknote'));
    }

    public function inviteVideo($case_id,$user_id)
    {
        // send mail to parent or user
        $user = User::find($user_id);
        // dump($user);
        if($user->role == 4) {
            $parents = $user->parents;
            // dd($parents);
            foreach($parents as $parent) {
                $user =  User::find($parent->user_id);
                Mail::to($user->email)->send(new InviteVideo($case_id, $user, $user_id));
            }
        } else{

            Mail::to($user->email)->send(new InviteVideo($case_id, $user, $user_id));
        }

        //send mail to doctor
        $doctor = Auth::user();
        Mail::to($doctor->email)->send(new InviteVideo($case_id, $doctor, $user_id));
        Session::flash('Success-toastr','Invitation sent successfully');
        return redirect()->route('doctor.video-call-pres', [$case_id, $user_id]);
        // return view('frontend.doctor.invite_video_link', compact('case_id'));
    }

    public function videoCallDocPres($case_id,$user_id)
    {
        return view('common.video_call_pres',compact('case_id','user_id'));
    }

    public function verifyId($user_id)
    {
        User::where('id',$user_id)->update(['id_verify' => date('Y-m-d H:i:s')]);
        Session::flash('Success-toastr','Verified successfully');
        return redirect()->route('doctor.dashboard');
    }
}
