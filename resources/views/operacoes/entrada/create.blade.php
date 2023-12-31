@extends('adminlte::page')

@section('title', 'Registro de Entrada de Produtos')

@section('content_header')
    <section>

    </section>
@stop

@section('content')
    <div class="row p-2">
        <h2>Registro de Entrada de Produtos</h2>
    </div>
    <div class="row p-2 mb-4">
        <a href="{{ route('entrada-produtos.index') }}" type="button" class="btn btn-success shadow">Voltar</a>
    </div>
    <div class="container card p-4">
        <div class="container card p-4">
            <form action="{{ route('entrada-produtos.store') }}" method="post">
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

            $('#id_produto').change(function(e) {
                e.preventDefault();
                var id = $(this).val();
                var url = "{{ url('cadastro/produtos') }}/" + id;
                $.get(url, function(data) {
                    var valorUnitario = data.valor;
                    $('#quantidade').change(function() {
                        var quantidade = $(this).val();
                        $('#valor').val(valorUnitario * quantidade);
                    });
                });
            });
        });
    </script>
@stop
