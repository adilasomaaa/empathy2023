<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailCreateThesis_consulting extends Mailable
{
    public  $thesis_consulting;
    use Queueable, SerializesModels;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($thesis_consulting)
    {
        $this->thesis_consulting = $thesis_consulting;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Konsultasi Skripsi ('.$this->thesis_consulting->thesis->student->fullname.')')->view('mail_thesis_consulting');
    }
}
