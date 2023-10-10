<?php

namespace App\Http\Controllers\Operacoes;

use App\Http\Controllers\Controller;
use App\Models\Operacoes\SaidaProduto;
use App\Models\Produto;
use Illuminate\Http\Request;

class SaidaProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $saidasProdutos = SaidaProduto::all();
        return view('operacoes.saida.index', compact('saidasProdutos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produtos = Produto::all();
        return view('operacoes.saida.create', compact('produtos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $produto = Produto::findOrFail($request->id_produto);
        $produto->quantidade -= $request->quantidade;
        SaidaProduto::create($request->all());
        $produto->save();
        return redirect()->route('saida-produtos.index')->with('message', 'Saída cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $saidaProduto = SaidaProduto::findOrFail($id);
        return $saidaProduto;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produtos = Produto::all();
        $saidaProduto = SaidaProduto::findOrFail($id);
        return view('operacoes.saida.edit', compact('produtos', 'saidaProduto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produto = Produto::findOrFail($request->id_produto);
        $produto->quantidade -= $request->quantidade;
        $saidaProduto = SaidaProduto::findOrFail($id);
        $saidaProduto->update($request->all());
        $produto->save();
        return redirect()->route('saida-produtos.index')->with('message', 'Saída editada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SaidaProduto $saidaProduto)
    {
        $produto = Produto::findOrFail($saidaProduto->id_produto);
        $produto->quantidade += $saidaProduto->quantidade;
        $saidaProduto->deleteOrFail($saidaProduto->id);
        $produto->save();
        return response()->json(['message' => 'Saída excluída com sucesso!']);
    }
}