<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commission;

class CommissionController extends Controller
{
    public function create(Request $request)
    {
        if($request->isMethod('post')) {
            $date = date('Y-m-d H:i');
            $pre_commission = Commission::latest()->first();
            $pre_commission->end_date = $date;
            $pre_commission->save();

            Commission::create([
                'commission' => $request->commission,
                'start_date' => $date,
            ]);
            return redirect()->back()->with('Success-toastr','Successfully updated');
        }
        $commissions = Commission::all();
        return view('admin.commission', compact('commissions'));
    }
}
