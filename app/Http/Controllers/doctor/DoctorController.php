<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use App\Models\DoctorAvailableDays;
use App\Models\PatientCase;
use App\Models\TimeSlot;
use App\Models\UserProfile;
use App\Models\WeeklyAvailableDays;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        return view('frontend.doctor.handy_document');
    }

    public function getThumbsUp(Request $request)
    {
        return view('frontend.doctor.get_thumbsUp');
    }

    public function appointment(Request $request)
    {
      $cases = PatientCase::where('accept_status',1)->where('doctor_id',Auth::guard('siteDoctor')->user()->id)->latest()->paginate(8);
        return view('frontend.doctor.appointment',compact('cases'));
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

     public function availableDays(Request $request)
    {
         $user = Auth::guard('siteDoctor')->user();

      if ($request->isMethod('post')) {
        try{
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
        
          DB::beginTransaction();
        $available_day = new DoctorAvailableDays;
        $available_day->user_id = $user->id;
        $available_day->date = $date;
        $available_day->from_time = $request->from_time;
        $available_day->to_time = $request->to_time;
        $available_day->save();

        $number_of_slot = $total_minutes/15;
        $from_time = Carbon::parse($request->from_time);
        $to_time =Carbon::parse($request->from_time)->addMinutes(15);
      
     

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

         Session::flash('Success-toastr','Successfully added');
         } catch (\Exception $e) {
            Session::flash('Error-toastr', $e->getMessage());
            DB::rollback();
            return redirect()->back();
        }


      }

      $available_days = DoctorAvailableDays::where('user_id',$user->id)->get();
      $get_current_day = DoctorAvailableDays::where('user_id',$user->id)->where('date',date('Y-m-d'))->get();
      $weekly_available_days = WeeklyAvailableDays::where('user_id',$user->id)->orderBy('num_val_for_day')->get();
        return view('frontend.doctor.available_days', compact('available_days','weekly_available_days','get_current_day'));
    }

    public function editAvailableDay(Request $request)
    {

      if(!empty($request->available_day_id)){
      $id = $request->available_day_id;
      $available_day = DoctorAvailableDays::find($id);
      }elseif (!empty($request->date)) {
         $date = str_replace('/','-',$request->date);
         $date = date('Y-m-d',strtotime($date));
         $available_day = DoctorAvailableDays::where('date',$date)->get();
      }

      if ($request->isMethod('post')) {
          $data = $request->validate([
             "date"=>"required",
             "from_time"=>"required",
             "to_time"=>"required",
         ]);

         $date = str_replace("/", "-", $request->date) ;
         $date = date('Y-m-d',strtotime($date));

        // $available_day->user_id = $user->id;
        $available_day->date = $date;
        $available_day->from_time = $request->from_time;
        $available_day->to_time = $request->to_time;
        $available_day->save();
         Session::flash('Success-toastr','Successfully updated');
         return redirect()->back();
      

      }
      if(isset( $available_day)){
      return response()->json(['success' =>true, 'message'=>'success','data'=>$available_day], 200);
      }else{
      return response()->json(['success' =>fails, 'message'=>'No data found.','data'=>$available_day], 200);
      }
    }

    public function deleteAvailableDay($id)
    {
      $available_day = DoctorAvailableDays::find($id);
      $available_day->delete();
      Session::flash('Success-toastr','Successfully deleted');
      return redirect()->back();
    }

    function addWeeklyDay(Request $request)
    {
      try{
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
      $weekly_day->from_time = $request->from_time;
      $weekly_day->to_time = $request->to_time;
      $weekly_day->save();
$startDate = date('Y-m-d');
$endDate = date('Y').'-12-31';
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
        $available_day->from_time = $request->from_time;
        $available_day->to_time = $request->to_time;
        $available_day->save();

        $number_of_slot = $total_minutes/15;
        $from_time = Carbon::parse($request->from_time);
        $to_time =Carbon::parse($request->from_time)->addMinutes(15);
      
     

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
      $available_day = WeeklyAvailableDays::find($id);
      $available_day->delete();
      Session::flash('Success-toastr','Successfully deleted');
      return redirect()->back();
    }


     public function editWeeklyDay(Request $request)
    {
      $id = $request->weekly_day_id;
      $weekly_day = WeeklyAvailableDays::find($id);
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
        $weekly_day->from_time = $request->from_time;
        $weekly_day->to_time = $request->to_time;
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
      $cases = $cases->where('accept_status',1);
      }else{
      $cases = $cases->where('accept_status',null);
      }
      
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
          $query->where('doctor_id',Auth::guard('siteDoctor')->user()->id);
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
        // $cases = PatientCase::where('user_id',Auth::guard('sitePatient')->user()->id)->latest()->paginate(10);
        return view('frontend.doctor.medical_record', compact('case'));
      
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
      $case->doctor_id = Auth::guard('siteDoctor')->user()->id;
      $case->accept_status = 1;
      $case->save();
      Session::flash('Success-toastr','Successfully Accepted');
      return redirect()->back();
    }


}