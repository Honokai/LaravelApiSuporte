<?php

namespace App\Http\Resources;

use App\Models\Setor;
use Illuminate\Http\Resources\Json\JsonResource;

class SetorResource extends JsonResource
{
    public $collects = Setor::class;

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
        ];
    }
}
