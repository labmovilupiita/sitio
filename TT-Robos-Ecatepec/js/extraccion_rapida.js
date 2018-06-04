$(document).on("change", "#fuente_extraccion", function () {
    var index = $(this).context.selectedIndex;
    var fid = $(this).context[index].attributes["fib"].value;
    var hash = $(this).context[index].attributes["hash"].value;
    $("#fid_fuente").val(fid);
    $("#hash_fuente").val(hash);

});

$(document).on("click", ".submit-extraccion", function () {
    if ($("#fuente_extraccion").val() == null) {
        Materialize.toast('Verifica tus Datos...', 2000);
    } else
    {
        $(".overlay-loader").show();
        $.ajax({
            url: "controller/extraccionRapidaWS.php",
            type: 'POST',
            dataType: 'html',
            data: {"id": $("#fuente_extraccion").val(), "idFb": $("#fid_fuente").val(), "hash": $("#hash_fuente").val()},
            success: function (code) {
                if (code == 1) {
                    $("#extraccion_fin").openModal();
                } else {
                    console.log(code);
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