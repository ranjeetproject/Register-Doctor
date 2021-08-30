<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    //
    protected $table = 'prescription';
    public function doctor()
    {
        return $this->hasOne('App\User','id','doctor_id')->withDefault();
    }
}
