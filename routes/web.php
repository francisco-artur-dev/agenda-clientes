<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('landing');
});

Route::middleware(['auth', 'verified'])->group(function () {

    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CRUD clientes
    Route::get('/clientes', [UserController::class, 'index'])->name('cliente.index');
    Route::get('/clientes/create', [UserController::class, 'create'])->name('cliente.cadastro');
    Route::post('/clientes/store', [UserController::class, 'store'])->name('cliente.store');
    Route::get('/clientes/{cliente}/edit', [UserController::class, 'edit'])->name('cliente.editar');
    Route::get('/clientes/{cliente}/show', [UserController::class, 'show'])->name('cliente.show');
    Route::put('/clientes/{cliente}/update', [UserController::class, 'update'])->name('cliente.update');
    Route::delete('/clientes/{cliente}/delete', [UserController::class, 'destroy'])->name('cliente.destroy');

});

// Rotas da área administrativa
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Rotas do perfil do usuário
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

