<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoRequest;
use App\Models\Fornecedor;
use App\Models\GrupoProduto;
use App\Models\LocalArmazenamento;
use App\Models\Produto;
use App\Models\UnidadeMedida;
use Illuminate\Http\Request;
use DataTables;

class ProdutoController extends Controller
{
    

    public function listar(){
        $produtos = Produto::all();
        return DataTables::of($produtos)
                        ->addColumn('acoes', function($row){
                            return '<a href="'. route("produtos.edit", $row->id) .'" type="button" id="btn_alterar" class="btn btn-primary shadow btn-editar"><i class="fas fa-edit"></i>
                            Editar</a>
                        <button type="button" id="btn_excluir" class="btn btn-danger shadow btn-excluir" data-id="'. $row->id.'"><i
                                class="fas fa-trash-alt"></i> Excluir</button>';
                        })
                        ->rawColumns(['acoes'])
                        ->make(true);
    }

    public function index()
    {
        $produtos = Produto::all();
        return view('cadastros.produtos.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grupos = GrupoProduto::all();
        $produto = "";
        return view('cadastros.produtos.create', compact('grupos', 'produto'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProdutoRequest $request)
    {
        str_replace(',', '.', $request->valor);
        Produto::create($request->all());
        return redirect()->route('produtos.index')->with('message', 'Produto cadastro com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        $grupos = GrupoProduto::all();
        return view('cadastros.produtos.edit', compact('produto', 'grupos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProdutoRequest $request, $id)
    {
        $produto = Produto::findOrFail($id);
        $produto->update($request->all());
        return redirect()->route('produtos.index')->with('message', 'Editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();
        return response()->json(['message' => 'Deletado com sucesso!']);
    }
}