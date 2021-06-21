<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
   public function availableDays()
    {
        return $this->belongsTo('App\Models\DoctorAvailableDays','available_day_id','id');
    }


     public function bookedSlot()
    {
        return $this->belongsTo('App\Models\BookTimeSlot','id','time_slot_id');
    }
}
