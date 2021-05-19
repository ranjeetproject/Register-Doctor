<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientCase extends Model
{
   public function user()
    {
        return $this->hasOne('App\User','id','user_id')->withDefault();
    }

    public function doctor()
    {
        return $this->hasOne('App\User','id','doctor_id')->withDefault();
    }

     public function casefile()
    {
        return $this->hasOne('App\Models\CaseFile','patient_case_id','id')->withDefault();
    }

    function getBookingSlot()
    {
        return $this->hasMany('App\Models\BookTimeSlot','patient_case_id','id');
    }
}
