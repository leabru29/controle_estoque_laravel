<?php

namespace App\Http\Controllers\Operacoes;

use App\Http\Controllers\Controller;
use App\Http\Requests\EntradaProdutoRequest;
use App\Models\Fornecedor;
use App\Models\LocalArmazenamento;
use App\Models\Operacoes\EntradaProduto;
use App\Models\Produto;
use App\Models\UnidadeMedida;

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
        $produto = Produto::findOrFail($request->id_produto);
        $produto->quantidade += $request->quantidade;
        $produto->valor += $request->valor;
        EntradaProduto::create($request->all());
        $produto->save();
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
        $produto = Produto::findOrFail($request->id_produto);
        $produto->quantidade = $request->quantidade;
        $produto->valor = $produto->valor * $request->quantidade;
        dd($produto->valor);
        $entradaProduto = EntradaProduto::findOrFail($id);
        $entradaProduto->update($request->all());
        $produto->save();
        return redirect()->route('entrada-produtos.index')->with('message', 'Entrada de produto feita com sucesso!' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EntradaProduto $entradaProduto)
    {
        $produto = Produto::findOrFail($entradaProduto->id_produto);
        $produto->quantidade -= $entradaProduto->quantidade;
        $entradaProduto->deleteOrFail($entradaProduto->id);
        $produto->save();
        return response()->json(['message' => 'Deletado com sucesso!']);
    }
}