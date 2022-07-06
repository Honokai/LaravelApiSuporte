<?php

namespace App\Http\Resources;

use App\Enums\StatusEnum;
use App\Models\Chamado;
use App\Models\SubCategoria;
use Illuminate\Http\Resources\Json\JsonResource;

class ChamadoResource extends JsonResource
{
    public $collects = Chamado::class;

    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "solicitante" => $this->solicitante,
            "solicitacao" => $this->solicitacao,
            "subcategoria" => SubcategoriaResource::make($this->subcategoria),
            "setor" => SetorResource::make($this->setor), //considerar remocao
            "status" => StatusEnum::getKey(intval($this->status)),
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "responsavel" => $this->responsavel,
            "respostas" => $this?->respostas ? RespostasResource::collection($this->respostas()->orderBy("created_at", "desc")->get()) : "",
            "editar" => $this->when($this->verificador($request), true)
        ];
    }

    public function verificador($request)
    {
        return $request->user()->setor_id === $this->subcategoria->categoria->setor->id || $request->user()->name == $this->solicitante;
    }
}
