<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SetQuickQuestionCost extends Model
{

    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
    
    protected $fillable = ['set_quick_question_cost','set_quick_question_time','set_quick_question_time_doctor',''];
}