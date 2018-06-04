<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
include_once './Model/Conexion.php';
include_once './Model/PublicacionDAO.php';
$page = filter_input(INPUT_POST, "page");
$pubdao = new PublicacionDAO();
$totalPublis = $pubdao->total();
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

            <div class="list-clases">
                <div class="row pr-15 pl-15 pt-15">
                    
                    
                    <div class="row">
                        <div class="col m2 s4 white z-depth-1 bl-1">
                            <h6> Post Totales</h6>
                            <h4 class="blue-text text-darken-2">10205</h4>
                        </div>
                        <div class="col m2 s4 white z-depth-1 bl-1">
                            <h6>Violencia</h6>
                            <h4 class="green-text text-darken-2">4518</h4>
                        </div>
                        <div class="col m2 s4 white z-depth-1 bl-1">
                            <h6>Sin Violencia</h6>
                            <h4 class="red-text text-darken-3">3754</h4>
                        </div>
                        <div class="col m2 s4 white z-depth-1 bl-1">
                            <h6>Neutros</h6>
                            <h4 class="blue-text text-darken-2">2410</h4>
                        </div>
                        <div class="col m2 s4 white z-depth-1 bl-1">
                            <h6>Sin Violencia</h6>
                            <h4 class="green-text text-darken-2">3754</h4>
                        </div>
                        <div class="col m2 s4 white z-depth-1 bl-1">
                            <h6>Neutros</h6>
                            <h4 class="red-text text-darken-3">2410</h4>
                        </div>
                    </div>

                    
                    <div class="col m12 s12 center-align">
                        <ul class="pagination">
                            <li class="waves-effect disabled last-number-page"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                            Página <input type="text" name="page" class="validate number-page" value="1" max="<?php echo round($totalPublis / 20, -1); ?>"> de <?php echo round($totalPublis / 20, -1); ?>
                            <li class="waves-effect next-number-page"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                        </ul>

                    </div>

                    <div class="listado-publicaciones">

                    </div>

                    <div class="col m12 s12 center-align">
                        <ul class="pagination">
                            <li class=" waves-effect disabled last-number-page"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                            Página <input type="text" name="page" class="validate number-page" value="1" max="<?php echo round($totalPublis / 20, -1); ?>"> de <?php echo round($totalPublis / 20, -1); ?>
                            <li class="waves-effect next-number-page"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                        </ul>

                    </div>

                </div>
            </div>
            <?php include './modals/loader_general.php'; ?>
            <?php include './modals/filtrar_mes.php'; ?>
            <?php include './modals/filtrar_dia.php'; ?>
            <?php include './modals/filtrar_zona.php'; ?>
            <?php include './modals/filtrar_tiempo.php'; ?>

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
        <script src="js/index.js"></script>
        <script >
            $(".list-robos").niceScroll();
        </script>
    </body>
</html>
