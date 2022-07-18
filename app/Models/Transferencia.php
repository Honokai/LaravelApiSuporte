<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transferencia extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function chamado()
    {
        return $this->belongsTo(Chamado::class);
    }

    public function setor()
    {
        return $this->belongsTo(Setor::class, 'setor_origem');
    }
}
