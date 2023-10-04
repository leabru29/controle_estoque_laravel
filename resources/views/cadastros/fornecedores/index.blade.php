@extends('adminlte::page')

@section('title', 'Fornecedores')

@section('content_header')
<section>
   
</section>
@stop

@section('content')
<div class="container card p-4">
    <div class="row p-2 mb-4">
        <a href="{{route('fornecedores.create')}}" class="btn btn-success shadow">Cadastrar Fornecedor</a>
    </div>
    @if (session('message'))
        <div class="alert alert-success shadow">
            {{ session('message') }}
        </div>
    @endif
    <table id="lista_fornecedores" class="table table-bordered table-striped shadow">
        <thead>
            <tr>
                <th width="10%">#</th>
                <th width="30%">Fornecedor</th>
                <th width="20%">Telefone</th>
                <th width="20%">CNPJ</th>
                <th width="30%">Ações</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function () {
        
        var columns = [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'fornecedor',
                name: 'fornecedor'
            },
            {
                data: 'telefone',
                name: 'telefone'
            },
            {
                data: 'cnpj',
                name: 'cnpj'
            },
            {
                data: 'acoes',
                name: 'acoes'
            },
        ];

        listar("#lista_fornecedores", "{{route('list.fornecedor')}}", columns);
    });

    $(document).on('click', '.btn-excluir', function (e) {
        var id = $(this).data('id');
        var url = '{{url("fornecedores")}}/' + id;
        var lista = $('#lista_fornecedores');
        excluirDados(url, lista);
    });
</script>
@stop