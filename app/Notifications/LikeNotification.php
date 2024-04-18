<?php

namespace App\Notifications;

use App\Models\Publicacion;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LikeNotification extends Notification
{
    

    protected $likeUser;
    protected $publicacion;

    public function __construct(User $likeUser, Publicacion $publicacion)
    {
        $this->likeUser = $likeUser;
        $this->publicacion = $publicacion;
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
    public function toDatabase($notifiable)
    {
        return [
            
            
            'publicacion_id' => $this->publicacion->id,
            'user_id' => $this->publicacion->user->id,
            'like_user_id' => $this->likeUser->id,
            'title' => 'Nuevo like en tu publicación',
            'message' => 'El usuario ' . $this->likeUser->name . ' ha dado like a tu publicación: ' . $this->publicacion->titulo,
            'user_image' => $this->likeUser->imagen,
            'action_url' => route('publicacion.show', ['user' => $this->publicacion->user->username, 'publicacion' => $this->publicacion->id]),
            'action_text' => 'Ver publicación',
            
        ];
    }
}
