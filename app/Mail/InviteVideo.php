<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InviteVideo extends Mailable
{
    use Queueable, SerializesModels;

    public $case_id;
    public $user;
    public $patient_id;

    public function __construct($case_id, $user, $user_id)
    {
       $this->case_id = $case_id;
       $this->patient_id = $user_id;
       $this->user = $user;
    }


    public function build()
    {
       return $this->from(env('MAIL_USERNAME'), env('APP_NAME'))
                     ->view('email.invite_video')
                    ->subject('Prescription Id Verify');
    }
}
