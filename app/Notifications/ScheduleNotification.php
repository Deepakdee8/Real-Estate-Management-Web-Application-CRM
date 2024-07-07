<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Schedule;
use App\Models\Property;

class ScheduleNotification extends Notification
{
    use Queueable;
    public $data;

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


    public function toArray($notifiable)
    {


        return [
            'id' => $this->data['id'],
            'customer_id' => $this->data['customer_id'],
            'assignee_id' => $this->data['assignee_id'],
            'date_time' => $this->data['date_time'],
            'reminder' => $this->data['reminder'],
        ];
    }
}
