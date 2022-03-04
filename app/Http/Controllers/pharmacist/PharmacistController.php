<?php

namespace App\Http\Controllers\pharmacist;

use App\Http\Controllers\Controller;
use App\Models\DeliveryOptions;
use App\Models\PharmacyOpeningTime;
use App\Models\UserProfile;
use App\Models\HandyDocument;
use App\Models\PersonTOPersonChat;
use App\Models\SpecialAvailability;
use Auth, Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Prescription_req_doctor;
use App\Prescription;
use App\user;
use App\Models\pharma_req_prescription;
use App\Models\PatientCase;
// use Session;


class PharmacistController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','isPharmacist']);

    }


    public function dashboard() {
        d_timezone('asd');
        $user_id = auth()->user()->id;
        $new_prescription = pharma_req_prescription::where('read',0)->where('pharma_id',$user_id)->count();
        return view('frontend.pharmacist.dashboard',compact('new_prescription'));
    }

    public function profile(Request $request) {
        if($request->isMethod('post')){
            $user = Auth::guard('sitePharmacist')->user();

            $validator = Validator::make($request->all(), [
                "forename"=>"required|min:3|max:100",
                "surname"=>"required|min:3|max:100",
                "telephone1"=>"required|digits:11",
                "location"=>"required",
                "address"=>"required",
                "pharmacy_numbar"=>"required",
                "pharmacy_name"=>"required",
                "profile_photo"=>"image|mimes:jpeg,png,jpg|max:2048",
                'email' => 'sometimes|nullable|required|unique:users,email,'.$user->id,
            ]);

            if ($validator->fails()) {
                Session::flash('Error-toastr','Please fill in all the fields before proceeding');
                return redirect()->back();
            }

            DB::beginTransaction();
            try {
                    // if(!empty($request->email) && ($user->email != $request->email)){
                    //     $request->validate([
                    //         'email' => 'sometimes|nullable|required|unique:users,email,'.$user->id,
                    //     ]);
                    // }
                if(!empty($request->forename) ) $user->forename = $request->forename;
                if(!empty($request->surname) ) $user->surname = $request->surname;
                if(!empty($request->forename) && !empty($request->surname)) $user->name = $request->forename.' '.$request->surname;
                if(!empty($request->email) && ($user->email != $request->email)) $user->email = $request->email;

                // $user->registration_number = $request->email;

                $user->save();
                $profile = UserProfile::where('user_id',$user->id)->first();
                $profile = $profile ?? new UserProfile;
                $profile->user_id = $user->id;

                $profile->pharmacy_name = $request->pharmacy_name;
                $profile->telephone1 = $request->telephone1;
                $profile->telephone2 = $request->telephone2;
                $profile->telephone3 = $request->telephone3;
                $profile->location = $request->location;
                $profile->address = $request->address;
                $profile->about = $request->about;
                $profile->website = $request->website;
                // $profile->delivery_option = $request->delivery_option;

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

                $delivery_option = DeliveryOptions::where('user_id',$user->id)->first();
                $delivery_option = $delivery_option ?? new DeliveryOptions;
                $delivery_option->user_id = $user->id;
                $delivery_option->customer_pick_up = $request->customer_pick_up ?? '0';
                $delivery_option->local_delivery = $request->local_delivery ?? '0';
                $delivery_option->posts_within_uk = $request->posts_within_uk ?? '0';
                $delivery_option->sends_international = $request->sends_international ?? '0';
                $delivery_option->notes = $request->notes;
                $delivery_option->save();

                DB::commit();
                Session::flash('Success-toastr','Profile Successfully updated');
            } catch (\Exception $e) {
                Session::flash('Error-toastr', $e->getMessage());
                DB::rollback();
            }
            return redirect()->back();
        }

        $user = Auth::guard('sitePharmacist')->user();
        // return $user->profile;
        return view('frontend.pharmacist.profile', compact('user'));
    }


    public function changePassword(Request $request)
    {
        if($request->isMethod('post')){
         $data = $request->validate([
             "old_password"=>"required",
             "new_password"=>"required|min:6",
             "confirm_password"=>"required|same:new_password",
         ]);

          $user = Auth::guard('sitePharmacist')->user();

         if (isset($request->old_password) && !empty($request->old_password)) {
        if (!(Hash::check($request->old_password, Auth::guard('sitePharmacist')->user()->password))) {
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
        return view('frontend.pharmacist.change_password');
    }


    function openingHours(Request $request)
    {
       $user = Auth::guard('sitePharmacist')->user();
       $time_zone = d_timezone();

      if ($request->isMethod('post')) {

         $opening_time = PharmacyOpeningTime::where('user_id',$user->id)->first();
         $opening_time = $opening_time ?? new PharmacyOpeningTime;

         $opening_time->user_id =  $user->id;

         // $opening_time->monday =  ($request->monday) ? 1 : 0;
         $opening_time->monday_opening_time =  $request->monday_opening_time;
         $opening_time->monday_closing_time =  $request->monday_closing_time;
         $opening_time->monday = (!empty($request->monday_opening_time) && !empty($request->monday_closing_time) ) ? 1 : 0;


         // $opening_time->tuesday =  ($request->tuesday) ? 1 : 0;
         $opening_time->tuesday_opening_time =  $request->tuesday_opening_time;
         $opening_time->tuesday_closing_time =  $request->tuesday_closing_time;
         $opening_time->tuesday = (!empty($request->tuesday_opening_time) && !empty($request->tuesday_closing_time) ) ? 1 : 0;


         // $opening_time->wednesday =  ($request->wednesday) ? 1 : 0;
         $opening_time->wednesday_opening_time =  $request->wednesday_opening_time;
         $opening_time->wednesday_closing_time =  $request->wednesday_closing_time;
         $opening_time->wednesday = (!empty($request->wednesday_opening_time) && !empty($request->wednesday_closing_time) ) ? 1 : 0;



         // $opening_time->thursday =  ($request->thursday) ? 1 : 0;
         $opening_time->thursday_opening_time =  $request->thursday_opening_time;
         $opening_time->thursday_closing_time =  $request->thursday_closing_time;
         $opening_time->thursday = (!empty($request->thursday_opening_time) && !empty($request->thursday_closing_time) ) ? 1 : 0;



         // $opening_time->friday =  ($request->friday) ? 1 : 0;
         $opening_time->friday_opening_time =  $request->friday_opening_time;
         $opening_time->friday_closing_time =  $request->friday_closing_time;
         $opening_time->friday = (!empty($request->friday_opening_time) && !empty($request->friday_closing_time) ) ? 1 : 0;


         // $opening_time->saturday =  ($request->saturday) ? 1 : 0;
         $opening_time->saturday_opening_time =  $request->saturday_opening_time;
         $opening_time->saturday_closing_time =  $request->saturday_closing_time;
         $opening_time->saturday = (!empty($request->saturday_opening_time) && !empty($request->saturday_closing_time) ) ? 1 : 0;


         $opening_time->sunday_opening_time =  $request->sunday_opening_time;
         $opening_time->sunday_closing_time =  $request->sunday_closing_time;
         // $opening_time->sunday =  ($request->sunday) ? 1 : 0;
         $opening_time->sunday = (!empty($request->sunday_opening_time) && !empty($request->sunday_closing_time) ) ? 1 : 0;
         $opening_time->notes =  $request->notes;



         $opening_time->save();
         Session::flash('Success-toastr','Successfully updated');

      }
      $specialAvailabilities = SpecialAvailability::where('user_id',$user->id)->where('available',1)->get();
      $specialUnAvailabilities = SpecialAvailability::where('user_id',$user->id)->where('available',0)->get();

      return view('frontend.pharmacist.opening_hours',compact('user','time_zone','specialAvailabilities','specialUnAvailabilities'));
    }

    public function handyDocument(Request $request)
    {
        $handy_docs = HandyDocument::where('user_role',3)->latest()->paginate(10);
        return view('frontend.pharmacist.handy_document',compact('handy_docs'));
    }

    public function viewHandyDocument($id)
    {
        $handy_doc = HandyDocument::where('user_role',3)->where('id',$id)->first();
        return view('frontend.pharmacist.view_handy_doc',compact('handy_doc'));
    }
    public function acceptedPriscription(Request $request)
    {
        $priscriptions = pharma_req_prescription::where('send_status','!=',1)->get();
        //print_r($priscriptions);

        return view('frontend.pharmacist.accepted_priscription',compact('priscriptions'));
    }

    public function ajaxAcceptPriscriptionDetails(Request $request)
    {

        $case = PatientCase::where( 'case_id', $request->case_id)->with('user')->get();
        $prescription = PatientCase::where( 'case_id', $request->case_id)->with('pharma_req_prescription')->with('prescription')->get();

        $return = array('case_details'=>$case, 'prescription'=>$prescription);
        return response()->json( $return);

    }
    public function dispensedPrescriptions(Request $request)
    {
        $priscriptions = pharma_req_prescription::where('send_status','=',1)->get();
        //print_r($priscriptions);
        return view('frontend.pharmacist.dispensed_prescriptions',compact('priscriptions'));
    }

    public function ajaxDispensedPrescriptions(Request $request)
    {

        $case = PatientCase::where('case_id', $request->case_id)->with('user')->get();
        $prescription = PatientCase::where( 'case_id', $request->case_id)->with('prescription')->get();

        $return = array('case_details'=>$case, 'prescription'=>$prescription);
        return response()->json( $return);

    }

    public function chats(Request $request, $id)
    {
        $sender_id = Auth::user()->id;
      $user_detail = User::findOrFail($id);


      if($user_detail->roll == 1){
        $chat_details = PersonTOPersonChat::where('ph_id',$sender_id)->where('p_id',$id)->first();
        // User::findOrFail($id)
      } elseif ($user_detail->roll == 2) {
        $chat_details = PersonTOPersonChat::where('ph_id',$sender_id)->where('d_id',$id)->first();
      }

      if($chat_details) {
        $peerPeerId = $chat_details->id;
      } else {
        $chat = new PersonTOPersonChat;
        $chat->ph_id = $sender_id;
        if ($user_detail->roll == 2) {
            # code...
            $chat->d_id = $id;
        } else {

            $chat->p_id = $id;
        }
        $chat->save();
        $peerPeerId = $chat->id;
      }

      $chat_id = getDirectChatId($peerPeerId);

      return view('frontend.pharmacist.chats', compact('user','chat_id'));
    }

    public function chat(Request $request)
    {
      return view('frontend.pharmacist.chat');
    }

    public function chat_post(Request $request)
    {
        $key_per = $request->param;
        $val_sur = $request->search;
        $p_user = '';
        $d_user = '';

        if($request->param == 1){
            $users = User::where('name',$request->search)->where('role',1)->get();
        } elseif ($request->param == 2) {
            $users = User::where('registration_number',$request->search)->where('role',1)->get();
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
      return view('frontend.pharmacist.chat',compact('users','p_user','d_user','key_per','val_sur'));
    }

    public function acceptedPriscriptionSubmit(Request $request)
    {
        $accepted_priscription = pharma_req_prescription::where('case_id', $request->case_id)->update(['send_status'=> 1]);
        $return = array('accepted_priscription'=>$accepted_priscription);
        return response()->json( $return);
    }

    public function specialAvailability(Request $request)
    {
        if ($request->isMethod('post')) {
            // dd($request->available_dt);
            $date = date("Y-m-d", strtotime($request->available_dt));
           $specialAvailability = new SpecialAvailability;
           $specialAvailability->user_id = auth()->user()->id;
           $specialAvailability->available_at = $request->available? $date.' '.$request->from_time:$date;
           $specialAvailability->available_to = $request->available? $date.' '.$request->to_time:$date;
           $specialAvailability->available = $request->available? 1:0;
           $specialAvailability->save();
           Session::flash('Success-toastr','Successfully added');
           return redirect()->back();
        }
    }

}
