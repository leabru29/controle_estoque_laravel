@extends('adminlte::page')

@section('title', 'Entradas de Produtos')

@section('content_header')
    <h1>Entradas de Produtos</h1>
@stop

@section('content')
    <div class="container card p-4">
        <div class="row p-2 mb-4">
            <a href="{{ route('entrada-produtos.create') }}" type="button" class="btn btn-success shadow">Adicionar Entrada de
                Produto</a>
        </div>
        @if (session('message'))
            <div id="message" class="alert alert-success shadow">
                {{ session('message') }}
            </div>
        @endif
        <table id="lista_entradas" class="table table-bordered table-striped shadow">
            <thead>
                <tr>
                    <th width="15%">Produto</th>
                    <th width="10%">Lote</th>
                    <th width="10%">QTD</th>
                    <th width="10%">Entrou em:</th>
                    <th width="10%">Validade</th>
                    <th width="10%">Ações</th>
                    <item /tr>
            </thead>
            <tbody>
                @foreach ($entradasProdutos as $entrada)
                    <tr>
                        <td>{{ $entrada->produto->nome }}</td>
                        <td>{{ $entrada->lote }}</td>
                        <td>{{ $entrada->quantidade }} {{ $entrada->medida->sigla }}</td>
                        <td>{{ date('d/m/Y H:m:s', strtotime($entrada->created_at)) }}</td>
                        <td>{{ date('d/m/Y', strtotime($entrada->dt_validade)) }}</td>
                        <td>
                            <a href="{{ route('entrada-produtos.edit', $entrada->id) }}" type="button" id="btn_alterar"
                                class="btn btn-primary shadow btn-editar"><i class="fas fa-edit"></i></a>
                            <button type="button" id="btn_excluir" class="btn btn-danger shadow btn-excluir"
                                data-id="{{ $entrada->id }}"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        configCSRF();


        $(document).ready(function() {

            $("#message").fadeOut(5000);

            $('#lista_entradas').DataTable();
        });

        $(document).on('click', '.btn-excluir', function(e) {
            var id = $(this).data('id')
            var url = "{{ url('operacoes/entrada-produtos') }}/" + id;
            var lista = $('#lista_produtos');
            excluirDados(url, lista);
        });
    </script>
@stop
