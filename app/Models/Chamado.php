<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chamado extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subcategoria()
    {
        return $this->belongsTo(SubCategoria::class, 'subcategoria_id');
    }

    public function respostas(): HasMany
    {
        return $this->hasMany(Resposta::class);
    }

    public function setor(): BelongsTo
    {
        return $this->belongsTo(Setor::class, "setorOrigem_id");
    }
}
