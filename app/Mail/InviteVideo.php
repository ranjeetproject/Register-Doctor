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

    public function __construct($case_id)
    {
       $this->case_id = $case_id;
    }


    public function build()
    {
       return $this->from(env('MAIL_USERNAME'), env('APP_NAME'))
                     ->view('email.invite_video')
                    ->subject('Prescription Id Verify');
    }
}
