<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produtos';

    protected $fillable = [
        'cod_item',
        'lote',
        'nome',
        'descricao',
        'princ_ativo',
        'cond_armazenagem',
        'valor',
        'id_grupo'
    ];

    public function grupo(): HasOne
    {
        return $this->hasOne(GrupoProduto::class, 'id', 'id_grupo');
    }
}