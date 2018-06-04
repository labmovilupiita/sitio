$('.clockpicker').clockpicker();

$(document).on("change", "#fuente_extraccion", function () {
    var index = $(this).context.selectedIndex;
    var fid = $(this).context[index].attributes["fib"].value;
    var hash = $(this).context[index].attributes["hash"].value;
    $("#fid_fuente").val(fid);
    $("#hash_fuente").val(hash);

});

$(document).on("click", ".submit-extraccion", function () {
    if ($("#fuente_extraccion").val() == null || $("#tiempo_extraccion").val() == null) {
        Materialize.toast('Verifica tus Datos...', 2000);
    } else
    {
        $(".overlay-loader").show();
        var id_fuente = $("#fuente_extraccion").val();
        var id_tiempo = $("#tiempo_extraccion").val();
        var hora = $("#hora_extraccion").val();
        $.ajax({
            url: "controller/createExtraccion.php",
            type: 'POST',
            dataType: 'html',
            data: {"id_fuente": id_fuente, "id_tiempo": id_tiempo, "hora": hora},
            success: function (code) {
                if (code == 1) {
                    window.location.href = "extracciones.php";
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