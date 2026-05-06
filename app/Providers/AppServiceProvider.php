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

        // Forçar HTTPS no ambiente de produção
         if (app()->environment('production')) {
          URL::forceScheme('https');
    }
    }
    
}
