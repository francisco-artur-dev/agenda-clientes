<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class Cliente extends Model
{
    use Notifiable;

    protected $table = 'clientes';

    // Campos que podem ser preenchidos via create() ou update()
    protected $fillable = [
        'nome',
        'email',
        'data_nascimento',
        'profissao',
        'genero',
        'telefone',
        'endereco',
        'last_birthday_notified_year',
    ];
    public function routeNotificationForMail(): ?string
    {
        return $this->email;
    }
   
    protected $casts = [
        'data_nascimento' => 'date',
    ];

    public function isBirthdayToday()
    {
        return $this->data_nascimento
            ->copy()
            ->year(now()->year)
            ->isToday();
    }
    public function getDataNascimentoFormatadaAttribute()
    {
        return $this->data_nascimento->format('d/m');
    }

}
