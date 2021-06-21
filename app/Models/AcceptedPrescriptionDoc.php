<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcceptedPrescriptionDoc extends Model
{
   public function doctor()
    {
        return $this->hasOne('App\User','id','doctor_id')->withDefault();
    }
}
