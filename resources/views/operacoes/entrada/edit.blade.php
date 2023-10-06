@extends('adminlte::page')

@section('title', 'Editar Entrada de Produtos')

@section('content_header')
    <section>

    </section>
@stop

@section('content')
    <div class="row p-2">
        <h2>Editar Entrada de Produtos</h2>
    </div>
    <div class="row p-2 mb-4">
        <a href="{{ route('entrada-produtos.index') }}" type="button" class="btn btn-success shadow">Voltar</a>
    </div>
    <div class="container card p-4">
        <div class="container card p-4">
            <form action="{{ route('entrada-produtos.update', $entrada->id) }}" method="post">
                @method('put')
                @csrf
                @include('operacoes.entrada.formulario-entrada-produto')
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
        $(document).ready(function() {
            var url = "{{ route('entrada-produtos.show', $entrada->id) }}";
            $.get(url, (response) => {
                $('#id_produto').val(response.id_produto);
                $('#lote').val(response.lote);
                $('#quantidade').val(response.quantidade);
                $('#id_medida').val(response.id_medida);
                $('#valor').val(response.valor);
                $('#dt_fabricacao').val(response.dt_fabricacao);
                $('#dt_validade').val(response.dt_validade);
                $('#id_fornecedor').val(response.id_fornecedor);
                $('#id_local_armazenamento').val(response.id_local_armazenamento);
                console.log(response);
            });
        });
    </script>
@stop
