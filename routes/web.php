<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\InscricaoController; 
use App\Http\Controllers\EditalController;
use App\Http\Controllers\InscricaoHistoricoController; 
use App\Http\Controllers\CandidatoController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // rota do vitor - mural de editais (destino após login)
    Route::delete('/edital/{id}', [EditalController::class, 'removerEdital'])->name('edital.remover');

    // rotas retorno - ana
    Route::get('/retorno/{id}', [InscricaoHistoricoController::class, 'observacao'])->name('rejeicao.form'); 
    Route::post('/inscricoes/rejeitar', [InscricaoHistoricoController::class, 'store'])->name('rejeicao.store');

    // rota laura
    Route::get('/candidato/{id}', [InscricaoController::class, 'index'])->name('inscricoes.index');

    route::get('/admin/dashboard', function () {
       return view ('dashboard');  
    })->name('admin.dashboard');

});
    // outra rota vitor 
    Route::get('/inicio', [EditalController::class, 'index'])->name('inicio');

// rotas henrique
    Route::get('/edital/cadastrar', [EditalController::class, 'create'])->name('edital.formulario');
    Route::post('/edital/cadastrar', [EditalController::class, 'store'])->name('edital.store');

Route::get('/interna', function () {
    return view('layouts.interna');
});

// rotas login + cadastro - ana 
Route::middleware('guest')->group(function () {
    Route::get('/login', function () { return view('autenticacao.login'); })->name('login');
    Route::get('/cadastro', [CandidatoController::class, 'exibirFormulario'])->name('cadastro.index');
    Route::post('/cadastro/etapa1', [CandidatoController::class, 'salvarEtapa1'])->name('cadastro.salvarEtapa1');
    Route::post('/cadastro/etapa2', [CandidatoController::class, 'salvarEtapa2'])->name('cadastro.salvarEtapa2');
    Route::post('/cadastro/finalizar', [CandidatoController::class, 'finalizar'])->name('cadastro.finalizar');
    Route::get('/cadastro/cancelar', function () {
        session()->forget('cadastro_dados');
        return redirect()->route('login');
    })->name('cadastro.cancelar');
});

require __DIR__.'/auth.php';