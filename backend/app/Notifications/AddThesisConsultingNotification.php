<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AddThesisConsultingNotification extends Notification
{
    use Queueable;
    private $thesis_consulting;
    private $student;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($thesis_consulting, $student)
    {
        $this->thesis_consulting= $thesis_consulting;
        $this->student= $student;
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
        return [
            'slug' => 'thesis_consulting',
            'foto' => $this->student->user->foto,
            'description' => 'Mahasiswa atas nama '.$this->student['fullname'].' ('.$this->student['nim'].') ingin melakukan konsultasi dengan topik '.$this->thesis_consulting->topic,
        ];
    }
}
