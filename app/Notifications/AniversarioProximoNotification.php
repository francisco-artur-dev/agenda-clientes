<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class AniversarioProximoNotification extends Notification
{
    use Queueable;

    public function __construct(public \Illuminate\Support\Collection $clientes)
    {
            $this->clientes = $clientes;    
    }



    public function via(object $notifiable)
    {
        return ['mail'];
    }

    public function toMail(object $notifiable)
    {
        return (new MailMessage)
            ->subject('📅 Lembrete de Aniversários Próximos')
            ->markdown('emails.aniversario_proximo', [
                'clientes' => collect($this->clientes),
            ]);
    }
}
