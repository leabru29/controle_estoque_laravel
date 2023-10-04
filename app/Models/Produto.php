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
        'produto',
        'descricao',
        'quant',
        'valor',
        'validade',
        'id_grupo',
        'id_un',
        'id_local_armazenamento',
        'id_fornecedor'
    ];

    public function grupo(): HasOne
    {
        return $this->hasOne(GrupoProduto::class, 'id', 'id_grupo');
    }

    public function unidade(): HasOne
    {
        return $this->hasOne(UnidadeMedida::class, 'id', 'id_un');
    }

    public function local(): HasOne
    {
        return $this->hasOne(LocalArmazenamento::class, 'id', 'id_local_armazenamento');
    }

    public function fornecedor(): HasOne
    {
        return $this->hasOne(Fornecedor::class, 'id', 'id_fornecedor');
    }
}