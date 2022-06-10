<?php

use App\Http\Controllers\Api\ChamadoController as ApiChamadoController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RespostaController;
use App\Http\Controllers\ChamadoController;
use App\Models\Localizacao;
use App\Models\Setor;
use App\Models\SubCategoria;
use Illuminate\Support\Facades\Route;

Route::post("/login", [LoginController::class, "login"]);
Route::post("/register", [LoginController::class, "register"]);

Route::middleware('auth:sanctum')->group(function() {
    Route::post("/sair", [LoginController::class, "logout"]);

    Route::get('/chamados/{setor}', [ChamadoController::class, 'index']);

    Route::get('/subcategorias', function() {
        return SubCategoria::all();
    });
    
    Route::resource('chamado', ChamadoController::class)->only('store', 'destroy');
    Route::get('/setores', function() {
        return Setor::all();
    });
    
    Route::get('/localizacoes', function() {
        return Localizacao::all();
    });
    Route::post("/respostas", [RespostaController::class, "store"]);
    Route::get('/chamado/{chamado}', [ApiChamadoController::class, "show"]);
    Route::get('/chamados/{setor}', [ApiChamadoController::class, "index"]);
    
});
// Route::resource('chamados', ChamadoController::class);
