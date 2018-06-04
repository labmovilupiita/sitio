<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        $title = "TT2016A016 | Extracción Nueva";
        include_once './css.php';
        ?>
        <link rel="stylesheet" type="text/css" href="sources/clockpicker/assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="sources/clockpicker/dist/bootstrap-clockpicker.css">       

    </head>
    <body>
        <?php include './nav-top.php'; ?>
        <div class="main">
            <div id="index-banner" class="parallax-container">

                <div class="parallax"><img src="images/autos.jpg" alt="Unsplashed background img 1"></div>
            </div>


            <div class="container">
                <div class="section">
                    <div class="fixed-action-btn submit-extraccion">
                        <a class="btn-floating btn-large red "><i class="large material-icons white-text">offline_pin</i></a>

                    </div>
                    <!--   Icon Section   -->
                    <div class="row">
                        <div class="col s12 m12" style="position: relative;top: -100px;">
                            <div class="card z-depth-2">
                                <?php include './controller/nuevaExtraccion.php'; ?>
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


        <?php include './modals/loader_spin.php'; ?>

        <!--  Scripts-->
        <?php include_once './js.php'; ?>
        <script type="text/javascript" src="sources/clockpicker/assets/js/bootstrap.js"></script>
        <script type="text/javascript" src="sources/clockpicker/dist/bootstrap-clockpicker.js"></script>
        <script type="text/javascript" src="js/extraccion_nueva.js"></script>

    </body>
</html>
