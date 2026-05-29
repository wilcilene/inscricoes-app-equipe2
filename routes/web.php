<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CadastroController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Cadastro em etapas
Route::get('/cadastro',            [CadastroController::class, 'etapa1'])->name('cadastro.etapa1');
Route::post('/cadastro/etapa1',    [CadastroController::class, 'salvarEtapa1'])->name('cadastro.salvarEtapa1');

Route::get('/cadastro/etapa2',     [CadastroController::class, 'etapa2'])->name('cadastro.etapa2');
Route::post('/cadastro/etapa2',    [CadastroController::class, 'salvarEtapa2'])->name('cadastro.salvarEtapa2');

Route::get('/cadastro/etapa3',     [CadastroController::class, 'etapa3'])->name('cadastro.etapa3');
Route::post('/cadastro/finalizar', [CadastroController::class, 'finalizar'])->name('cadastro.finalizar');

Route::get('/cadastro/sucesso',    [CadastroController::class, 'sucesso'])->name('cadastro.sucesso');
Route::get('/cadastro/cancelar',   [CadastroController::class, 'cancelar'])->name('cadastro.cancelar');

require __DIR__.'/auth.php';
