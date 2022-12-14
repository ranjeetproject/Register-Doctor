<?php

namespace App\Http\Controllers;

use App\Models\PatientCase;
use App\Models\Payment;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout($case_id='')
    {   

        $case = PatientCase::where('case_id',$case_id)->with('doctor.profile')->withCount('getBookingSlot')->first();

if($case->questions_type == 1){
    $amount = $case->doctor->profile->dr_live_chat_fee * $case->get_booking_slot_count;
}

if($case->questions_type == 2){
    $amount = $case->doctor->profile->dr_live_video_fee * $case->get_booking_slot_count;
}

if($case->questions_type == 3){
    $amount = $case->doctor->profile->dr_standard_fee;
}

if($case->questions_type == 4){
    $amount = $case->doctor->profile->dr_qa_fee;
}

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
        $intent = $payment_intent->client_secret;

        return view('checkout.credit-card',compact('intent','amount'));

    }

    public function afterPayment(Request $request)
    {
        return $request->all();
         $case = PatientCase::where('case_id',$case_id)->with('doctor.profile')->withCount('getBookingSlot')->first();

if($case->questions_type == 1){
    $amount = $case->doctor->profile->dr_live_chat_fee * $case->get_booking_slot_count;
}

if($case->questions_type == 2){
    $amount = $case->doctor->profile->dr_live_video_fee * $case->get_booking_slot_count;
}

if($case->questions_type == 3){
    $amount = $case->doctor->profile->dr_standard_fee;
}

if($case->questions_type == 4){
    $amount = $case->doctor->profile->dr_qa_fee;
}

        $payment = new Payment;
        $payment->case_id = $request->case_id;
        $payment->user_id = $case->user_id;
        $payment->amount = $amount;
        $payment->payment_date = date('Y-m-d');
        $payment->save();

               return view('checkout.payment_success',compact('payment','case'));

    }


}
