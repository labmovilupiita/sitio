$(document).ready(function () {
    $('table.display').DataTable();
});

$(document).on("click", ".delete-extraccion", function () {
    var id = $(this).attr("id-extraccion");
    $("#delete_extraccion").attr("id-extraccion", id);
    $("#delete_extraccion").openModal();
});

$(document).on("click", ".submit-delete-extraccion", function () {
    $(".overlay-loader").show();
    var id = $("#delete_extraccion").attr("id-extraccion");
    $.ajax({
        url: "controller/deleteExtraccion.php",
        type: 'POST',
        dataType: 'html',
        data: {"id": id},
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
});