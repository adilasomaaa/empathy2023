<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ConfirmTopicNotification extends Notification
{
    use Queueable;
    private $thesis_topic;
    private $personnel;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($thesis_topic, $personnel)
    {
        $this->thesis_topic = $thesis_topic;
        $this->personnel = $personnel;
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
        if($this->thesis_topic['approved_at'] == null) {
            return [
                'slug' => 'confirm_topic',
                'description' => 'Judul Skripsi : ' . $this->thesis_topic['title'] . ' telah ditolak oleh ' . $this->personnel['fullname']
            ];
        }else {
            return [
                'slug' => 'confirm_topic',
                'description' => 'Judul Skripsi : ' . $this->thesis_topic['title'] . ' telah diterima oleh ' . $this->personnel['fullname']
            ];
        }
        // return [
        //     'thesis' => $this->thesis_topic
        // ];
    }
}
