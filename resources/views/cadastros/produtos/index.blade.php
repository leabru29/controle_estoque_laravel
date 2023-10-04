@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
<h1>Produtos</h1>
@stop

@section('content')
<div class="container card p-4">
    <div class="row p-2 mb-4">
        <a href="{{route('produtos.create')}}" type="button" class="btn btn-success shadow">Cadastrar Produto</a>
    </div>
    @if (session('message'))
        <div class="alert alert-success shadow">
            {{ session('message') }}
        </div>
    @endif
    <table id="lista_produtos" class="table table-bordered table-striped shadow">
        <thead>
            <tr>
                <th width="10%">#Cód</th>
                <th width="15%">Nome Produto</th>
                <th width="20%">Descrição</th>
                <th width="10%">Validade</th>
                <th width="6%">QTD</th>
                <th width="20%">Ações</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    configCSRF();

    $(document).ready(function () {
        
        var columns = [{
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
                data: 'acoes',
                name: 'acoes'
            },
        ];
        console.log(columns[3]);

        listar("#lista_produtos", "{{route('list.produtos')}}", columns);
    });

    $(document).on('click', '.btn-excluir', function (e) {
        var id = $(this).data('id');
        var url = '{{url("produtos")}}/' + id;
        var lista = $('#lista_produtos');
        excluirDados(url, lista);
    });
</script>
@stop