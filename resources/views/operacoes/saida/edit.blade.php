@extends('adminlte::page')

@section('title', 'Editar de Saída de Produtos')

@section('content_header')
    <section>

    </section>
@stop

@section('content')
    <div class="row p-2">
        <h2>Editar de Saída de Produtos</h2>
    </div>
    <div class="row p-2 mb-4">
        <a href="{{ route('saida-produtos.index') }}" type="button" class="btn btn-success shadow">Voltar</a>
    </div>
    <div class="container card p-4">
        <div class="container card p-4">
            <form action="{{ route('saida-produtos.update', $saidaProduto->id) }}" method="post">
                @method('put')
                @csrf
                @include('operacoes.saida.formulario-saida-produto')
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
        $(document).ready(function() {

            var url = "{{ route('saida-produtos.show', $saidaProduto->id) }}";
            $.get(url, (response) => {
                $('#id_produto').val(response.id_produto);
                $('#quantidade').val(response.quantidade);
                console.log(response);
            });
        });
    </script>
@stop
