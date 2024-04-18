<?php

namespace App\Notifications;

use App\Models\Comentario;
use App\Models\Publicacion;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NuevoComentarioNotificacion extends Notification
{
    use Queueable;

    protected $publicacion;
    protected $comentario;
    protected $user;
    public function __construct(Publicacion $publicacion, Comentario $comentario)
    {
        $this->publicacion = $publicacion;
        $this->comentario = $comentario;
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
           'publicacion_id' => $this->publicacion->id,
           'user_id' => $this->publicacion->user->id,
           'comentario_user_id' => $this->comentario->user->id,
           'title' => 'Nuevo comentario en tu publicación',
           'message' => 'Hay un nuevo comentario en tu publicación.',
           'action_url' => url('/notificaciones'),
           'action_text' => 'Ver comentarios',
       ];
   }
}
