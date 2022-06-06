<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserResource extends JsonResource
{
    public $collects = User::class;

    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => $this->name
        ];
    }
}
