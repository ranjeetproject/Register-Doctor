<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\AdminVerification;
use App\Mail\Registration;
use App\Models\Role;
use App\Models\UserProfile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Session;


class UserController extends Controller
{
    public function userList(Request $request,$type)
    {

      $users = User::whereRole($type);
        if ($request->search) {
              $users = $users->where('name', 'LIKE',"%{$request->search}%");
        }
      $users = $users->latest()->paginate($this->per_page);
      $users = $users->appends(request()->query());
      $total_users = User::whereStatus(1)->whereRole($type)->count();
      return view('admin.user.list',compact('users','total_users'));
    }

    public function addUser(Request $request)
    {
     if($request->isMethod('post')){

       $validator = $request->validate(
           [
              "name"=>"required",
              "email"=>"required|email|unique:users,email",
              "password"=>"required|min:6",
              "confirm_password"=>"required|same:password",
            ]
      );

       DB::beginTransaction();
    try {
      $user = new User;
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = Hash::make($request->password);
      $user->save();

        $role = Role::where('role','user')->first();
         $user->role = $role->id;
         $user->save();

        Mail::to($request->email)->send(new Registration($user->id));
        DB::commit();
      if(!empty($user->id)){
            Session::flash('Success-toastr', 'Registration successfully.');
          } else {
            Session::flash('Error-toastr', 'Something want wrong. Please try again.');
          }
       return redirect()->back();
        } catch (\Exception $e) {
            Session::flash('Error', $e->getMessage());
            DB::rollback();
            return redirect()->back();
        }
     }
      return view('admin.user.add');
    }

    public function userView($id)
    {
      $user = User::find($id);
      return view('admin.user.view',compact('user'));
    }

    public function userEdit($id)
    {
      $user = User::find($id);
      return view('admin.user.edit',compact('user'));
    }

	public function userUpdate(Request $request)
	    {
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
     $user = User::find($request->user_id);
      if(!empty($request->email) && ($user->email != $request->email)){
          $request->validate([
          'email' => 'sometimes|nullable|required|unique:users,email',
        ]);
         }
     if(!empty($request->name) ) $user->name = $request->name;
     if(!empty($request->email) && ($user->email != $request->email)) $user->email = $request->email;
      // if (isset($request->old_password) && !empty($request->old_password)) {
      //   if (!(Hash::check($request->old_password, Auth::guard('siteUser')->user()->password))) {
      //       Session::flash('Error-toastr', 'Your old password does not matches');
      //      return redirect()->back();
      //   } elseif (!empty($request->new_password)){
      //   $user->password = Hash::make($request->new_password);
      //   }
      // }

     $user->save();
     $profile = UserProfile::where('user_id',$user->id)->first();
     $profile = $profile ?? new UserProfile;
     $profile->user_id = $user->id;

     if(!empty($request->dob) ) $profile->dob = $request->dob;
     if(!empty($request->mobile) ) $profile->mobile = $request->mobile;
     if(!empty($request->gender) ) $profile->gender = $request->gender;
     if(!empty($request->address) ) $profile->address = $request->address;
     if(!empty($request->about) ) $profile->about = $request->about;
     if(!empty($request->commission)){
      $profile->commission = $request->commission;
     }else{
      $profile->commission = 0;
     }

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
            // return redirect()->back();

	      return redirect()->route('admin.users',$user->role);
	    }

  public function userDelete($uid='', Request $request)
    {
      // dd($request->all());
      if ($request->isMethod('post')) {
            foreach ($request->users_id as $id) {
                $user = User::find($id);
                $user->profile->delete();
                $user->delete();
            }
      } elseif ($request->isMethod('get')) {
                $user = User::find($uid);
                $user->profile->delete();
                $user->delete();
      }
       Session::flash('Success-toastr', 'Successfully deleted.');
      return redirect()->back();
    }

    public function blockUser(User $user)
    {
      $user->status = 2;
      $user->save();
      return redirect()->back()->with('Success-toastr', 'Successfully blocked.');
    }

    public function activeUser(User $user)
    {
      $user->status = 1;
      $user->save();
      return redirect()->back()->with('Success-toastr', 'Successfully activeted.');
    }

      public function verifyUser(User $user)
      {
      if($user->admin_verified_at == null ){
        $user->admin_verified_at = now();
        $message = 'Successfully verified.';
         Mail::to($user->email)->send(new AdminVerification($user->id));
        } else {
        $user->admin_verified_at = null;
        $message = 'Successfully unverified.';
        }
      $user->save();

      return redirect()->back()->with('Success-toastr', $message);
    }

    public function deletedUserList(Request $request,$type)
    {

      $users = User::onlyTrashed()->whereRole($type);
        if ($request->search) {
              $users = $users->where('name', 'LIKE',"%{$request->search}%");
        }
      $users = $users->latest()->paginate($this->per_page);
      $users = $users->appends(request()->query());
      $total_users = User::onlyTrashed()->whereStatus(1)->whereRole($type)->count();
      return view('admin.deleted_user.list',compact('users','total_users'));
    }

    public function retriveUser($id)
    {
        // dd('hi');
        $user = User::onlyTrashed()->find($id);
        // dd($user->profile);
        // return $this->hasOne('App\Models\UserProfile')->withDefault();
        UserProfile::onlyTrashed()->where('user_id',$id)->restore();
        // // ->restore();
        $user->restore();
        Session::flash('Success-toastr', 'Successfully Retrive.');
        return redirect()->back();
    }

    public function forcedelete($id)
    {
        User::where('id', $id)->forceDelete();
        UserProfile::where('user_id', $id)->forceDelete();
        Session::flash('Success-toastr', 'Successfully Deleted.');
        return redirect()->back();
    }

    public function setAsDoctorSlide($id)
    {
        $five_count = User::where('slide_status', 1)->count();
        if($five_count >= 5){
            Session::flash('Error-toastr', 'You Cannot choose more than five doctor.');
            return redirect()->back();
        }
        $user = User::find($id);
        $user->slide_status = 1;
        $user->save();
        return redirect()->back()->with('Success-toastr', 'Successfully selected for slide.');
        // Session::flash('Error-toastr', 'Successfully Deleted.');
        return redirect()->back();
    }

    public function removeAsDoctorSlide($id)
    {
        $user = User::find($id);
        $user->slide_status = 0;
        $user->save();
        return redirect()->back()->with('Success-toastr', 'Successfully unselected for slide.');
        // Session::flash('Error-toastr', 'Successfully Deleted.');
        return redirect()->back();
    }
}