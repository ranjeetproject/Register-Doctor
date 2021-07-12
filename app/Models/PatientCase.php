<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientCase extends Model
{
   public function user()
    {
        return $this->hasOne('App\User','id','user_id')->withDefault();
    }

    public function prescription()
    {
        return $this->hasMany('App\Prescription','case_no','case_id');
    }

    public function doctor()
    {
        return $this->hasOne('App\User','id','doctor_id')->withDefault();
    }

     public function casefile()
    {
        return $this->hasMany('App\Models\CaseFile','patient_case_id','id');
    }

    function getBookingSlot()
    {
        return $this->hasMany('App\Models\BookTimeSlot','patient_case_id','id');
    }


    function getAccepedDoctor()
    {
        return $this->hasMany('App\Models\AcceptedPrescriptionDoc','patient_case_id','id');
    }

    function getSummaryDiagnosis()
    {
        return $this->hasOne('App\Models\SummaryDiagnosis','patient_case_id','id');
    }
}
