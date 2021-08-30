<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Prescription;

class FinalizePrescription extends Mailable
{
    use Queueable, SerializesModels;
    public $mail_details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        //
        $this->mail_details = Prescription::where( 'case_no', $id)->with('doctor')->first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_USERNAME'), env('APP_NAME'))
                     ->view('email.finalize_prescription')
                    ->subject('Your Priscription is ready');
    }
}
