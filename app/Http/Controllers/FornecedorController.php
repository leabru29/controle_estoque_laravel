<?php

namespace App\Http\Controllers;

use App\Http\Requests\FornecedorRequest;
use App\Models\Fornecedor;
use Illuminate\Http\Request;
use DataTables;

class FornecedorController extends Controller
{
    
    public function listar() {
        $fornecedores = Fornecedor::all();
        return DataTables::of($fornecedores)
                            ->addColumn('acoes', function($row){
                                return '<a href="'. route("fornecedores.edit", $row->id) .'" type="button" id="btn_alterar" class="btn btn-primary shadow btn-editar"><i class="fas fa-edit"></i>
                                Editar</a>
                            <button type="button" id="btn_excluir" class="btn btn-danger shadow btn-excluir" data-id="'. $row->id.'"><i
                                    class="fas fa-trash-alt"></i> Excluir</button>';
                            })
                            ->rawColumns(['acoes'])
                            ->make(true);
    }

    public function index()
    {
        return view('cadastros.fornecedores.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cadastros.fornecedores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FornecedorRequest $request)
    {
        Fornecedor::create($request->all());
        return redirect()->route('fornecedores.index')->with('message', 'Cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fornecedor $fornecedor)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        return view('cadastros.fornecedores.edit', compact('fornecedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FornecedorRequest $request, $id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        $fornecedor->update($request->all());
        return redirect()->route('fornecedores.index')->with('message', 'Editado com sucesso!'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        $fornecedor->delete();
        return response()->json(['message' => 'Deletado com sucesso!']);
    }
}