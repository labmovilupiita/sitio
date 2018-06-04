var page = 1;
// This example displays a marker at the center of Australia.
// When the user clicks the marker, an info window opens.

function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 14,
        center: {lat: 19.598488, lng: -99.054865}
    });

    var customMapType = new google.maps.StyledMapType([
        {
            featureType: "poi.business",
            elementType: 'labels.icon',
            stylers: [{visibility: 'off'}]
        },
        {
            featureType: "road.arterial",
            elementType: 'labels.icon',
            stylers: [{visibility: 'off'}]
        }


    ], {
        name: 'Custom Style'
    });
    var customMapTypeId = 'custom_style';
    map.mapTypes.set(customMapTypeId, customMapType);
    map.setMapTypeId(customMapTypeId);

    var contentString = '<div id="content">' +
            '<div id="siteNotice">' +
            '</div>' +
            '<h6 id="firstHeading" class="firstHeading">Seat / Ibiza / Azul</h6>' +
            '<h6>Adolfo López Mateos, Ecatepec de Morelos</h6>' +
            '<div id="bodyContent">' +
            '<p>Robo acurrido el 03-11-2016 a las 4:20 pm</p>' +
            '</div>' +
            '</div>';

    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });

    var iconBase = 'images/carmarker.png';

    // Create marker on the map


    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(19.598488, -99.054865),
        map: map,
        draggable: false

    });
    //icon:iconBase

    marker.addListener('click', function () {
        infowindow.open(map, marker);
    });

    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(19.608488, -99.054865),
        map: map,
        draggable: false

    });
    //icon:iconBase

    marker.addListener('click', function () {
        infowindow.open(map, marker);
    });

    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(19.598488, -99.059865),
        map: map,
        draggable: false

    });
    //icon:iconBase

    marker.addListener('click', function () {
        infowindow.open(map, marker);
    });
}

$(document).ready(function () {
    $(document).on('click', '.filtrar_mes', function () {
        $('#filtrar_mes').openModal();
    });
    $(document).on('click', '.filtrar_dia', function () {
        $('#filtrar_dia').openModal();
    });
    $(document).on('click', '.filtrar_zona', function () {
        $('#filtrar_zona').openModal();
    });
    $(document).on('click', '.filtrar_tiempo', function () {
        $('#filtrar_tiempo').openModal();
    });
    $(".list-robos").niceScroll();
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });
    loadPublicaciones();


    $(document).on('click', '.last-number-page', function () {
        if (!$(this).hasClass('disabled')) {
            if (page == 2) {
                $(this).addClass('disabled');
                page--;
                loadPublicaciones();
            } else {
                $('.next-number-page').removeClass('disabled');
                page--;
                loadPublicaciones();
            }
            $(".number-page").val(page);
        }
    });



    $(document).on('keypress', '.number-page', function (e) {

        if ($(".number-page").is(":focus") && (e.keyCode == 13)) {
            if ($('.number-page').val() > 0 && $('.number-page').val() <= $('.number-page').attr('max')) {
                page = $('.number-page').val();
                if (page == 2) {
                    $('.last-number-page').addClass('disabled');
                    page--;
                    loadPublicaciones();
                } else if (page == $('.number-page').attr('max') - 1) {
                    $('.next-number-page').addClass('disabled');
                    page++;
                    loadPublicaciones();
                } else {
                    $('.next-number-page').removeClass('disabled');
                    $('.last-number-page').removeClass('disabled');
                    loadPublicaciones();
                }
                $(".number-page").val(page);
            } else {
                Materialize.toast('Verifique el numero de pagina que desea', 2000);
            }
        }
    });

    $(document).on('click', '.next-number-page', function () {
        if (!$(this).hasClass('disabled')) {
            if (page == $('.number-page').attr('max') - 1) {
                $(this).addClass('disabled');
                page++;
                loadPublicaciones();
            } else {
                $('.last-number-page').removeClass('disabled');
                page++;
                loadPublicaciones();
            }
            $(".number-page").val(page);
        }
    });


});

function loadPublicaciones() {
    $(".overlay-loader").show();
    $.ajax({
        url: "controller/getPublicacionesPage.php",
        type: 'POST',
        dataType: 'html',
        data: {"page": page},
        success: function (pubs) {
            $(".listado-publicaciones").html(pubs);
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
