<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SetQuickQuestionCost;
use App\Models\QuickQuestionCostHistory;
use App\Models\QuickQuestionAcceptTimeHistory;
use App\Models\QuickQuestionResponseTimeHistory;
use Session;




class SetQuickQuestionCostController extends Controller
{

    public function create()
    {
        $quick_question_cost = SetQuickQuestionCost::first();
        $quick_question_cost_history = QuickQuestionCostHistory::get();
        $accept_time_history = QuickQuestionAcceptTimeHistory::get();
        $response_time_history = QuickQuestionResponseTimeHistory::get();
    	return view('admin.set_quick_question_cost.create',compact('quick_question_cost','quick_question_cost_history','accept_time_history','response_time_history'));
    }

    public function store(Request $request)
    {
        $current_date = date('Y-m-d');
    	if ($request->isMethod('post'))
        {
            $validator = $request->validate([
                "set_quick_question_cost"=>"required",
                "set_quick_question_time"=>"required|numeric",
                "set_quick_question_time_doctor"=>"required|numeric",
                "commission"=>"required|numeric",
            ]);
            $quick_question_cost = SetQuickQuestionCost::first();
            if($quick_question_cost->set_quick_question_cost != $request->set_quick_question_cost) {
                $this->createCostChangeHistory($request->set_quick_question_cost);
            }

            if($quick_question_cost->set_quick_question_time != $request->set_quick_question_time) {
                $this->createAcceptTimeChangeHistory($request->set_quick_question_time);
            }
            if($quick_question_cost->set_quick_question_time_doctor != $request->set_quick_question_time_doctor) {
                $this->createResponseTimeChangeHistory($request->set_quick_question_time_doctor);
            }
            $quick_question_cost->set_quick_question_cost = $request->set_quick_question_cost;
            $quick_question_cost->set_quick_question_time = $request->set_quick_question_time;
            $quick_question_cost->set_quick_question_time_doctor = $request->set_quick_question_time_doctor;
            $quick_question_cost->commission = $request->commission;
            $quick_question_cost->save();

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

    public function createCostChangeHistory($cost)
    {
        $prev_cost = QuickQuestionCostHistory::orderBy('id','desc')->first();
        if(!empty($prev_cost)){
            $prev_cost->end_date_time = date('Y-m-d H:i:s');
            $prev_cost->save();
        }
        $new_cost = new QuickQuestionCostHistory;
        $new_cost->costs = $cost;
        $new_cost->start_date_time = date('Y-m-d H:i:s');
        $new_cost->save();
        # code...
    }

    public function createAcceptTimeChangeHistory($accept_time)
    {
        $prev_cost = QuickQuestionAcceptTimeHistory::orderBy('id','desc')->first();
        if(!empty($prev_cost)){

            $prev_cost->end_date_time = date('Y-m-d H:i:s');
            $prev_cost->save();
        }
        $new_cost = new QuickQuestionAcceptTimeHistory;
        $new_cost->accept_time = $accept_time;
        $new_cost->start_date_time = date('Y-m-d H:i:s');
        $new_cost->save();
    }

    public function createResponseTimeChangeHistory($response_time)
    {
        $prev_cost = QuickQuestionResponseTimeHistory::orderBy('id','desc')->first();
        if(!empty($prev_cost)){
            $prev_cost->end_date_time = date('Y-m-d H:i:s');
            $prev_cost->save();
        }
        $new_cost = new QuickQuestionResponseTimeHistory;
        $new_cost->response_time = $response_time;
        $new_cost->start_date_time = date('Y-m-d H:i:s');
        $new_cost->save();
    }
}
