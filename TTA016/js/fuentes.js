
$(document).ready(function () {
    $('table.display').DataTable();

    $(document).on('click', '.delete-fuente', function () {
        $("#delete_fuente").attr("id-fuente", $(this).attr("id-fuente"));
        $("#delete_fuente").openModal();
    });

});


$(document).on('click', '.submit-delete-fuente', function () {
    $(".overlay-loader").show();
    var id = $("#delete_fuente").attr("id-fuente");
    $.ajax({
        url: "controller/deleteFuente.php",
        type: 'POST',
        dataType: 'html',
        data: {"id": id},
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
});
