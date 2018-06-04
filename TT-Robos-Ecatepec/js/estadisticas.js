function  load_es_ubicaciones() {
    $.ajax({
        url: "es_ubicaciones.php",
        type: 'POST',
        dataType: 'html',
        success: function (code) {
            $(".es-ubicaciones .loader-local").remove();
            $(".es-ubicaciones .x_content").append(code);
        },
        error: function (xhr, status, error) {
            console.log(error);

        }
    });
}

function  load_es_clases() {
    $.ajax({
        url: "es_clases.php",
        type: 'POST',
        dataType: 'html',
        success: function (code) {
            $(".es-clases .loader-local").remove();
            $(".es-clases .x_content").append(code);
            char_clases();
        },
        error: function (xhr, status, error) {
            console.log(error);

        }
    });
}


function  load_es_caracteristicas() {
    $.ajax({
        url: "es_caracteristicas.php",
        type: 'POST',
        dataType: 'html',
        success: function (code) {
            $(".es-caracteristicas .loader-local").remove();
            $(".es-caracteristicas .x_content").append(code);
            chart_caracteristicas();
            chart_atributos();
        },
        error: function (xhr, status, error) {
            console.log(error);

        }
    });
}

function load_es_dias() {
    $.ajax({
        url: "es_dias.php",
        type: 'POST',
        dataType: 'html',
        success: function (code) {
            $(".es-dias .loader-local").remove();
            $(".es-dias .x_content").append(code);
            chart_dias();
        },
        error: function (xhr, status, error) {
            console.log(error);

        }
    });
}

    function load_es_reporteador(){
        $.ajax({
        url: "es_reporteador.php",
        type: 'POST',
        dataType: 'html',
        success: function (code) {
            $(".es-reporteador .loader-local").remove();
            $(".es-reporteador .x_content").append(code);
        },
        error: function (xhr, status, error) {
            console.log(error);

        }
    });
    }



$(document).ready(function () {
    load_es_ubicaciones();
    load_es_clases();
    load_es_caracteristicas();
    load_es_dias();
    load_es_reporteador();
});

