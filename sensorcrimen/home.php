<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php
        $title = "TT2016A016 | Robo de Autos";
        $nav_active = "pub";
        include_once './css.php';
        ?>

    </head>
    <body>

        <?php include './nav-top.php'; ?>
        <div class="main">
            <div id="index-banner" class="parallax-container">

                <div class="parallax"><img src="images/autos.jpg" alt="Unsplashed background img 1"></div>
            </div>
            <div class="fixed-action-btn">
                <a class="btn-floating btn-large red ">
                    <i class="large material-icons white-text">reorder</i>
                </a>
                <ul>
                    <li><h6>Extracciones</h6><a href="extracciones.php" class="btn-floating green"><i class="material-icons">swap_vert</i></a></li>
                    <li><h6>Fuentes</h6><a href="fuentes.php" class="btn-floating red"><i class="material-icons">group_work</i></a></li>
                </ul>
            </div>

            <div class="container">
                <div class="section">
                    <div class="row" style="position: relative;top: -180px;">
                        <div class="col s12 m12" >
                            <div class="card z-depth-2">
                                <div class="card-content">
                                    <span class="card-title">Robos <span class="right total-post"></span></span>
                                </div>
                            </div>
                        </div>
                        <div class="list-publicaciones">

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


        <div class="overlay-filters"></div>
        <?php include './modals/loader_spin.php'; ?>
        <!--  Scripts-->
        <?php include_once './js.php'; ?>
        <script src="sources/dataTables/script.js"></script>
        <script src="js/home.js"></script>

    </body>
</html>
