<?php

namespace App\Notifications;

use App\Models\Personnel;
use App\Models\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Http\Request;

class AddChatNotification extends Notification
{
    use Queueable;
    private $data;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
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
        if ($this->data['status'] == 'from_student') {
            $to_id = Personnel::findOrFail($this->data['to_id']);
            $from_id = Student::findOrFail($this->data['from_id']);
        }else{
            $to_id = Student::findOrFail($this->data['to_id']);
            $from_id = Personnel::findOrFail($this->data['from_id']);
        }

        return [
            'slug' => 'chat',
            'description' => $from_id->fullname.' telah megirimi anda pesan'
        ];
        // return $this->data;
    }
}
