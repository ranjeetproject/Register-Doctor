<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\ContactUs;

class ThankYou extends Mailable
{
    use Queueable, SerializesModels;
    public $contact_us;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->contact_us = ContactUs::find($id);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from(env('MAIL_USERNAME'), env('APP_NAME'))
                     ->view('email.thankyou')
                    ->subject('ThankYou');
    }
}
