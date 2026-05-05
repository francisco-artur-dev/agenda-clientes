<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Cliente;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AniversarioProximoNotification;

class NotificarAniversarios extends Command
{
    protected $signature = 'aniversarios:notificar';
    protected $description = 'Notifica aniversários hoje, amanhã e daqui a 2 dias';

    public function handle()
    {
        $hoje = Carbon::today();

        $clientes = Cliente::all()->filter(function ($cliente) use ($hoje) {

            $aniversario = Carbon::parse($cliente->data_nascimento)
                ->year($hoje->year)
                ->startOfDay();

            if ($aniversario->lt($hoje)) {
                $aniversario->addYear();
            }

            $dias = (int) $hoje->diffInDays($aniversario, false);

            if ($dias >= 0 && $dias <= 3) {

                $cliente->dia_relativo = match ($dias) {
                    0 => 'hoje',
                    1 => 'amanhã',
                    2 => 'daqui a 2 dias',
                    3 => 'daqui a 3 dias',
                };

                return true;
            }

            return false;
        });

        // IMPORTANTE: se não houver clientes, parar aqui
        if ($clientes->isEmpty()) {
            $this->info('Nenhum aniversário próximo.');
            return 0;
        }

        // Agrupar por dia relativo e ordenar pela ordem desejada
        $ordem = [
            'hoje' => 0,
            'amanhã' => 1,
            'daqui a 2 dias' => 2,
            'daqui a 3 dias' => 3,
        ];

        $agrupados = $clientes
            ->groupBy('dia_relativo')
            ->sortBy(function ($grupo, $key) use ($ordem) {
                return $ordem[$key] ?? 999;
            });
// Enviar notificação para email fixo
        Notification::route('mail', 'fanilsonfani2023@gmail.com')
            ->notify(new AniversarioProximoNotification($agrupados));

        $this->info('Notificação enviada com sucesso.');

        return 0;
    }
}