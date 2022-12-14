<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Laravel\Passport\HasApiTokens;

class UserPatient extends Authenticatable
{
    use Notifiable,SoftDeletes;
  
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $guard = 'sitePatient';

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

    public function userFavDoc()
    {
        return $this->hasMany('App\Models\FavouriteDoctor');
        
    }

    public function profile()
    {
        return $this->hasOne('App\Models\UserProfile','user_id','id')->withDefault();
    }

    public function otp()
    {
        return $this->hasOne('App\Models\OtpVerification')->withDefault();
    }

}
