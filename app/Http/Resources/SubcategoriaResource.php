<?php

namespace App\Http\Resources;

use App\Models\SubCategoria;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SubcategoriaResource extends JsonResource
{
    public $collects = SubCategoria::class;

    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "nome" => "$this->categoria->setor->nome - $this->nome",
        ];
    }
}
