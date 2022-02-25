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
        $quick_question_costs = SetQuickQuestionCost::get();
    	return view('admin.set_quick_question_cost.create',compact('quick_question_costs'));
    }

    public function store(Request $request)
    {
        $current_date = date('Y-m-d');
    	if ($request->isMethod('post')) 
        {
            $validator = $request->validate([
                "set_quick_question_cost"=>"required",
                "set_quick_question_time"=>"required|numeric",
                "set_quick_question_time_doctor"=>"required|numeric"
              ]);
              $quick_question_cost = new SetQuickQuestionCost;
              $quick_question_cost->set_quick_question_cost = $request->set_quick_question_cost;
              $quick_question_cost->quick_question_costs_start_date = $current_date;
              $quick_question_cost->set_quick_question_time = $request->set_quick_question_time;
              $quick_question_cost->set_quick_question_time_doctor = $request->set_quick_question_time_doctor;
              if($quick_question_cost->save()){
                $last_id = $quick_question_cost->id - 1;
                if($last_id != 0){
                    $quick_question_cost = SetQuickQuestionCost::where('id','=',$last_id);
                    $quick_question_cost->update(['quick_question_costs_end_date' => date('Y-m-d',strtotime("-1 days"))]);
                }

              };

              Session::flash('Success-toastr', 'Successfully added.');
              return redirect()->route('admin.create-set_quick_question_cost');
        }
    }

    public function update(Request $request,$id)
    {
        dd($request->all());
        $quick_question_cost = SetQuickQuestionCost::find($id);
        if ($request->isMethod('post')) {
            $validator = $request->validate(
           [
              "set_quick_question_cost"=>"required",
              "set_quick_question_time"=>"required|numeric",
              "set_quick_question_time_doctor"=>"required|numeric"
            ]);

        $quick_question_cost->set_quick_question_cost = $request->set_quick_question_cost;
        $quick_question_cost->set_quick_question_time = $request->set_quick_question_time;
        $quick_question_cost->set_quick_question_time_doctor = $request->set_quick_question_time_doctor;
        $quick_question_cost->save();
        Session::flash('Success-toastr', 'Successfully Updated.');
        return redirect()->route('admin.create-set_quick_question_cost');
        }
    }
}