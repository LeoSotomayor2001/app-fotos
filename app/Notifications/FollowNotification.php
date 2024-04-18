<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FollowNotification extends Notification
{
    use Queueable;
    protected $follower;
    public function __construct(User $follower)
    {
        $this->follower = $follower;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
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

    public function toDatabase($notifiable)
{
    return [
        'follower_id' => $this->follower->id,
        'follower_name' => $this->follower->name,
        'title' => 'Alguien ha empezado a seguirte',
        'message' => '¡Has recibido un nuevo seguidor! ' . $this->follower->username . ' ha comenzado a seguirte.',
        'user_image' => $this->follower->imagen,
        'action_url' => route('inicio', ['user' => $this->follower->username]),
        'action_text' => 'Ver perfil del seguidor',
    ];
}
}
