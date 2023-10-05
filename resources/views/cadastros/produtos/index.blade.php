@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <h1>Produtos</h1>
@stop

@section('content')
    <div class="container card p-4">
        <div class="row p-2 mb-4">
            <a href="{{ route('produtos.create') }}" type="button" class="btn btn-success shadow">Cadastrar Produto</a>
        </div>
        @if (session('message'))
            <div class="alert alert-success shadow">
                {{ session('message') }}
            </div>
        @endif
        <table id="lista_produtos" class="table table-bordered table-striped shadow">
            <thead>
                <tr>
                    <th width="5%">#Cód</th>
                    <th width="15%">Nome Produto</th>
                    <th width="20%">Descrição</th>
                    <th width="5%">Grupo</th>
                    <th width="5%">Valor</th>
                    <th width="5%">Ações</th>
                    <item /tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                    <tr>
                        <td>{{ $produto->cod_item }}</td>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->descricao }}</td>
                        <td>{{ $produto->grupo->grupo }}</td>
                        <td>{{ $produto->valor }}</td>
                        <td>
                            <a href="{{ route('produtos.edit', $produto->id) }}" type="button" id="btn_alterar"
                                class="btn btn-primary shadow btn-editar"><i class="fas fa-edit"></i></a>
                            <button type="button" id="btn_excluir" class="btn btn-danger shadow btn-excluir"
                                data-id="{{ $produto->id }}"><i class="fas fa-trash-alt"></i></button>
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
            $('#lista_produtos').DataTable({
                order: [
                    [3, 'desc']
                ],
            });
        });

        $(document).on('click', '.btn-excluir', function(e) {
            var id = $(this).data('id');
            var url = "{{ url('cadastro/produtos') }}/" + id;
            var lista = $('#lista_produtos');
            excluirDados(url, lista);
        });
    </script>
@stop
