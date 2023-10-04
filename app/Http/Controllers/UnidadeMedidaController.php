<?php

namespace App\Http\Controllers;

use App\Models\UnidadeMedida;
use Illuminate\Http\Request;
use DataTables;

class UnidadeMedidaController extends Controller
{
    
    public function listar() {
        $unidadeMedida = UnidadeMedida::all();
        return DataTables::of($unidadeMedida)
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
        return view('cadastros.unidade_medida.unidade-medida');
    }
    
    public function store(Request $request)
    {
        UnidadeMedida::create($request->all());
        return response()->json(['message' => 'Grupo <b>'. $request->unidade .' cadastrado com sucesso!']);
    }

    public function show(UnidadeMedida $unidadeMedida)
    {
        return $unidadeMedida;
    }

    public function update(Request $request, UnidadeMedida $unidadeMedida)
    {
        $dados = $request->all();
        $unidadeMedida->update($dados);
        return response()->json(['message'=>'Grupo ' . $request->unidade. ' atualizado com sucesso!']);
    }

    public function destroy(UnidadeMedida $unidadeMedida)
    {
        $unidadeMedida->delete();
        return response()->json(['message' => 'Deletado com sucesso!']);
    }
}