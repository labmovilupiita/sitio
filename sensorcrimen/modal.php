<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
        <title>TT2016-A016 | Robos</title>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/custom.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
    <body>
        <?php include './nav-top.php'; ?>
        <div class="main">

            <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>
            <p>You have to include jQuery and Materialize JS + CSS for the modal to work. You can include it from <a href="http://materializecss.com/getting-started.html">CDN (getting started)</a>.
        </div>
    </div>
    <!-- Modal Structure -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>Modal Header</h4>
            <p>A bunch of text</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
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

    <div class="overlay-filters"></div>

    <!--  Scripts-->
    <script src="js/jquery.js"></script>
    <script src="sources/nicescroll/jquery.nicescroll.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
    <script src="js/main.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGcbqNzfInH9vSo6EYH_Fn5YHJxhAiVpQ&signed_in=true&callback=initMap" async defer></script>
</body>
</html>
