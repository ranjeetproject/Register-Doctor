<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AvailDayChangeNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $patient_name;
    public $msg;

    public function __construct($patient_name, $msg)
    {
       $this->patient_name = $patient_name;
       $this->msg = $msg;
    }


    public function build()
    {
       return $this->from(env('MAIL_USERNAME'), env('APP_NAME'))
                     ->view('email.avail_day_change')
                    ->subject('Cancel booking day');
    }
}
