@extends('adminlte::page')

@section('title', 'Saída de Produtos')

@section('content_header')
    <h1>Saída de Produtos</h1>
@stop

@section('content')
    <div class="container card p-4">
        <div class="row p-2 mb-4">
            <a href="{{ route('saida-produtos.create') }}" type="button" class="btn btn-success shadow">Adicionar saída de
                Produto</a>
        </div>
        @if (session('message'))
            <div id="message" class="alert alert-success shadow">
                {{ session('message') }}
            </div>
        @endif
        <table id="lista_saidas" class="table table-bordered table-striped shadow">
            <thead>
                <tr>
                    <th width="10%">Código</th>
                    <th width="50%">Produto</th>
                    <th width="10%">Quantidade</th>
                    <th width="10%">Ações</th>
                    <item /tr>
            </thead>
            <tbody>
                @foreach ($saidasProdutos as $saida)
                    <tr>
                        <td>{{ $saida->produto->cod_item }}</td>
                        <td>{{ $saida->produto->nome }}</td>
                        <td class="text-center">{{ $saida->quantidade }}</td>
                        <td>
                            <a href="{{ route('saida-produtos.edit', $saida->id) }}" type="button" id="btn_alterar"
                                class="btn btn-primary shadow btn-editar"><i class="fas fa-edit"></i></a>
                            <button type="button" id="btn_excluir" class="btn btn-danger shadow btn-excluir"
                                data-id="{{ $saida->id }}"><i class="fas fa-trash-alt"></i></button>
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

            $('#lista_saidas').DataTable();
        });

        $(document).on('click', '.btn-excluir', function(e) {
            var id = $(this).data('id')
            var url = "{{ url('operacoes/saida-produtos') }}/" + id;
            var lista = $('#lista_saidas');
            excluirDados(url, lista);
        });
    </script>
@stop
