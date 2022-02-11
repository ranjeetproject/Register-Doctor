<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pharma_req_prescription extends Model
{
    //
    protected $table = 'pharma_req_prescription';
    public function prescription()
    {
        return $this->hasMany('App\Prescription','case_no','case_id');
    }

    public function patientcase()
    {
        return $this->belongsTo(PatientCase::class,'case_id','case_id');
    }
}