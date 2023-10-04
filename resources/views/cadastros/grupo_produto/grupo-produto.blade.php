@extends('adminlte::page')

@section('title', 'Grupo de Produtos')

@section('content_header')
<h1>Grupo de Produtos</h1>
@stop

@section('content')
<div class="container card p-4">
    <div class="row p-2 mb-4">
        <button type="button" id="btn_cadastrar" class="btn btn-success shadow">Cadastrar Grupo</button>
    </div>
    <table id="lista_grupos_produtos" class="table table-bordered table-striped shadow">
        <thead>
            <tr>
                <th width="10%">#</th>
                <th width="60%">Nome Grupo</th>
                <th width="10%">Ativo</th>
                <th width="20%">Ações</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
@include('cadastros.grupo_produto.modal')
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
$(document).ready(function () {

    configCSRF();

    var columns = [{
            data: 'id',
            name: 'id'
        },
        {
            data: 'grupo',
            name: 'grupo'
        },
        {
            data: 'ativo',
            name: 'ativo'
        },
        {
            data: 'acoes',
            name: 'acoes'
        },
    ];

    listar("#lista_grupos_produtos", "{{route('list.grupo')}}", columns);
});

$(document).on('click', '#btn_cadastrar', function (e) { 
    
    e.preventDefault();
    
    var modal = $('.modal')
    var form = $('#formulario');
    $(form).each(function () {
        this.reset();
    });

    $(modal).modal('show')
    $(form).attr({
        'action':'{{route("grupo-produto.store")}}',
        'method':'post'
    });
    
    $(form).on('submit', function (e) {
        e.preventDefault()

        var url = $(form).attr('action');
        var method = $(form).attr('method');
        var data = $(form).serializeFormJSON();
        var lista = $('#lista_grupos_produtos');
        
        enviarDados(url, data, method, form, lista, modal);
    });
});

$(document).on('click', '.btn-editar', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    var url = '{{url("grupo-produto")}}/' + id;
    var form = $('#formulario');
    var modal = $('.modal');
    var lista = $('#lista_grupos_produtos');
    var method = 'PUT'
    $(form).attr({
        'action': url,
        'method': method
    });
    $.get(url, function (data, textStatus, jqXHR) {
        $(modal).modal('show');
        $(form).find('#grupo').val(data.grupo);
        $(form).find('#ativo').val(data.ativo);
        $(form).on('submit', function (e) {
        e.preventDefault()

        var url = $(form).attr('action');
        var method = $(form).attr('method');
        var data = $(form).serializeFormJSON();
        
        enviarDados(url, data, method, form, lista, modal);
    });
    });
});

$(document).on('click', '.btn-excluir', function (e) { 
    e.preventDefault();
    var id = $(this).data('id');
    var url = '{{url("grupo-produto")}}/' + id;
    var method = 'DELETE';
    var lista = $('#lista_grupos_produtos');
    excluir(url, method, lista);
});
</script>
@stop