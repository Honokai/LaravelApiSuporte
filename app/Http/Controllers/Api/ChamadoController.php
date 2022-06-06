<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChamadoStoreRequest;
use App\Http\Resources\ChamadoResource;
use App\Models\Chamado;
use App\Models\Setor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Throwable;

class ChamadoController extends Controller
{
    public function index(String $setor)
    {
        return ChamadoResource::collection(
            Chamado::whereHas('subcategoria.categoria', function (Builder $consulta) use ($setor) {
                $consulta->where(
                    'setor_id',
                    Setor::where('nome', $setor)
                    ->get()->first()?->id
                );
            })->orderByDesc('created_at')->paginate(10)
        );
        
    }

    public function store(Request $request)
    {
        $validador = Validator::make(
            $request->all(),
            [
                'solicitante' => 'required',
                'solicitacao' => 'required',
                'setorOrigem_id' => 'required',
                'subcategoria_id' => 'required'
            ]
        );

        return $validador->fails() ? 
            Response::json(["mensagem" => "Ocorreu um erro durante o processamento da requisição."], 203)
            : Chamado::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chamado  $chamado
     * @return \Illuminate\Http\Response
     */
    public function show(Chamado $chamado)
    {
        return ChamadoResource::make($chamado);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chamado  $chamado
     * @return \Illuminate\Http\Response
     */
    public function edit(Chamado $chamado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chamado  $chamado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chamado $chamado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chamado  $chamado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chamado $chamado)
    {
        //
    }
}
