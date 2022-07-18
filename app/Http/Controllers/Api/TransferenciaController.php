<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chamado;
use App\Models\SubCategoria;
use App\Models\Transferencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TransferenciaController extends Controller
{
    public function store(Request $request)
    {
        try {
            $chamado = Chamado::find($request->chamado);

            $transferencia = new Transferencia([
                'chamado_id' => $chamado->id,
                'setor_origem' => $chamado->subcategoria->categoria->setor->id,
                'sub_categoria_id' => $chamado->subcategoria->id
            ]);

            $subcategoria = SubCategoria::find($request->categoriaDestino);

            $chamado->subcategoria_id = $subcategoria->id;

            DB::transaction(function () use ($transferencia, $chamado) {
                $transferencia->save();
                $chamado->save();
            });
            
            return response()->json(["url_setor" => route('chamado.index', ['setor' => $subcategoria->categoria->setor->nome])], 200);
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json(["mensagem" => "Ocorreu um erro ao tentar processar essa requisição."], 403);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transferencia  $transferencias
     * @return \Illuminate\Http\Response
     */
    public function show(Transferencia $transferencias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transferencia  $transferencias
     * @return \Illuminate\Http\Response
     */
    public function edit(Transferencia $transferencias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transferencia  $transferencias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transferencia $transferencias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transferencia  $transferencias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transferencia $transferencias)
    {
        //
    }
}
