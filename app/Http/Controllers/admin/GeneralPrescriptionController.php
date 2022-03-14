<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralPrescription;
use Session;

class GeneralPrescriptionController extends Controller
{
    public function create(Request $request)
    {
        $genPres = GeneralPrescription::latest()->first();
        if ($request->isMethod('post')) {
            $validator = $request->validate([
                "cost"=>"required|numeric",
                "commission"=>"required|numeric"
            ]);
            if ($genPres) {
                $genPres->cost = $request->cost;
                $genPres->commission = $request->commission;
                $genPres->save();
            } else {
                $newGenPres = new GeneralPrescription;
                $newGenPres->cost = $request->cost;
                $newGenPres->commission = $request->commission;
                $newGenPres->save();
            }
            Session::flash('Success-toastr', 'Successfully Updated.');
            return redirect()->route('admin.gen_pres_commission');
        }
        return view('admin.generalPrescription', compact('genPres'));
    }
}
