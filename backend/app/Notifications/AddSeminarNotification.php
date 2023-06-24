<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AddSeminarNotification extends Notification
{

    use Queueable;
    private $seminar;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($seminar)
    {
        $this->seminar= $seminar;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $hari = array('Sun' => 'Minggu','Mon' => 'Senin','Tue' => 'Selasa','Wed' => 'Rabu','Thu' => 'Kamis','Fri' => 'Jumat','Sat' => 'Sabtu'
        );

        return 'Seminar akan dilaksanakan pada Hari '.
        $hari[date('D', strtotime($this->seminar->tgl_ujian))].' Tanggal '.
        date('d M Y', strtotime($this->seminar->tgl_ujian)).' Mulai pada pukul '.
        date('H:i', strtotime($this->seminar->waktu_mulai)).' s/d '.
        date('H:i', strtotime($this->seminar->waktu_selesai)).' di ruangan '.
        $this->seminar->tempat;
    }
}
