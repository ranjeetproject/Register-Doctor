<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CreateChildToAdult extends Mailable
{
    use Queueable, SerializesModels;

    public $child;
    public $patient_name;

    public function __construct($child, $patient_name)
    {
       $this->patient_name = $patient_name;
       $this->child = $child;
    }


    public function build()
    {
       return $this->from(env('MAIL_USERNAME'), env('APP_NAME'))
                     ->view('email.child_to_adult')
                    ->subject('Child id to convert patient');
    }
}
