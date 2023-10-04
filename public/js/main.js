//Configura CSRF TOKEN
const configCSRF = () => {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}

//Carrega a lista dos dados no DataTables via Ajax
const listar = (id_element, url, columns) => {
    $(id_element).DataTable({
        processing: true,
        info: true,
        ajax: url,
        'pageLength': 5,
        'aLengthMenu': [
            [5, 10, 15, -1],
            [5, 10, 15, "Todos"]
        ],
        columns: columns,
        order: [[0, 'desc']]
    }).ajax.reload(null, false)
}


(function ($) { // Função que vai tratar os dados do form para JSON
    $.fn.serializeFormJSON = function () {

        var obj = {};
        var array = this.serializeArray();
        $.each(array, function () {
            if (obj[this.name]) {
                if (!obj[this.name].push) {
                    obj[this.name] = [obj[this.name]];
                }
                obj[this.name].push(this.value || '');
            } else {
                obj[this.name] = this.value || '';
            }
        });
        return obj;
    };
})(jQuery);


const enviarDados = (url, data, method, form, lista, modal) => {

    $.ajax({
        url: url,
        method: method,
        data: data,
        cache: false,
        beforeSend: function (xhr) {
            console.log(xhr);
        },
        success: function (result) {
            $(form).each(function () {
                this.reset();
            });
            $(lista).DataTable().ajax.reload(null, false);
            $(modal).modal('hide');
            Swal.fire(
                'Cadastrado com sucesso!',
                result.message,
                'success'
            );
        },
        error: function (result) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: result.responseJSON.message,
                footer: "Consulte os dados"
            })
        },
        done: function () {
            $(form).each(function () {
                this.reset();
            });
        }
    });
    return false;
}

const excluirDados = (url, lista) => {
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
            $.ajax({
                url: url,
                method: 'DELETE',
                dataType: 'json',
                contentType: 'application/json',
                info: true,
                success: function (result) {
                    $(lista).DataTable().ajax.reload(null,
                        false);
                    swalWithBootstrapButtons.fire(
                        'Feito!',
                        result.message,
                        'success'
                    )
                },
                error: function (data) {
                    console.log(data.responseJSON.message);
                }
            })
        } else if (
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelado',
                'Não foi excluido dessa vez :)',
                'error'
            )
        }
    })
}