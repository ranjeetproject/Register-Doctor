<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChildsAccountsHolder extends Model
{
   public function childDetails()
    {
        return $this->hasOne('App\user','id','child_id')->withDefault();
        
    }
}
