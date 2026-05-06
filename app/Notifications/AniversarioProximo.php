<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class AniversarioProximo extends Notification
{
    use Queueable;

    public function __construct(public $clientes)
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
            ->subject('📅 Lembrete de Aniversários')
            ->markdown('emails.aniversario_proximo', [
                'clientes' => $this->clientes
            ]);
    }
}
