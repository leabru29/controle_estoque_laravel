@extends('adminlte::page')

@section('title', 'Cadastro Local de Armazenamento')

@section('content_header')
<section>
   
</section>
@stop

@section('content')
<div class="row p-2">
    <h2>Editar Produto {{$produto->produto}}</h2>
</div>
<div class="row p-2 mb-4">
    <a href="{{route('produtos.index')}}" type="button" class="btn btn-success shadow">Voltar</a>
</div>
<div class="container card p-4">
    <div class="container card p-4">
        <form action="{{route('produtos.update', $produto->id)}}" method="post">
            @method('put')
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="produto">Nome do Produto</label>
                            <input type="text" class="form-control @error('produto') is-invalid @enderror" id="produto" name="produto" value="{{$produto->produto}}">
                            @error('produto')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <input type="text" class="form-control @error('descricao') is-invalid @enderror" id="descricao" name="descricao" value="{{$produto->descricao}}">
                            @error('descricao')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="quant">Quantidade</label>
                            <input type="number" class="form-control @error('quant') is-invalid @enderror" id="quant" name="quant" value="{{$produto->quant}}">
                            @error('quant')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="valor">Valor</label>
                            <input type="valor" class="form-control @error('valor') is-invalid @enderror" id="valor" name="valor" value="{{$produto->valor}}">
                            @error('valor')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="validade">Validade</label>
                            <input type="date" class="form-control @error('validade') is-invalid @enderror" id="validade" name="validade" value="{{$produto->validade}}">
                            @error('cep')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="id_grupo">Grupo de Produto</label>
                            <select type="select" class="form-control @error('id_grupo') is-invalid @enderror" id="id_grupo" name="id_grupo" value="{{$produto->id_grupo}}">
                                @foreach ($grupos as $grupo)
                                    <option value="{{$grupo->id}}">{{$grupo->grupo}}</option>
                                @endforeach
                            </select>
                            @error('id_grupo')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="id_un">Unidade de Medida</label>
                            <select type="select" class="form-control @error('id_un') is-invalid @enderror" id="id_un" name="id_un" value="{{$produto->id_un}}">
                                @foreach ($unidades as $unidade)
                                <option value="{{$unidade->id}}">{{$unidade->unidade}}</option>
                                @endforeach
                            </select>
                            @error('id_un')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="id_local_armazenamento">Local de Armazenamento</label>
                            <select type="text" class="form-control @error('id_local_armazenamento') is-invalid @enderror" id="id_local_armazenamento" name="id_local_armazenamento" value="{{$produto->id_local_armazenamento}}">
                                @foreach ($locaisArmazenamento as $local)
                                    <option value="{{$local->id}}">{{$local->local}}</option>
                                @endforeach
                            </select>
                            @error('id_local_armazenamento')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="id_fornecedor">Fornecedor</label>
                            <select type="text" class="form-control @error('id_fornecedor') is-invalid @enderror" id="id_fornecedor" name="id_fornecedor">
                                @foreach ($fornecedores as $fornecedor)
                                    <option value="{{$fornecedor->id}}">{{$fornecedor->fornecedor}}</option>
                                @endforeach
                            </select>
                            @error('id_fornecedor')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>        
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    $(document).ready(function () {
    });
</script>
@stop