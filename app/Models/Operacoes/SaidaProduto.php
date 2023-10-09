<?php

namespace App\Models\Operacoes;

use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SaidaProduto extends Model
{
    use HasFactory;

    protected $table = 'saida_produtos';

    protected $fillable = ['id_produto', 'quantidade'];

    public function produto() : HasOne {
        return $this->hasOne(Produto::class, 'id', 'id_produto');
    }
}