<?php

use App\Http\Controllers\Api\ChamadoController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RefreshToken;
use App\Http\Controllers\Api\RespostaController;
use App\Http\Controllers\Api\TransferenciaController;
use App\Http\Controllers\Api\UserController;
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
    Route::get('/user', [UserController::class, 'show']);

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
    
    Route::resource('chamado', ChamadoController::class)->only('show', 'store', 'destroy');
    Route::get('/chamados/{setor}', [ChamadoController::class, "index"])->name('chamado.index');

    Route::resource('transferencia', TransferenciaController::class);
    
    Route::get('/setores', function() {
        return Setor::all();
    });
    
    Route::get('/localizacoes', function() {
        return Localizacao::all();
    });
    Route::post("/respostas", [RespostaController::class, "store"]);
    
});
// Route::resource('chamados', ChamadoController::class);
