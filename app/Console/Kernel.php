<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    // Registra seus comandos customizados
    protected $commands = [
        \App\Console\Commands\NotificarAniversarios::class,
    ];

    // Agenda os comandos
    protected function schedule(Schedule $schedule)
    {
        // Executa o comando todos os dias às 6h
        $schedule->command('aniversarios:notificar')->dailyAt('06:30');
    }

    // Carrega arquivos de comandos adicionais
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');
        require base_path('routes/console.php');
    }
}
