<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\User;
use Session;
use Illuminate\Http\Request;
use Response;
use DB;

class PaymentHistoryController extends Controller
{
    public function index(Request $request)
    {
        $start_date = $request->start_date;
        $doctor_id = $request->doctor_id;
        $date = explode(' - ',$request->start_date);
        if($request->export == 'export') {
            if($start_date) {

                $file_name = 'Doctor wise Total Payment '.$date[0] .' To ' . $date[1];
            } else {
                $file_name = 'Doctor wise Total Payment ';
            }
            $headers = array(
                "Content-type" => "text/csv",
                "Content-Disposition" => "attachment; filename=".$file_name.".csv",
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );
            // $heading_c = array($file_name);

            $columns = array('Doctors name', 'Total Admins amount', 'Total Doctors amount', 'Total Amount');
            $payments = Payment::with('doctor:name,id')->select(DB::raw('user_id,sum(amount) as total_amount,sum(doctor_amount) as total_doctor_amount,sum(admin_amount) as total_admin_amount'))->when($start_date, function ($query, $date) {
                $query->whereDate('created_at','>=',date('Y-m-d',strtotime($date[0])))
                ->whereDate('created_at','<=',date('Y-m-d',strtotime($date[1])));
            })
            ->when($doctor_id, function ($query, $doctor_id) {
                $query->where('doctor_id',$doctor_id);
            })->groupby('doctor_id')->get();
            // dd($payments);
            $callback = function() use ($payments, $columns)
            {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);

                foreach($payments as $payment) {

                    fputcsv($file, array($payment->doctor->name, $payment->total_admin_amount, $payment->total_doctor_amount, $payment->total_amount));
                }

                fclose($file);
            };
            return Response::stream($callback, 200, $headers);
        } else {

            $doctors = User::where('role',2)->select('id', 'name')->get();
            $payments = Payment::with('doctor:name,id')->select(DB::raw('user_id,sum(amount) as total_amount,sum(doctor_amount) as total_doctor_amount,sum(admin_amount) as total_admin_amount'))->when($start_date, function ($query, $date) {
                $query->whereDate('created_at','>=',date('Y-m-d',strtotime($date[0])))
                    ->whereDate('created_at','<=',date('Y-m-d',strtotime($date[1])));
                })
                ->when($doctor_id, function ($query, $doctor_id) {
                    $query->where('doctor_id',$doctor_id);
                })->groupby('doctor_id')->paginate(50);
            return view('admin.payment_history', compact('payments','doctors'));
        }
    }

    public function doctorWiseReport(Request $request)
    {

        $start_date = $request->start_date;
        $doctor_id = $request->doctor_id;
        $date = explode(' - ',$request->start_date);
        if($request->export == 'export') {
            if($start_date) {

                $file_name = 'Doctor wise Payment reports'.$date[0] .' To ' . $date[1];
            } else {
                $file_name = 'Doctor wise Payment reports';
            }
            $headers = array(
                "Content-type" => "text/csv",
                "Content-Disposition" => "attachment; filename=".$file_name.".csv",
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );
            $heading_c = array($file_name);
            $columns = array('Date','Case ID','Case type', 'Admins amount', 'Doctors amount');
            $payments = Payment::with('case')->when($start_date, function ($query, $date) {
                    $query->whereDate('created_at','>=',date('Y-m-d',strtotime($date[0])))
                        ->whereDate('created_at','<=',date('Y-m-d',strtotime($date[1])));
                })
                ->when($doctor_id, function ($query, $doctor_id) {
                    $query->where('doctor_id',$doctor_id);
                })
                ->latest()->get();


            $callback = function() use ($payments,$date, $columns, $heading_c)
            {
                $file = fopen('php://output', 'w');
                // fputcsv($file, $heading_c);
                fputcsv($file, $columns);

                foreach($payments as $payment) {

                    fputcsv($file, array(date('d-m-Y', strtotime($payment->created_at)), $payment->case_id, getQuestionTypeNumberToString($payment->case->questions_type), $payment->admin_amount, $payment->doctor_amount));
                }

                fclose($file);
            };
            return Response::stream($callback, 200, $headers);
        } else {

            // dump($date);
            $doctors = User::where('role',2)->select('id', 'name')->get();
            $payments = Payment::with('case')->when($start_date, function ($query, $date) {
                $query->whereDate('created_at','>=',date('Y-m-d',strtotime($date[0])))
                    ->whereDate('created_at','<=',date('Y-m-d',strtotime($date[1])));
                })
                ->when($doctor_id, function ($query, $doctor_id) {
                    $query->where('doctor_id',$doctor_id);
                })->latest()->paginate(50);
                // dump($payments);
            return view('admin.doctor_wise_payment_history', compact('payments','doctors'));
        }
    }
}
