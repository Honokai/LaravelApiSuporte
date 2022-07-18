<?php

namespace App\Http\Resources;

use App\Models\Transferencia;
use Illuminate\Http\Resources\Json\JsonResource;

class TransferenciaResource extends JsonResource
{
    public $collects = Transferencia::class;

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'setor_origem' => $this->setor->nome
        ];
    }
}
