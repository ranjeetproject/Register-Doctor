<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookTimeSlot extends Model
{

   function getSlot()
    {
        return $this->hasOne('App\Models\TimeSlot','id','time_slot_id');
    }

    function getCase()
    {
        return $this->hasOne('App\Models\PatientCase','id','patient_case_id');
    }

}
