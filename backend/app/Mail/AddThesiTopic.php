<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AddThesiTopic extends Mailable
{
    public $thesis_topic;
    use Queueable, SerializesModels;

    public function __construct($thesis_topic)
    {
        $this->thesis_topic = $thesis_topic;
    }

   
    public function build()
    {
        return $this->subject('Pengajuan Judul Skripsi ('.$this->thesis_topic->student->fullname.')')->view('mail.add_thesis_topic');
    }
}
