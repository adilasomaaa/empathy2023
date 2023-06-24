<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ThesisTopicNotification extends Notification
{
    use Queueable;
    private $thesis_topic;
    private $student;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($thesis_topic, $student)
    {
        $this->thesis_topic = $thesis_topic;
        $this->student = $student;
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
        // return ;
        return [
            'slug' => 'submit_topic',
            'foto' => $this->student->user->foto,
            'description' => $this->student['fullname'] . ' ('. $this->student['nim']. ') ' . ' telah mengajukan judul skripsi : ' . $this->thesis_topic['title'] . ' pada ' . $this->thesis_topic['created_at']->format('d F Y')
        ];
    }
}
