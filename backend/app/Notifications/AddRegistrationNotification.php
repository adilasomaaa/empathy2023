<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AddRegistrationNotification extends Notification
{
    use Queueable;
    private $thesis;
    private $student;
    private $stage;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($thesis,$student,$stage)
    {
        $this->thesis = $thesis;
        $this->student = $student;
        $this->stage = $stage;
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
            'slug' => 'submit_registration',
            'foto' => $this->student->user->foto,
            'description' => $this->student['fullname'] . ' telah mendaftar dengan skripsi : "' . $this->thesis['title'] . '" pada tahapan ' . $this->stage['stage_name']
        ];
    }
}
