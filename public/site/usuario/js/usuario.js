$(document).ready(function () {
    habilitaEventos()
    adicionaMaskCamposLogradouro()
})
const idCeps = [];
const habilitaEventos = () => {

    if ($("#dataInicio").length > 0) {
        new Litepicker({
            element: document.getElementById('dataInicio'),
            lang: "pt-BR",
            singleMode: true,
            resetButton: true,
            tooltipNumber: (totalDays) => {
                return totalDays - 1;
            },
            format: 'DD/MM/YYYY'
        });
    }
    if ($("#dataFim").length > 0) {
        new Litepicker({
            element: document.getElementById('dataFim'),
            lang: "pt-BR",
            singleMode: true,
            resetButton: true,
            tooltipNumber: (totalDays) => {
                return totalDays - 1;
            },
            format: 'DD/MM/YYYY'
        });
    }

    $(".add-enderecos").on("click", function (event) {
        event.preventDefault();
        $(".enderecos").append(
            gerarHtmlEnderecos()
        );
        adicionaMaskCamposLogradouro()
    });

    $(document).on("click", ".cadastrar", function () {
        event.preventDefault();
        submit()
    });

    $(document).on("blur", ".cep", function (event) {
        const cep = $(this).val();
        buscaLogradouroPorCep(cep, $(this));
    });

    $(document).on("click", '.excluir', function (event) {
        event.preventDefault();
        $(this).parent().parent().parent().remove();
    });

    $(".excluir_usuario").on("click", function () {
        const id_usuario = $(this).attr("id");

        Swal.fire({
            icon: 'warning',
            title: 'Tem certeza que deseja excluír este Usuario ?',
            showCancelButton: true,
            confirmButtonColor: "danger",
            confirmButtonText: 'Sim, desejo excluír',
            cancelButtonText: 'Cancelar'
        }).then(result => {
            if (result.isConfirmed) {
                requestDeleteUsuario(id_usuario);
            }
        })
    });

}

const buscaLogradouroPorCep = (cep, elem) => {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: `/logradouro/buscaLogradouroPorCep/${cep}`,
        type: 'POST',
        data: {},
        success: function (data) {

            if (idCeps.includes(data.id)) {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Não é permitido adição de dois Cep\'s iguais',
                    showConfirmButton: false,
                    timer: 3000
                });
                return;
            }
            const elemento = elem.parent().parent();
            elemento.find(".nome_rua").val(data.nome_rua)
            elemento.find(".numero").val(data.numero)
            elemento.find(".estado").val(data.estado)
            elemento.find(".cidade").val(data.cidade)
            elemento.find(".bairro").val(data.bairro)
            elemento.append(`<input type="hidden" name="id_logradouro[]" value="${data.id}" />`)
            idCeps.push(data.id)
        }
    });
}

const submit = () => {
    if ($(".perfil").val().length === 0) {
        return Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'O campo Perfil deve ser preenchido',
            showConfirmButton: false,
            timer: 3000
        });
    }

    if ($(".nome").val().length === 0) {
        return Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'O campo nome deve ser preenchido',
            showConfirmButton: false,
            timer: 3000
        });
    }

    if ($(".email").val().length === 0) {
        return Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'O campo email deve ser preenchido',
            showConfirmButton: false,
            timer: 3000
        });
    }

    if ($(".cpf").val().length === 0) {
        return Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'O campo cpf deve ser preenchido',
            showConfirmButton: false,
            timer: 3000
        });
    }

    $(".cep").each(function (index, element) {
        if (element.value.length === 0) {
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'O campo cep deve ser preenchido',
                showConfirmButton: false,
                timer: 3000
            });
            return false;
        } else {
            $("#form-cadastro-usuario").submit()
        }
    });


}

const requestDeleteUsuario = id => {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: `usuarios/delete/${id}`,
        type: 'DELETE',
        data: {'id': id},
        success: function (data) {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Perfil Excluido com sucesso',
                showConfirmButton: false,
                timer: 60000
            });
            document.location.reload(true);
        }
    });
}

const adicionaMaskCamposLogradouro = () => {
    $('.cep').mask('00000-0000');
    $('.cpf').mask('000.000.000-00');
    $('.numero').mask('0000');
}

const gerarHtmlEnderecos = () => {
    return '<div class="row endereco_usuario mb-3 shadow">' +
        '<div class="row">' +
        '<div class="col-md-12">' +
        '<button class="btn btn-danger float-end excluir"> Excluir Endereço </button>' +
        '</div>' +
        '</div>' +
        '<div class="col-md-3">' +
        '<label for="cep">Cep</label>' +
        '<input type="text" name="cep[]" class="form-control cep" id="cep" placeholder="ex: 47986-987">' +
        '</div>' +
        '<div class="col-md-6">' +
        '<label for="nome_rua">Logradouro</label>' +
        '<input type="text"  class="form-control nome_rua" id="nome_rua" placeholder="ex: Travessa Fonseca" readOnly="">' +
        '</div>' +
        '<div class="col-md-3">' +
        '<label for="numero">Numero</label>' +
        '<input type="text"  class="form-control numero" id="numero" placeholder="ex: 35" readOnly="">' +
        '</div>' +
        '<div class="col-md-4">' +
        '<label for="estado">Estado</label>' +
        '<input type="text"  class="form-control estado" id="estado" readOnly="">' +
        '</div>' +
        '<div class="col-md-4">' +
        '<label for="cidade">Cidade</label>' +
        '<input type="text" class="form-control cidade" id="cidade" readOnly="">' +
        '</div>' +
        '<div class="col-md-4">' +
        '<label for="bairro">Bairro</label>' +
        '<input type="text"  class="form-control bairro" id="bairro" readOnly="">' +
        '</div>' +
        '</div>';


}
