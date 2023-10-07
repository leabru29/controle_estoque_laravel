<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocalArmazenamentoRequest;
use App\Models\LocalArmazenamento;
use Illuminate\Http\Request;
use DataTables;

class LocalArmazenamentoController extends Controller
{
    public function listar(){
        $locais = LocalArmazenamento::all();
        return DataTables::of($locais)
                            ->addColumn('acoes', function($row){
                                return '<a href="'. route("locais.edit", $row->id) .'" type="button" id="btn_alterar" class="btn btn-primary shadow btn-editar"><i class="fas fa-edit"></i>
                                Editar</a>
                            <button type="button" id="btn_excluir" class="btn btn-danger shadow btn-excluir" data-id="'. $row->id.'"><i
                                    class="fas fa-trash-alt"></i> Excluir</button>';
                            })
                            ->rawColumns(['acoes'])
                            ->make(true);
    }

    public function index()
    {
        return view('cadastros.local_armazenamento.index');
    }

    public function create()
    {
        return view('cadastros.local_armazenamento.create');
    }

    public function store(LocalArmazenamentoRequest $request)
    {
        LocalArmazenamento::create($request->all());
        return redirect()->route('locais.index')->with('message', 'Cadastrado com sucesso!');
    }
    
    public function show(LocalArmazenamento $localArmazenamento)
    {
        //
    }

    public function edit($id)
    {
        $local = LocalArmazenamento::findOrFail($id);
        return view('cadastros.local_armazenamento.edit', compact('local'));
    }

    public function update(LocalArmazenamentoRequest $request, $id)
    {
        $localArmazenamento = LocalArmazenamento::findOrFail($id);
        $localArmazenamento->update($request->all());
        return redirect()->route('locais.index')->with('message', 'Editado com sucesso!');
    }

    public function destroy($id)
    {
        $local = LocalArmazenamento::findOrFail($id);
        $local->delete();
        return response()->json(['message' => 'Deletado com sucesso!']);
    }
}