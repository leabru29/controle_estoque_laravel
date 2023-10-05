@extends('adminlte::page')

@section('title', 'Cadastro Local de Armazenamento')

@section('content_header')
    <section>

    </section>
@stop

@section('content')
    <div class="row p-2">
        <h2>Editar Produto</h2>
    </div>
    <div class="row p-2 mb-4">
        <a href="{{ route('produtos.index') }}" type="button" class="btn btn-success shadow">Voltar</a>
    </div>
    <div class="container card p-4">
        <div class="container card p-4">
            <form action="{{ route('produtos.update', $produto->id) }}" method="post">
                @method('put')
                @include('cadastros.produtos.formulario-produto')
                <button type="submit" class="btn btn-primary">Editar</button>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {});
    </script>
@stop
