<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Laravel\Passport\HasApiTokens;

class UserDoctor extends Authenticatable
{
    use Notifiable,SoftDeletes;

    protected $table = 'users';

    protected $guard = 'siteDoctor';

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

    // public function userRoles()
    // {
    //     return $this->hasMany('App\Models\UserRole');

    // }

    public function profile()
    {
        return $this->hasOne('App\Models\UserProfile','user_id','id')->withDefault();
    }

    public function otp()
    {
        return $this->hasOne('App\Models\OtpVerification')->withDefault();
    }

    public function thumbsups()
    {
        return $this->hasMany('App\Models\ThumbsUp','created_by','id');
    }

}
