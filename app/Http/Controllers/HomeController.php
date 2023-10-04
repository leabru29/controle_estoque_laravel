<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $produtos = Produto::all();

        $dataAtual = date('Y-m-d');

        $produtosVencidos = $produtos->where('validade', '<', $dataAtual);
        $qtdProdutosVencido = $produtosVencidos->count();

        $quantidadeTotalProdutos = $produtos->count();

        $valorTotalEstoque = 0.0;
        foreach($produtos as $produto){
            $produtoDescricao[] = $produto->produto;
            $produtoQuantidade[] = $produto->quant;

            $valorTotalEstoque += ($produto->valor * $produto->quant);
        }
        $nomeProduto = implode("','", $produtoDescricao);
        $quantidadeProduto = implode(',', $produtoQuantidade);


        $report = DB::table('produtos')
                ->join('grupo_produtos', 'produtos.id_grupo', '=', 'grupo_produtos.id')
                ->selectRaw('count(*) as num_produtos, grupo')
                ->groupBy('id_grupo')
                ->get();
        
        foreach ($report as $qtdProdPorGrupo) {
            $grupo[] = $qtdProdPorGrupo->grupo;
            $num_produtos[] = $qtdProdPorGrupo->num_produtos;
        }

        $gruposDescricao = implode("','", $grupo);
        $numPorGrupo = implode(',', $num_produtos);

        
        return view('home', compact('gruposDescricao', 'numPorGrupo', 'nomeProduto', 'quantidadeProduto', 'quantidadeTotalProdutos', 'valorTotalEstoque', 'qtdProdutosVencido'));
    }
}