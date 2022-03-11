<?php

namespace App\Http\Controllers;

use App\Models\PatientCase;
use App\Models\Payment;
use Illuminate\Http\Request;
use Session;
use Stripe;

class CheckoutController extends Controller
{
    public function checkout($case_id='')
    {

        $case = PatientCase::where('case_id',$case_id)->with('doctor.profile')->withCount('getBookingSlot')->first();

        if($case->questions_type == 1){
            $live_chat_fee = $case->doctor->profile->dr_live_chat_fee;
            $dr_fee = $live_chat_fee * $case->get_booking_slot_count;
            $admin_fee = ($live_chat_fee*( $case->doctor->profile->commission/100))*$case->get_booking_slot_count;
            $amount = $dr_fee + $admin_fee;
        }

        if($case->questions_type == 2){
            $live_video_fee = $case->doctor->profile->dr_live_video_fee;
            $dr_fee = $live_video_fee * $case->get_booking_slot_count;
            $admin_fee = ($live_video_fee * ( $case->doctor->profile->commission / 100)) * $case->get_booking_slot_count;
            $amount = $dr_fee + $admin_fee;
        }

        if($case->questions_type == 3){
            $amount = $case->doctor->profile->dr_standard_fee;
        }

        if($case->questions_type == 4){
            $qa_fee = $dr_fee = $case->doctor->profile->dr_qa_fee;
            $admin_fee = $qa_fee*($case->doctor->profile->commission/100);
            $amount = $dr_fee + $admin_fee;
        }
        // dd($amount, $live_video_fee,$dr_fee,$admin_fee);

        // return $amount;
        // return $case->get_booking_slot_count;

        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        // $amount = 10;
        $amount_for_stripe = $amount * 100;
        $amount_for_stripe = (int) $amount_for_stripe;

        $payment_intent = \Stripe\PaymentIntent::create([
            'description' => 'Stripe Test Payment',
            'amount' => $amount_for_stripe,
            'currency' => 'INR',
            // 'payment_method_types' => ['card'],
        ]);
        // dd($payment_intent);
        $intent = $payment_intent->client_secret;
        $intent_id = $payment_intent->id;

        return view('checkout.credit-card',compact('intent','amount','intent_id'));

    }

    public function afterPayment(Request $request)
    {

        // dd($request->all());
         $case = PatientCase::where('case_id',$request->case_id)->with('doctor.profile')->withCount('getBookingSlot')->first();

         if($case->questions_type == 1){
            $live_chat_fee = $case->doctor->profile->dr_live_chat_fee;
            $dr_fee = $live_chat_fee * $case->get_booking_slot_count;
            $admin_fee = ($live_chat_fee*( $case->doctor->profile->commission/100))*$case->get_booking_slot_count;
            $amount = $dr_fee + $admin_fee;
        }

        if($case->questions_type == 2){
            $live_video_fee = $case->doctor->profile->dr_live_video_fee;
            $dr_fee = $live_video_fee * $case->get_booking_slot_count;
            $admin_fee = ($live_video_fee * ( $case->doctor->profile->commission / 100)) * $case->get_booking_slot_count;
            $amount = $dr_fee + $admin_fee;
        }

        if($case->questions_type == 3){
            $amount = $case->doctor->profile->dr_standard_fee;
        }

        if($case->questions_type == 4){
            $qa_fee = $dr_fee = $case->doctor->profile->dr_qa_fee;
            $admin_fee = $qa_fee*($case->doctor->profile->commission/100);
            $amount = $dr_fee + $admin_fee;
        }

        $payment = new Payment;
        $payment->case_id = $request->case_id;
        $payment->user_id = $case->user_id;
        $payment->intent_id = $request->intent_id;
        $payment->secure_token = $case->_token;
        $payment->doctor_amount = $dr_fee;
        $payment->admin_amount = $admin_fee;
        $payment->amount = $amount;
        $payment->payment_date = date('Y-m-d H:i:s');
        $payment->save();

        Session::flash('Success-toastr','Payment Successfully Done');

        if($case->questions_type == 1 || $case->questions_type == 2){
        return redirect()->route('patient.symptoms-checker',$case->case_id);
        }else{
        return redirect()->route('patient.dashboard');
        }
               // return view('checkout.payment_success',compact('payment','case'));
    }


}
