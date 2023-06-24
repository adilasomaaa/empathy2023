<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmTopic extends Mailable
{
    public  $thesis_topic;
    use Queueable, SerializesModels;

    public function __construct($thesis_topic)
    {
        $this->thesis_topic = $thesis_topic;
    }
    
    public function build()
    {
        return $this->subject('Pengajuan Judul Diterima')->view('mail.confirm_topic');
    }
}
