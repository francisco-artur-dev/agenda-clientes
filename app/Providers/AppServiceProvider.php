<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Breeze\BreezeServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->register(BreezeServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Definir o comprimento padrão para strings no banco de dados
         Schema::defaultStringLength(191);

        // Forçar o uso de HTTPS em produção
        if (app()->environment('production')) {
            URL::forceScheme('https');

            // Adicione esta linha abaixo para garantir que o Vite use HTTPS
            $this->app['request']->server->set('HTTPS', true);
        }
    }
    
}
