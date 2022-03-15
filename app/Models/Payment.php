<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function doctor()
    {
        return $this->belongsTo('App\User', 'doctor_id', 'id')->withDefault();
    }
}
