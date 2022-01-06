<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewYearAdvise extends Mailable
{
    use Queueable, SerializesModels;

    public $doctor;

    public function __construct($doctor)
    {
       $this->doctor = $doctor;
    }


    public function build()
    {
       return $this->from(env('MAIL_USERNAME'), env('APP_NAME'))
                     ->view('email.new_year_advise')
                    ->subject('New year advice');
    }
}
