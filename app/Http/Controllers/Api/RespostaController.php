<?php

namespace App\Http\Controllers\Api;

use App\Events\ChamadoRespondido;
use App\Http\Controllers\Controller;
use App\Models\Resposta;
use App\Models\Chamado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class RespostaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $chamado = Chamado::find($request->chamado);
        try {
            $chamado->respostas()->save(
                new Resposta(["conteudo" => $request->solicitacao, "user_id" =>  $request->user()->id])
            );
            ChamadoRespondido::dispatch();
            return Response::json($chamado->respostas()->latest()->get()->first(), 201);
        } catch (\Throwable $th) {
            return Response(["mensagem" => $th->getMessage()], 203);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resposta  $resposta
     * @return \Illuminate\Http\Response
     */
    public function show(Resposta $resposta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resposta  $resposta
     * @return \Illuminate\Http\Response
     */
    public function edit(Resposta $resposta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resposta  $resposta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resposta $resposta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resposta  $resposta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resposta $resposta)
    {
        //
    }
}
