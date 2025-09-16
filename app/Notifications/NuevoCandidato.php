<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoCandidato extends Notification
{
    use Queueable;

    public $idVacante;
    public $nombreVacante;
    public $usuarioId;

    /**
     * Create a new notification instance.
     */
    public function __construct($idVacante, $nombreVacante, $usuarioId)
    {
        $this->idVacante = $idVacante;
        $this->nombreVacante = $nombreVacante;
        $this->usuarioId = $usuarioId;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = url('notificaciones/' . $this->idVacante);

        return (new MailMessage)
            ->line('¡Has recibido un nuevo candidato en tu vacante!')
            ->action('Ver notificaciones', $url)
            ->line('¡Gracias por usar nuestra web!');
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

    /**
     * Almacena las notificaciones en la base de datos
     */
    public function toDatabase(object $notifiable)
    {
        return [
            'idVacante' => $this->idVacante,
            'nombreVacante' => $this->nombreVacante,
            'usuarioId' => $this->usuarioId,
        ];
    }
}
