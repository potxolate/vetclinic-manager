<?php

namespace App\Notifications;

use App\Models\Clinic;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewClinicNotification extends Notification
{
    use Queueable;

    protected $clinic;

    /**
     * Create a new notification instance.
     */
    public function __construct(Clinic $clinic)
    {
        $this->clinic = $clinic;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('New Clinic Added')
                    ->line('A new clinic has been added:')
                    ->line('Name: ' . $this->clinic->name)
                    ->line('Email: ' . $this->clinic->mail)
                    ->line('Phone: ' . $this->clinic->phone)
                    ->action('View Clinic', url('/clinics/' . $this->clinic->id))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
