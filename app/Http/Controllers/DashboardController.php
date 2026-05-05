<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Carbon\Carbon;
use Illuminate\View\View;

class DashboardController extends Controller
{
 
// método index atualizado para usar os dados reais do cliente e calcular a idade corretamente
    public function index(): View
    {
        $hoje = Carbon::today();

        $clientes = Cliente::all();

        /*
        |--------------------------------------------------------------------------
        | TOTAL DE CLIENTES
        |--------------------------------------------------------------------------
        */
        $totalClientes = $clientes->count();

        /*
        |--------------------------------------------------------------------------
        | ANIVERSÁRIOS HOJE
        |--------------------------------------------------------------------------
        */
        $aniversariosHoje = $clientes->filter(function ($cliente) use ($hoje) {
            return Carbon::parse($cliente->data_nascimento)
                ->format('m-d') === $hoje->format('m-d');
        })->count();

        /*
        |--------------------------------------------------------------------------
        | PRÓXIMOS ANIVERSÁRIOS (HOJE + 7 DIAS)
        |--------------------------------------------------------------------------
        */
        $proximos = $clientes->map(function ($cliente) use ($hoje) {

            $aniversario = Carbon::parse($cliente->data_nascimento)
                ->year($hoje->year)
                ->startOfDay();

            if ($aniversario->lt($hoje)) {
                $aniversario->addYear();
            }

            $cliente->dias_restantes = $hoje->diffInDays($aniversario, false);

            return $cliente;
        })
        ->filter(fn ($cliente) =>
            $cliente->dias_restantes >= 0 &&
            $cliente->dias_restantes <= 7
        )
        ->sortBy('dias_restantes');

        /*
        |--------------------------------------------------------------------------
        | TOTAL PRÓXIMOS 7 DIAS
        |--------------------------------------------------------------------------
        */
        $proximos7Dias = $proximos->count();

        /*
        |--------------------------------------------------------------------------
        | VIEW
        |--------------------------------------------------------------------------
        */
        return view('dashboard', compact(
            'totalClientes',
            'aniversariosHoje',
            'proximos7Dias',
            'proximos'
        ));
    }
}