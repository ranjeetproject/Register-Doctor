<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function doctor()
    {
        return $this->belongsTo('App\User', 'doctor_id', 'id')->withDefault();
    }

    public function case()
    {
        return $this->belongsTo('App\Models\PatientCase', 'case_id', 'case_id')->withDefault();
    }
}
