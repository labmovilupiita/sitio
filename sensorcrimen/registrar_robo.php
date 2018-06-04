<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
        <title>TT2016-A016 | Registrar Robo</title>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/custom.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
    <body>
        <?php include './nav-top.php'; ?>
        <div class="main">
            <div id="index-banner" class="parallax-container">

                <div class="parallax"><img src="images/autos.jpg" alt="Unsplashed background img 1"></div>
            </div>


            <div class="container">
                <div class="section">
                    <a class="btn-floating btn-large waves-effect waves-light red" style="
                       right: 50px;
                       position: absolute;
                       top: 415px;
                       "><i class="material-icons">save</i></a>
                    <!--   Icon Section   -->
                    <div class="row">
                        <div class="col s12 m12" style="position: relative;top: -100px;">
                            <div class="card z-depth-2">
                                <div class="card-content">
                                    <span class="card-title">Registrar Robo</span>
                                    <p>Recuerda que esta es una denuncia <strong>anonima</strong> y no se te pedirá información personal.</p>
                                    <div class="row pt-30">
                                        <div class="input-field col s12 m6">
                                            <input placeholder="Marca Auto" id="marca_auto" type="text" class="validate">
                                            <label for="marca_auto">Marca Auto</label>
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <input placeholder="Nombre Auto" id="nombre_auto" type="text" class="validate">
                                            <label for="nombre_auto">Nombre Auto</label>
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <input placeholder="Placa Auto" id="placa_auto" type="text" class="validate">
                                            <label for="placa_auto">Placa</label>
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <input placeholder="Fecha de robo" id="fecha_robo" type="text" class="validate">
                                            <label for="fecha_robo">Fecha de robo</label>
                                        </div>
                                        <div class="input-field col s12 m12">
                                            <textarea placeholder="Descripción del robo" id="descripcion_robo" class="materialize-textarea"></textarea>
                                            <label for="descripcion_robo">Descripción del robo</label>
                                        </div>

                                        <div class="col s12 m12">
                                            <h5>Ubicación del robo</h5>
                                        </div>
                                        <div class="col s12 m12" id="map"  style="height: 400px">

                                        </div>
                                    </div>
                                </div>
                                <div class="card-action right-align">
                                    <a href="home.php" class="black-text">Registrar</a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <?php
        /*
          <footer class="page-footer teal">
          <div class="container">
          <div class="row">
          <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


          </div>
          <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
          <li><a class="white-text" href="#!">Link 1</a></li>
          <li><a class="white-text" href="#!">Link 2</a></li>
          <li><a class="white-text" href="#!">Link 3</a></li>
          <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
          </div>
          <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
          <li><a class="white-text" href="#!">Link 1</a></li>
          <li><a class="white-text" href="#!">Link 2</a></li>
          <li><a class="white-text" href="#!">Link 3</a></li>
          <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
          </div>
          </div>
          </div>
          <div class="footer-copyright">
          <div class="container">
          Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a>
          </div>
          </div>
          </footer>
         */
        ?>



        
        <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>
        <script src="sources/nicescroll/jquery.nicescroll.js"></script>
        <script src="js/main.js"></script>
        <script>
            function initMap() {
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 14,
                    center: {lat: 19.6007069, lng: -99.0452943}
                });

                map.addListener('click', function (e) {
                    placeMarkerAndPanTo(e.latLng, map);
                });
            }

            function placeMarkerAndPanTo(latLng, map) {
                var marker = new google.maps.Marker({
                    position: latLng,
                    map: map
                });
                map.panTo(latLng);
            }

        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGcbqNzfInH9vSo6EYH_Fn5YHJxhAiVpQ&signed_in=true&callback=initMap" async defer></script>
    </body>
</html>
