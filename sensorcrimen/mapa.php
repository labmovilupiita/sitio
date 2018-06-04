<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sensor del Crimen | Mapa</title>
        <?php include './css_index.php'; ?>
    </head>

    <body class="nav-sm">
        <div class="container body">
            <div class="main_container">
                <!-- nav index -->
                <?php include './nav_index.php'; ?>

                <!-- page content -->
		<div class="right_col" role="main">
		    
		    <div class="page-title">
                        <div class="title_left" style="width: 100%;">
                          <center><h1>Mapa Delictivo </h1></center>
                        </div>
                    </div>


                    <div class="row">
                        <div id="map" style="width: 100%; height: 600px"></div>
                    </div>




                </div>
                <!-- /page content -->

                <!-- footer content -->
                <?php include './footer.php'; ?>
                <!-- /footer content -->
            </div>
        </div>

        <?php include './js_index.php'; ?>

        <script>
            function mapearRobos(json) {
                var ecatepec = {lat: 19.6015242, lng: -99.04097019999999};
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 15,
                    center: ecatepec
                });
                
                
                for (i = 0; i < json.length; i++) {
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(json[i].ubicacion.lat, json[i].ubicacion.lng),
                        title: json[i].ubicacion.direccion,
                        icon: new google.maps.MarkerImage(
                                'images/carmarker.png',
                                null, /* size is determined at runtime */
                                null, /* origin is 0,0 */
                                null, /* anchor is bottom center of the scaled image */
                                new google.maps.Size(50, 50))
                    });
                    var content = '<div id="content">' +
                            '<div id="siteNotice">' +
                            '</div>' +
                            '<p>'+ json[i].publicacion.publicacion + '</p>'+
                            '<div id="bodyContent">' +
                            '<a href="#" class="openModalReporte orange" id-reporte="'+ json[i].idreporte +'">Detalles...</a>'+
                            '</div>' +
                            '</div>';
// Add circle overlay and bind to marker
                    var circle = new google.maps.Circle({
                        strokeColor: '#FF0000',
                        strokeOpacity: 0.8,
                        strokeWeight: 2,
                        fillColor: '#FF0000',
                        fillOpacity: 0.35,
                        map: map,
                        radius: 150
                    });
                    circle.bindTo('center', marker, 'position');

                    var infowindow = new google.maps.InfoWindow({
                        content: content
                    });
                    google.maps.event.addListener(marker, 'click', (function (marker, content, infowindow) {
                        return function () {
                            infowindow.setContent(content);
                            infowindow.open(map, marker);
                            map.setZoom(17);
                            map.setCenter(marker.getPosition());
                        };
                    })(marker, content, infowindow));
                    marker.setMap(map);
                }
                
                $(".overlay-loader").hide();

                // Add a marker clusterer to manage the markers.

            }






            function initMap() {
            $(".overlay-loader").show();
                $.ajax({
                    url: "controller/getRobosJson.php",
                    type: 'POST',
                    success: function (json) {
                        
                        console.log("########### Datos de mapa");
                        console.log(json);
                        mapearRobos(json);
                    },
                    error: function (xhr, status, error) {
                        Materialize.toast('Hubo un error, intentalo más tarde.', 2000);
                    }
                });
            }
        </script>

        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
        </script>

        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGcbqNzfInH9vSo6EYH_Fn5YHJxhAiVpQ&callback=initMap">
        </script>


    </body>
</html>
