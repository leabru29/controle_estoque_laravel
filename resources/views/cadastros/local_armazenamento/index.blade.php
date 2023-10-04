@extends('adminlte::page')

@section('title', 'Locais de Armazenamento')

@section('content_header')
<section>
   
</section>
@stop

@section('content')
<div class="container card p-4">
    <div class="row p-2 mb-4">
        <a href="{{route('locais.create')}}" class="btn btn-success shadow">Cadastrar Local Armazenamento</a>
    </div>
    @if (session('message'))
        <div class="alert alert-success shadow">
            {{ session('message') }}
        </div>
    @endif
    <table id="lista_locais" class="table table-bordered table-striped shadow">
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

    configCSRF();

    $(document).ready(function () {
        
        var columns = [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'local',
                name: 'local'
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

        listar("#lista_locais", "{{route('list.locais')}}", columns);
    });

    $(document).on('click', '.btn-excluir', function (e) {
        var id = $(this).data('id');
        var url = '{{url("locais")}}/' + id;
        var lista = $('#lista_locais');
        excluirDados(url, lista);
    });
</script>
@stop