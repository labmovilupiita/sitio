page = 1;

function loadPublicaciones() {
    $(".overlay-loader").show();
    $.ajax({
        url: "postPostRecientes.php",
        type: 'POST',
        dataType: 'html',
        data: {"page": page},
        success: function (pubs) {
            $(".list-publicaciones").html(pubs);
        },
        error: function (xhr, status, error) {
            console.log(error);
            //Materialize.toast('Hubo un error, intentalo más tarde.', 2000);
        },
        complete: function () {
            $(".overlay-loader").hide();
        }
    });
}

$(document).on('keypress', ".pagePost", function (e) {
    console.log($(this).val());
    if ($(this).is(":focus") && (e.keyCode == 13)) {
        if ($(this).val() > 0 && $(this).val() <= $(this).attr('max-value')) {
            page = $(this).val();
            loadPublicaciones();
            $(".pagePost").val(page);

        }
    }
});