<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DoctorAvailableDays extends Model
{
	use SoftDeletes;
    

    function getSlot()
    {
        return $this->hasMany('App\Models\TimeSlot','available_day_id','id');
    }

    function getBookedSlot()
    {
        return $this->hasOne('App\Models\BookTimeSlot','time_slot_id','id');
    }

}
