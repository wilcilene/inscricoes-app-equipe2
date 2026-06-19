<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InscricaoController;
use App\Http\Controllers\EditalController;
use App\Http\Controllers\InscricaoHistoricoController;
use App\Http\Controllers\CandidatoController;

Route::get("/", function () {
    return view("welcome");
});

Route::middleware("auth")->group(function () {
    Route::get("/dashboard", function () {
        return view("dashboard");
    })->name("dashboard");


    Route::get("/profile", [ProfileController::class, "edit"])->name(
        "profile.edit",
    );
    Route::patch("/profile", [ProfileController::class, "update"])->name(
        "profile.update",
    );
    Route::delete("/profile", [ProfileController::class, "destroy"])->name(
        "profile.destroy",
    );

    Route::delete("/edital/{id}", [
        EditalController::class,
        "removerEdital",
    ])->name("edital.remover");

    Route::get("/edital/{id}", [EditalController::class, "editarEdital"])->name(
        "edital.editar",
    );
    Route::put("/edital/{id}", [
        EditalController::class,
        "atualizarEdital",
    ])->name("atualizar.edital");

    // rotas retorno - ana
    Route::get("/retorno/{id}", [
        InscricaoHistoricoController::class,
        "observacao",
    ])->name("rejeicao.form");
    Route::post("/inscricoes/rejeitar", [
        InscricaoHistoricoController::class,
        "store",
    ])->name("rejeicao.store");

    Route::get("/externa", function () {
        return view("autenticacao.login");
    });
});

Route::middleware("auth")->group(function () {
    Route::get("/inicio", [EditalController::class, "index"])->name("inicio");

    Route::get("/edital/cadastrar", [EditalController::class, "create"])->name(
        "edital.formulario",
    );
    Route::post("/edital/cadastrar", [EditalController::class, "store"])->name(
        "edital.store",
    );

Route::get("/interna", function () {
    return view("layouts.interna");
});

// rotas login + cadastro - ana
Route::middleware("guest")->group(function () {
    Route::get("/login", function () {
        return view("autenticacao.login");
    })->name("login");
    Route::get("/cadastro", [
        CandidatoController::class,
        "exibirFormulario",
    ])->name("cadastro.index");
    Route::post("/cadastro/etapa1", [
        CandidatoController::class,
        "salvarEtapa1",
    ])->name("cadastro.salvarEtapa1");
    Route::post("/cadastro/etapa2", [
        CandidatoController::class,
        "salvarEtapa2",
    ])->name("cadastro.salvarEtapa2");
    Route::post("/cadastro/finalizar", [
        CandidatoController::class,
        "finalizar",
    ])->name("cadastro.finalizar");
    Route::get("/cadastro/cancelar", function () {
        session()->forget("cadastro_dados");
        return redirect()->route("login");
    })->name("cadastro.cancelar");
});
Route::get("/cesar", function () {
    return view("inscricoes.uploads");
})->name("cesar");

Route::get("/saulo", [
    InscricaoController::class,
    "listarMinhasInscricoes",
])->name("saulo");

Route::get("/testesidebar", function () {
    return view("layouts.app");
});

Route::get("/inscricoes", [
    InscricaoController::class,
    "listarMinhasInscricoes",
])->name("inscricoes.lista");
Route::get("/listains", [InscricaoController::class, "listarMinhasInscricoes"]);
Route::get("/candidato/{id}", [InscricaoController::class, "index"])->name(
    "inscricoes.index",
);

Route::get("/inscricao", [InscricaoController::class, "create"]);
Route::post("/inscricao", [InscricaoController::class, "store"])->name(
    "inscricao.store",
);

require __DIR__ . "/auth.php";
