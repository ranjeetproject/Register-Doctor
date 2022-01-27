<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorSpeciality extends Model
{
    protected $hidden = ['created_at', 'updated_at'];

    protected $dates = ['created_at', 'updated_at'];
    
    protected $fillable = ['user_id','dr_specialties_id'];
}
