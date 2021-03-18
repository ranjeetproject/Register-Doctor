<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FavouriteDoctor extends Model
{
    public function doctor()
    {
        return $this->hasOne('App\User','id','favourite_user_id')->with('profile')->withDefault();
    }
}
