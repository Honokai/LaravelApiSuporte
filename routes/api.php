<?php

use App\Http\Controllers\Api\ChamadoController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RespostaController;
use App\Models\Localizacao;
use App\Models\Setor;
use App\Models\SubCategoria;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;

Route::post("/login", [LoginController::class, "login"]);
Route::post("/register", [LoginController::class, "register"]);

Route::middleware('auth:sanctum')->group(function() {
    Route::post("/sair", [LoginController::class, "logout"]);

    Route::get('/chamados/{setor}', [ChamadoController::class, 'index']);

    Route::get('/subcategorias', function() {
        if (request()?->exceto) {
            return Subcategoria::whereHas('categoria', function (Builder $consulta) {
                $consulta->where(
                    'setor_id',
                    '!=',
                    Subcategoria::find(request()->exceto)->categoria->setor->id
                );
            })->get();
        } else {
            return SubCategoria::all();
        }
    });
    
    Route::resource('chamado', ChamadoController::class)->only('store', 'destroy');
    Route::get('/setores', function() {
        return Setor::all();
    });
    
    Route::get('/localizacoes', function() {
        return Localizacao::all();
    });
    Route::post("/respostas", [RespostaController::class, "store"]);
    Route::get('/chamado/{chamado}', [ChamadoController::class, "show"]);
    Route::get('/chamados/{setor}', [ChamadoController::class, "index"]);
    
});
// Route::resource('chamados', ChamadoController::class);
