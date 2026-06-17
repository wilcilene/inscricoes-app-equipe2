<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EditalController;
use App\Http\Controllers\InscricaoController;

Route::get("/", function () {
    return view("welcome");
});

Route::get("/dashboard", function () {
    return view("dashboard");
})
    ->middleware(["auth", "verified"])
    ->name("dashboard");

    Route::get("/dashboard", function () {
    return view("dashboard");
})
    ->middleware(["auth", "verified"])
    ->name("dashboard");

Route::middleware("auth")->group(function () {
    Route::get("/profile", [ProfileController::class, "edit"])->name(
        "profile.edit",
    );
    Route::patch("/profile", [ProfileController::class, "update"])->name(
        "profile.update",
    );
    Route::delete("/profile", [ProfileController::class, "destroy"])->name(
        "profile.destroy",
    );
    Route::get("/inicio", [EditalController::class, "index"])->name("inicio"); //deixar aqui
        
    Route::delete("/edital/{id}", [
        EditalController::class,
        "removerEdital",
    ])->name("edital.remover");



Route::get("/edital/cadastrar", [EditalController::class, "create"])->name(
    "edital.formulario",
);
Route::post("/edital/cadastrar", [EditalController::class, "store"])->name(
    "edital.store",
);
});
Route::get("/interna", function () {
    return view("layouts.interna");
});

Route::get("/externa", function () {
    return view("autenticacao.login");
})->name("login");

Route::get("/candidato/{id}", [InscricaoController::class, "index"])->name(
    "inscricoes.index",
);

//Route::get("/inicio", [EditalController::class, "index"])->name("inicio");
Route::delete("/edital/{id}", [EditalController::class, "removerEdital"])->name(
    "edital.remover",
);
Route::get("/teste", function () {
    //login nao tava funcionando por isso essa parte(retirar depois)
    Auth::loginUsingId(1);
    return redirect()->route("inicio");
})->name("login");

require __DIR__ . "/auth.php";
