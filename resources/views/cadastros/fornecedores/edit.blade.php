@extends('adminlte::page')

@section('title', 'Fornecedores')

@section('content_header')
<section>
   
</section>
@stop

@section('content')
<div class="container card p-4">
    <div class="row p-2 mb-4">
        <h2>Editar de Fornecedor</h2>
    </div>
    <div class="row p-2 mb-4">
        <a href="{{route('fornecedores.index')}}" type="button" class="btn btn-success shadow">Voltar</a>
    </div>
    <div class="container card p-4">
        <form action="{{route('fornecedores.update', $fornecedor->id)}}" method="post">
            @method('put')
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="fornecedor">Fornecedor</label>
                            <input type="text" class="form-control @error('fornecedor') is-invalid @enderror" id="fornecedor" name="fornecedor" value="{{$fornecedor->fornecedor}}">
                            @error('fornecedor')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{$fornecedor->email}}">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="text" class="form-control @error('telefone') is-invalid @enderror" id="telefone" name="telefone" value="{{$fornecedor->telefone}}">
                            @error('telefone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="cnpj">CNPJ</label>
                            <input type="text" class="form-control @error('cnpj') is-invalid @enderror" id="cnpj" name="cnpj" value="{{$fornecedor->cnpj}}">
                            @error('cnpj')
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
            var SPMaskBehavior = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        spOptions = {
        onKeyPress: function(val, e, field, options) {
            field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };

        $('#telefone').mask(SPMaskBehavior, spOptions);
        $('#cnpj').mask('00.000.000/0000-00', {reverse: true});    
    });
</script>
@stop