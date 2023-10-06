<?php

namespace App\Models\Operacoes;

use App\Models\Fornecedor;
use App\Models\LocalArmazenamento;
use App\Models\Produto;
use App\Models\UnidadeMedida;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class EntradaProduto extends Model
{
    use HasFactory;

    protected $table = 'entrada_produtos';

    protected $fillable = [
        'id_produto',
        'lote',
        'quantidade',
        'id_medida',
        'valor',
        'dt_fabricacao',
        'dt_validade',
        'id_fornecedor',
        'id_local_armazenamento'
    ];

    public function produto() : HasOne {
        return $this->hasOne(Produto::class, 'id', 'id_produto');
    }

    public function medida() : HasOne {
        return $this->hasOne(UnidadeMedida::class, 'id', 'id_medida');
    }

    public function fornecedor() : HasOne {
        return $this->hasOne(Fornecedor::class, 'id', 'id_fornecedor');
    }

    public function local() : HasOne {
        return $this->hasOne(LocalArmazenamento::class, 'id', 'id_local_armazenamento');
    }
}