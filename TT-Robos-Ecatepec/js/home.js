page = 1;

function loadPublicaciones() {
    $(".overlay-loader").show();
    $.ajax({
        url: "controller/getAllPublicaciones.php",
        type: 'POST',
        dataType: 'html',
        data: {"page": page},
        success: function (pubs) {
            $(".list-publicaciones").append(pubs);
        },
        error: function (xhr, status, error) {
            console.log(error);
            Materialize.toast('Hubo un error, intentalo más tarde.', 2000);
        },
        complete: function () {
            $(".overlay-loader").hide();
            page++;
        }
    });
}

$(document).ready(function () {
    $('table.display').DataTable();
    loadPublicaciones();

    window.onscroll = function (ev) {
        if ((window.innerHeight + window.pageYOffset) >= document.body.offsetHeight) {
            loadPublicaciones();
        }
    };

});