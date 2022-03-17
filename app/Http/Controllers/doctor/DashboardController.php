<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use App\Models\Payment;

class DashboardController extends Controller
{
    public function paymentHistory(Request $request)
    {
        $start_date = $request->start_date;
        $doctor_id = auth()->user()->doctor_id;
        $date = explode(' - ',$request->start_date);
        if($request->export == 'export') {
            if($start_date) {

                $file_name = 'Payment reports'.$date[0] .' To ' . $date[1];
            } else {
                $file_name = 'Payment reports';
            }
            $headers = array(
                "Content-type" => "text/csv",
                "Content-Disposition" => "attachment; filename=".$file_name.".csv",
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );
            $heading_c = array($file_name);
            $columns = array('Date', 'Case ID', 'Case type', 'Amount');
            $payments = Payment::with('case')->when($start_date, function ($query, $date) {
                    $query->whereDate('created_at','>=',date('Y-m-d',strtotime($date[0])))
                        ->whereDate('created_at','<=',date('Y-m-d',strtotime($date[1])));
                })
                ->where('doctor_id',$doctor_id)
                ->latest()->get();


            $callback = function() use ($payments,$date, $columns, $heading_c)
            {
                $file = fopen('php://output', 'w');
                // fputcsv($file, $heading_c);
                fputcsv($file, $columns);

                foreach($payments as $payment) {

                    fputcsv($file, array(date('dS M Y', strtotime($payment->created_at)), $payment->case_id, getQuestionTypeNumberToString($payment->case->questions_type), $payment->doctor_amount));
                }

                fclose($file);
            };
            return Response::stream($callback, 200, $headers);
        } else {

            $payments = Payment::with('case')->when($start_date, function ($query, $date) {
                $query->whereDate('created_at','>=',date('Y-m-d',strtotime($date[0])))
                    ->whereDate('created_at','<=',date('Y-m-d',strtotime($date[1])));
                })
                ->where('doctor_id',$doctor_id)->latest()->paginate(8);
                // dump($payments);
            return view('frontend.doctor.payment_history', compact('payments'));
        }
    }
}
