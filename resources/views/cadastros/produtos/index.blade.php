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
                    <th width="10%">Validade</th>
                    <th width="6%">QTD</th>
                    <th width="6%">Medida</th>
                    <th width="20%">Ações</th>
                    <item /tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                    <tr>
                        <td>{{ $produto->id }}</td>
                        <td>{{ $produto->produto }}</td>
                        <td>{{ $produto->descricao }}</td>
                        <td>{{ date('m/Y', strtotime($produto->validade)) }}</td>
                        <td>{{ $produto->quant }}</td>
                        <td>{{ $produto->unidade->sigla }}</td>
                        <td>
                            <a href="{{ route('produtos.edit', $produto->id) }}" type="button" id="btn_alterar"
                                class="btn btn-primary shadow btn-editar"><i class="fas fa-edit"></i>
                                Editar</a>
                            <button type="button" id="btn_excluir" class="btn btn-danger shadow btn-excluir"
                                data-id="{{ $produto->id }}"><i class="fas fa-trash-alt"></i> Excluir</button>
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
    <script src="https://cdn.datatables.net/plug-ins/1.13.6/sorting/date-uk.js"></script>
    <script>
        configCSRF();

        $(document).ready(function() {
            $('#lista_produtos').DataTable({
                order: [
                    [3, 'desc']
                ],
            });
            /* var columns = [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'produto',
                    name: 'produto'
                },
                {
                    data: 'descricao',
                    name: 'descricao'
                },
                {
                    data: 'validade',
                    name: 'validade'
                },
                {
                    data: 'quant',
                    name: 'quant'
                },
                {
                    data: 'id_un',
                    name: 'id_un',
                },
                {
                    data: 'acoes',
                    name: 'acoes'
                },
            ];
            console.log(columns[3]); */

            //listar("#lista_produtos", "{{ route('list.produtos') }}", columns);
        });

        $(document).on('click', '.btn-excluir', function(e) {
            var id = $(this).data('id');
            var url = '{{ url('produtos') }}/' + id;
            var lista = $('#lista_produtos');
            excluirDados(url, lista);
        });
    </script>
@stop
