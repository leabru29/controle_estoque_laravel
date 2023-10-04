<?php

namespace App\Http\Controllers;

use App\Http\Requests\GrupoProdutoRequest;
use App\Models\GrupoProduto;
use Illuminate\Http\Request;
use DataTables;

class GrupoProdutoController extends Controller
{

    public function listar()
    {
        $grupoProduto = GrupoProduto::all();
        return DataTables::of($grupoProduto)
                            ->addColumn('acoes', function($row){
                                return '<button type="button" id="btn_alterar" class="btn btn-primary shadow btn-editar" data-id="'. $row->id.'"><i class="fas fa-edit"></i>
                                Editar</button>
                            <button type="button" id="btn_excluir" class="btn btn-danger shadow btn-excluir" data-id="'. $row->id.'"><i
                                    class="fas fa-trash-alt"></i> Excluir</button>';
                            })
                            ->editColumn('ativo', '{{$ativo == 1 ? "Ativo" : "Inativo"}}')
                            ->rawColumns(['acoes'])
                            ->make(true);
    }

    public function index()
    {
        return view('cadastros.grupo_produto.grupo-produto');
    }

    public function store(GrupoProdutoRequest $request)
    {
        GrupoProduto::create($request->all());
        return response()->json(['message' => 'Grupo <b>'. $request->grupo .' cadastrado com sucesso!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(GrupoProduto $grupoProduto)
    {
        return $grupoProduto;
    }
    public function update(GrupoProdutoRequest $request, GrupoProduto $grupoProduto)
    {
        $dados = $request->all();
        $grupoProduto->update($dados);
        return response()->json(['message'=>'Grupo ' . $request->grupo. ' atualizado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GrupoProduto $grupoProduto)
    {
        $grupoProduto->delete();
        return response()->json(['message' => 'Deletado com sucesso!']);
    }
}