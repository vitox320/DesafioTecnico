$(document).ready(function () {
    habilitaEventos()
});

const habilitaEventos = () => {

    $(document).on("click", ".cadastra_perfil", function () {
        event.preventDefault();
        submitPerfil()
    });

    $(".excluir_perfil").on("click", function() {
        const idPerfil = $(this).attr("id");

        Swal.fire({
            icon: 'warning',
            title: 'Tem certeza que deseja excluír este Perfil ?',
            showCancelButton: true,
            confirmButtonColor: "danger",
            confirmButtonText: 'Sim, desejo excluír',
            cancelButtonText: 'Cancelar'
        }).then(result => {
            if (result.isConfirmed) {
                requestDeletePerfil(idPerfil);
            }
        })
    });
}

const submitPerfil = () => {
    if ($(".nome_perfil").val().length === 0) {
        return Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'O campo nome perfil deve ser preenchido',
            showConfirmButton: false,
            timer: 3000
        });
    }

    if ($(".descricao").val().length === 0) {
        return Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'O campo descrição deve ser preenchido',
            showConfirmButton: false,
            timer: 3000
        });
    }

    $("#form_perfil").submit()
}


const requestDeletePerfil = id => {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url:  `perfil/delete/${id}`,
        type: 'DELETE',
        data: {'id':id},
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
