<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SetIdVerifyTime;
use Session;

class SetIdVerifyDifferenceTimeController extends Controller
{
    public function create(Request $request)
    {
        $genPres = SetIdVerifyTime::latest()->first();
        if ($request->isMethod('post')) {
            $validator = $request->validate([
                "diff_day"=>"required|numeric"
            ]);
            if ($genPres) {
                $genPres->diff_day = $request->diff_day;
                $genPres->save();
            } else {
                $newGenPres = new SetIdVerifyTime;
                $newGenPres->diff_day = $request->diff_day;
                $newGenPres->save();
            }
            Session::flash('Success-toastr', 'Successfully Updated.');
            return redirect()->route('admin.setIdVerifyDifference');
        }
        return view('admin.idVerifyDifferentDays', compact('genPres'));
    }
}
