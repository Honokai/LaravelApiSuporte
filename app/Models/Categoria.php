<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Categoria extends Model
{
    use HasFactory;

    public function subcategorias(): HasMany
    {
        return $this->hasMany(SubCategoria::class, 'categoria_id');
    }

    public function setor(): BelongsTo
    {
        return $this->belongsTo(Setor::class, 'setor_id');
    }

    public function chamados(): HasManyThrough
    {
        return $this->hasManyThrough(Chamado::class, SubCategoria::class, 'subcategoria_id', 'categoria_id');
    }
}
