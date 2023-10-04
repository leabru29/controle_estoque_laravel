@extends('adminlte::page')

@section('title', 'Unidade de Produtos')

@section('content_header')
<h1>Unidade de Produtos</h1>
@stop

@section('content')
<div class="container card p-4">
    <div class="row p-2 mb-4">
        <button type="button" id="btn_cadastrar" class="btn btn-success shadow">Cadastrar Unidade Medida</button>
    </div>
    <table id="lista_unidade_medida" class="table table-bordered table-striped shadow">
        <thead>
            <tr>
                <th width="10%">#</th>
                <th width="50%">Unidade de Medida</th>
                <th width="10%">Sigla</th>
                <th width="10%">Ativo</th>
                <th width="20%">Ações</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
@include('cadastros.unidade_medida.modal')
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#lista_unidade_medida').DataTable({
        processing: true,
        info: true,
        ajax: '{{route("list.unidade.medida")}}',
        'pageLength': 5,
        'aLengthMenu': [
            [5, 10, 15, -1],
            [5, 10, 15, "Todos"]
        ],
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'unidade',
                name: 'unidade'
            },
            {
                data: 'sigla',
                name: 'sigla'
            },
            {
                data: 'ativo',
                name: 'ativo'
            },
            {
                data: 'acoes',
                name: 'acoes'
            },
        ],
        order: [
            [0, 'desc']
        ]
    }).ajax.reload(null, false)

    $('#btn_cadastrar').click(function(e) {
        e.preventDefault()
        $('.modal').modal('show')
        $('#btn_salvar').click(function(e) {
            e.preventDefault()
            let url = $('#formulario').attr('action')
            let unidadeMedida = $('#unidade_medida').val()
            let sigla = $('#sigla').val()
            let ativo = $('#ativo').val()
            var param = {
                "unidade": unidadeMedida,
                "sigla": sigla,
                "ativo": ativo
            }
            $.post(url, param, function(data) {
                $('#lista_unidade_medida').DataTable().ajax.reload(null, false)
                $('.modal').modal('hide')
                $("#formulario")[0].reset()
                Swal.fire(
                    'Cadastrado',
                    data.message,
                    'success'
                )

            })
        })
    })

    $(document).on('click', '.btn-editar', function(e) {
        e.preventDefault()
        let id = $(this).data('id')
        let url = '{{url("unidade-medida")}}/' + id;
        $.get(url, function(data) {
            $('.modal').modal('show');
            $('#unidade_medida').val(data.unidade);
            $('#sigla').val(data.sigla);
            $('#ativo').val(data.ativo);
            $('#formulario').attr({
                'action': url,
                'method': 'put'
            });
            $('#btn_salvar').click(function(e) {
                e.preventDefault()
                var unidade = $('#unidade_medida').val()
                var sigla = $('#sigla').val()
                var ativo = $('#ativo').val()
                var param = {
                    unidade: unidade,
                    sigla: sigla,
                    ativo: ativo
                };

                $.ajax({
                    url: url,
                    method: $('#formulario').attr('method'),
                    dataType: 'json',
                    data: param,
                    success: function(response) {
                        $('.modal').modal('hide')
                        Swal.fire(
                            'Atualizado',
                            response.message,
                            'success'
                        )
                        $('#lista_unidade_medida').DataTable().ajax.reload(
                            null,
                            false);
                        $("#formulario")[0].reset();
                    },
                    error: function(response) {
                        $('.modal').modal('hide');
                        console.log(response);
                        /* Swal.fire(
                            'Erro',
                            response.message,
                            'danger'
                        )
                        $('#lista_grupos_produtos').DataTable().ajax.reload(null,
                            false); */
                    }
                });
            })
        });
    })

    $(document).on('click', '.btn-excluir', function(e) {
        e.preventDefault()
        let id = $(this).data('id')
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Deseja realmente excluir?',
            text: "Esta ação não poderá ser revertida!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim, pode excluir!',
            cancelButtonText: 'Não, cancela!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {

                let url = "{{url('unidade-medida')}}/" + id

                $.ajax({
                    url: url,
                    method: 'DELETE',
                    dataType: 'json',
                    contentType: 'application/json',
                    info: true,
                    success: function(result) {
                        $('#lista_unidade_medida').DataTable().ajax.reload(null,
                            false);
                        swalWithBootstrapButtons.fire(
                            'Feito!',
                            'Excluído com sucesso.',
                            'success'
                        )

                    },
                    error: function(data) {
                        console.log(data.responseJSON.message);
                    }
                })
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelado',
                    'Não foi excluido dessa vez :)',
                    'error'
                )
            }
        })
    })
})
</script>
@stop