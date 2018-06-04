$(document).on('click', '.submit-fuente', function () {
    if (($("#nombre_fuente").val() == "") || ($("#fid_fuente").val() == "") || ($("#hashtag_fuente").val() == "") || ($('#ubicacionFuente').val() == null)) {
        Materialize.toast('Verifica tus Datos...', 2500);
    } else {
        $(".overlay-loader").show();
        $.ajax({
            url: "controller/editFuente.php",
            type: 'POST',
            dataType: 'html',
            data: {"id": $("#id_fuente").val(), "nombre": $("#nombre_fuente").val(), "fid": $("#fid_fuente").val(), "hash": $("#hashtag_fuente").val(), "ufuente":$('#ubicacionFuente').val()},
            success: function (code) {
                if (code == 1) {
                    window.location.href = "fuentes.php";
                } else {
                    Materialize.toast('Error, intentalo nuevamente.', 2000);
                }
            },
            error: function (xhr, status, error) {
                console.log(error);
                Materialize.toast('Hubo un error, intentalo más tarde.', 2000);
            },
            complete: function () {
                $(".overlay-loader").hide();
            }
        });
    }
});
