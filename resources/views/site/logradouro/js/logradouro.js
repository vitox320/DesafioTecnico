$(document).ready(function () {
    habilitaEventosLogradouro()
    adicionaMaskCamposLogradouro()

})

const habilitaEventosLogradouro = () => {

    $(document).on("click", ".cadastra_logradouro", function () {
        event.preventDefault();
        submitLogradouro()
    });

    $(".excluir_logradouro").on("click", function() {
        const idLogradouro = $(this).attr("id");

        Swal.fire({
            icon: 'warning',
            title: 'Tem certeza que deseja excluír este Logradouro ?',
            showCancelButton: true,
            confirmButtonColor: "primary",
            confirmButtonText: 'Sim, desejo excluír',
            cancelButtonText: 'Cancelar'
        }).then(result => {
            if (result.isConfirmed) {
                requestDeleteLogradouro(idLogradouro);
            }
        })
    });
}

const submitLogradouro = () => {
    if ($(".cep_logradouro").val().length === 0) {
        return Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'O campo cep deve ser preenchido',
            showConfirmButton: false,
            timer: 3000
        });
    }

    if ($(".nome_rua_logradouro").val().length === 0) {
        return Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'O campo logradouro deve ser preenchido',
            showConfirmButton: false,
            timer: 3000
        });
    }

    if ($(".numero_logradouro").val().length === 0) {
        return Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'O campo numero deve ser preenchido',
            showConfirmButton: false,
            timer: 3000
        });
    }

    if ($(".estado_logradouro").val().length === 0) {
        return Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'O campo estado deve ser preenchido',
            showConfirmButton: false,
            timer: 3000
        });
    }

    if ($(".cidade_logradouro").val().length === 0) {
        return Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'O campo cidade deve ser preenchido',
            showConfirmButton: false,
            timer: 3000
        });
    }

    if ($(".bairro_logradouro").val().length === 0) {
        return Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'O campo bairro deve ser preenchido',
            showConfirmButton: false,
            timer: 3000
        });
    }

    $("#form_logradouro").submit()
}

const adicionaMaskCamposLogradouro = () => {
    $('.cep_logradouro').mask('00000-000');
    $('.numero_logradouro').mask('0000');
}

const requestDeleteLogradouro = id => {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url:  `logradouro/delete/${id}`,
        type: 'DELETE',
        data: {'id':id},
        success: function (data) {
            document.location.reload(true);
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Logradouro Excluido com sucesso',
                showConfirmButton: false,
                timer: 3000
            });

        }
    });
}
