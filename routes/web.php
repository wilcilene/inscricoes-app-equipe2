<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\EditalController;
use App\Http\Controllers\ProfileController;
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

Route::post('/edital', [EditalController::class, 'envio_de_edital'])->name('salvar_edital');
Route::get('/enviar', [EditalController::class, 'enviar']);

require __DIR__.'/auth.php';
