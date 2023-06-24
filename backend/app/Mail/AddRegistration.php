<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AddRegistration extends Mailable
{
    public  $registration;
    use Queueable, SerializesModels;

    public function __construct($registration)
    {
        $this->registration = $registration;
    }
    
    public function build()
    {
        return $this->subject('Pendaftaran '.$this->registration->registration_period->stage->stage_name)->view('mail.add_registration');
    }
}
