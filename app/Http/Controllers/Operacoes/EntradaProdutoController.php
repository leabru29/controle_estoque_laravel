<?php

namespace App\Http\Controllers\Operacoes;

use App\Http\Controllers\Controller;
use App\Http\Requests\EntradaProdutoRequest;
use App\Models\Fornecedor;
use App\Models\LocalArmazenamento;
use App\Models\Operacoes\EntradaProduto;
use App\Models\Produto;
use App\Models\UnidadeMedida;
use Illuminate\Http\Request;

class EntradaProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entradasProdutos = EntradaProduto::orderBy('dt_validade', 'asc')->get();
        return view('operacoes.entrada.index', compact('entradasProdutos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produtos = Produto::all();
        $unidadeMedidas = UnidadeMedida::all();
        $fornecedores = Fornecedor::all();
        $locaisArmazenamentos = LocalArmazenamento::all();
        return view('operacoes.entrada.create', compact('produtos', 'unidadeMedidas', 'fornecedores', 'locaisArmazenamentos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EntradaProdutoRequest $request)
    {
        EntradaProduto::create($request->all());
        return redirect()->route('entrada-produtos.index')->with('message', 'Entrada de produto feita com sucesso!' );
    }

    /**
     * Display the specified resource.
     */
    public function show(EntradaProduto $entradaProduto)
    {
        return $entradaProduto;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $entrada = EntradaProduto::findOrFail($id);
        $produtos = Produto::all();
        $unidadeMedidas = UnidadeMedida::all();
        $fornecedores = Fornecedor::all();
        $locaisArmazenamentos = LocalArmazenamento::all();
        return view('operacoes.entrada.edit', compact('entrada', 'produtos', 'unidadeMedidas', 'fornecedores', 'locaisArmazenamentos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EntradaProdutoRequest $request, $id)
    {
        $entradaProduto = EntradaProduto::findOrFail($id);
        $entradaProduto->update($request->all());
        return redirect()->route('entrada-produtos.index')->with('message', 'Entrada de produto feita com sucesso!' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EntradaProduto $entradaProduto)
    {
        $entradaProduto->deleteOrFail($entradaProduto->id);

        return response()->json(['message' => 'Deletado com sucesso!']);
    }
}