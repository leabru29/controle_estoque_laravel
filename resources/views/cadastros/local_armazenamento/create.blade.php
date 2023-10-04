@extends('adminlte::page')

@section('title', 'Cadastro Local de Armazenamento')

@section('content_header')
<section>
   
</section>
@stop

@section('content')
<div class="row p-2">
    <h2>Cadastro de Local de Armazenamento</h2>
</div>
<div class="row p-2 mb-4">
    <a href="{{route('locais.index')}}" type="button" class="btn btn-success shadow">Voltar</a>
</div>
<div class="container card p-4">
    <div class="container card p-4">
        <form action="{{route('locais.store')}}" method="post">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="local">Nome do Local</label>
                            <input type="text" class="form-control @error('local') is-invalid @enderror" id="local" name="local">
                            @error('local')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="cnpj">CNPJ</label>
                            <input type="text" class="form-control @error('cnpj') is-invalid @enderror" id="cnpj" name="cnpj">
                            @error('cnpj')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="telefone" class="form-control @error('telefone') is-invalid @enderror" id="telefone" name="telefone">
                            @error('telefone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="cep">CEP</label>
                            <input type="cep" class="form-control @error('cep') is-invalid @enderror" id="cep" name="cep">
                            @error('cep')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="logradouro">Logradouro</label>
                            <input type="logradouro" class="form-control @error('logradouro') is-invalid @enderror" id="logradouro" name="logradouro">
                            @error('logradouro')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="numero">Número</label>
                            <input type="numero" class="form-control @error('numero') is-invalid @enderror" id="numero" name="numero">
                            @error('numero')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="complemento">Complemento</label>
                            <input type="text" class="form-control @error('complemento') is-invalid @enderror" id="complemento" name="complemento">
                            @error('complemento')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="bairro">Bairro</label>
                            <input type="text" class="form-control @error('bairro') is-invalid @enderror" id="bairro" name="bairro" >
                            @error('bairro')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control @error('cidade') is-invalid @enderror" id="cidade" name="cidade" >
                            @error('cidade')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <input type="text" class="form-control @error('estado') is-invalid @enderror" id="estado" name="estado" >
                            @error('estado')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pais">Pais</label>
                            <input type="text" class="form-control @error('pais') is-invalid @enderror" id="pais" name="pais" >
                            @error('pais')
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
        $('#cep').mask('00000-000');    
    });
</script>
@stop