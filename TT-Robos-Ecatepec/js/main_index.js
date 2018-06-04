$(document).on("click", ".openModalReporte", function () {
    $(".modal_reporte").remove();
    var id = $(this).attr("id-reporte");
    $(".overlay-loader").show();
    $.ajax({
        url: "modalReporte.php",
        type: 'POST',
        dataType: 'html',
        data: {"id": id},
        success: function (reporte) {
            $("body").append(reporte);
            $(".modal_reporte").modal("show");
        },
        error: function (xhr, status, error) {
            
        },
        complete: function () {
            $(".overlay-loader").hide();
        }
    });
});