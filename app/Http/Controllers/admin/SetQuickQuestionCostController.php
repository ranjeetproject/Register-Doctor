<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SetQuickQuestionCost;
use Session;




class SetQuickQuestionCostController extends Controller
{

    public function create()
    {
        $quick_question_cost = SetQuickQuestionCost::find(1);
    	return view('admin.set_quick_question_cost.create',compact('quick_question_cost'));
    }

    public function store(Request $request)
    {
    	if ($request->isMethod('post')) 
        {
            $validator = $request->validate([
                "set_quick_question_cost"=>"required",
                "set_quick_question_time"=>"required|numeric"
              ]);
              $quick_question_cost = new SetQuickQuestionCost;
              $quick_question_cost->set_quick_question_cost = $request->set_quick_question_cost;
              $quick_question_cost->set_quick_question_time = $request->set_quick_question_time;
  
              $quick_question_cost->save();
              Session::flash('Success-toastr', 'Successfully added.');
              return redirect()->route('admin.create-set_quick_question_cost');
        }
    }

    public function update(Request $request,$id)
    {
        $quick_question_cost = SetQuickQuestionCost::find($id);
        if ($request->isMethod('post')) {
            $validator = $request->validate(
           [
              "set_quick_question_cost"=>"required",
              "set_quick_question_time"=>"required|numeric"
            ]);

        $quick_question_cost->set_quick_question_cost = $request->set_quick_question_cost;
        $quick_question_cost->set_quick_question_time = $request->set_quick_question_time;
        $quick_question_cost->save();
        Session::flash('Success-toastr', 'Successfully Updated.');
        return redirect()->route('admin.create-set_quick_question_cost');
        }
    }
}