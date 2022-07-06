<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoria extends Model
{
    use HasFactory;

    protected $table = 'subcategorias';

    protected $appends = ['subcategorianome'];

    public function getSubcategoriaNomeAttribute()
    {
        return "{$this->categoria->setor->nome} - {$this->categoria->nome}/{$this->nome}";
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function chamados()
    {
        return $this->hasMany(Chamado::class, 'subcategoria_id');
    }
}
