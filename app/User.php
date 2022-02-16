<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable,SoftDeletes;

    protected $guard = 'siteAdmin';

    protected $fillable = [
        'name', 'email', 'password',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function notBlock()
    {
        return ($this->status == 2) ? false : true;
    }

    public function emailVerification()
    {
        return ($this->email_verified_at != null) ? true : false;
    }

      public function adminVerification()
    {
        return ($this->admin_verified_at != null) ? true : false;
    }

     public function acceptTermsAndConditions()
    {
        return ($this->terms_conditions != null) ? true : false;
    }

    // public function userRoles()
    // {
    //     return $this->hasMany('App\Models\UserRole');

    // }

      public function userFavDoc()
    {
        return $this->hasMany('App\Models\FavouriteDoctor');

    }

     public function openingTime()
    {
        return $this->hasOne('App\Models\PharmacyOpeningTime','user_id','id')->withDefault();

    }

    public function deliveryOption()
    {
        return $this->hasOne('App\Models\DeliveryOptions','user_id','id')->withDefault();

    }


    public function profile()
    {

        return $this->hasOne('App\Models\UserProfile')->withDefault();
    }

    public function otp()
    {
        return $this->hasOne('App\Models\OtpVerification')->withDefault();
    }

    public function childs()
    {
        return $this->hasMany('App\Models\ChildsAccountsHolder','user_id','id');

    }

    public function parents()
    {
        return $this->hasMany('App\Models\ChildsAccountsHolder','child_id','id');
    }

    public function weeklyAvailableDays()
    {
        return $this->hasMany('App\Models\WeeklyAvailableDays');

    }

     public function availableDays()
    {
        return $this->hasMany('App\Models\DoctorAvailableDays');
    }

    public function doctorReview()
    {
        return $this->hasMany('App\Models\DoctorReview','doctor_id','id');
    }

    public function doctorSpeciality()
    {
        return $this->hasMany('App\Models\DoctorSpeciality','user_id','id');
    }


}
