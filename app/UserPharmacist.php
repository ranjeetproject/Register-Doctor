<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Laravel\Passport\HasApiTokens;

class UserPharmacist extends Authenticatable
{
    use Notifiable,SoftDeletes;

    protected $table = 'users';
  
    protected $guard = 'sitePharmacist';

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


    public function profile()
    {
       return $this->hasOne('App\Models\UserProfile','user_id','id')->withDefault();
    }

    public function openingTime()
    {
        return $this->hasOne('App\Models\PharmacyOpeningTime','user_id','id')->withDefault();
        
    }

    public function deliveryOption()
    {
        return $this->hasOne('App\Models\DeliveryOptions','user_id','id')->withDefault();
        
    }

    public function otp()
    {
        return $this->hasOne('App\Models\OtpVerification')->withDefault();
    }

}
