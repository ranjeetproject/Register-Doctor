<?php

namespace App\Http\Controllers\pharmacist;

use App\Http\Controllers\Controller;
use App\Models\DeliveryOptions;
use App\Models\PharmacyOpeningTime;
use App\Models\UserProfile;
use Auth, Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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
        return view('frontend.pharmacist.dashboard');
    }

    public function profile(Request $request) {
        if($request->isMethod('post')){

            // dd($request->all());


         $data = $request->validate([
      "forename"=>"required|min:3|max:100",
      "surname"=>"required|min:3|max:100",
      "telephone1"=>"required|digits:10",
      "location"=>"required",
      "address"=>"required",
      "pharmacy_numbar"=>"required",
      "pharmacy_name"=>"required",
      "profile_photo"=>"image|mimes:jpeg,png,jpg|max:2048",
      // "old_password"=>"sometimes|nullable|required",
      // "new_password"=>"sometimes|nullable|required|min:6",
      // "confirm_password"=>"sometimes|nullable|required|same:new_password",
      ]);

// dd($request->all());
 DB::beginTransaction();
    try {
     $user = Auth::guard('sitePharmacist')->user();
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


         // $opening_time = PharmacyOpeningTime::findOrCreate($user->id);
         $opening_time = PharmacyOpeningTime::where('user_id',$user->id)->first();
         $opening_time = $opening_time ?? new PharmacyOpeningTime;

         $opening_time->user_id =  $user->id;

         $opening_time->monday =  ($request->monday) ? 1 : 0;
         $opening_time->monday_opening_time =  $request->opening_time;
         $opening_time->monday_closing_time =  $request->closing_time;


         $opening_time->tuesday =  ($request->tuesday) ? 1 : 0;
         $opening_time->tuesday_opening_time =  $request->opening_time;
         $opening_time->tuesday_closing_time =  $request->closing_time;


         $opening_time->wednesday =  ($request->wednesday) ? 1 : 0;
         $opening_time->wednesday_opening_time =  $request->opening_time;
         $opening_time->wednesday_closing_time =  $request->closing_time;


         $opening_time->thursday =  ($request->thursday) ? 1 : 0;
         $opening_time->thursday_opening_time =  $request->opening_time;
         $opening_time->thursday_closing_time =  $request->closing_time;


         $opening_time->friday =  ($request->friday) ? 1 : 0;
         $opening_time->friday_opening_time =  $request->opening_time;
         $opening_time->friday_closing_time =  $request->closing_time;


         $opening_time->saturday =  ($request->saturday) ? 1 : 0;
         $opening_time->saturday_opening_time =  $request->opening_time;
         $opening_time->saturday_closing_time =  $request->closing_time;


         $opening_time->sunday =  ($request->sunday) ? 1 : 0;
         $opening_time->sunday_opening_time =  $request->opening_time;
         $opening_time->sunday_closing_time =  $request->closing_time;

         $opening_time->save();


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

}