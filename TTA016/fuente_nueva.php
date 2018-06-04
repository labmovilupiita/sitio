<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        $title = "TT2016A016 | Fuente Nueva";
        include_once './css.php';
        ?>
    </head>
    <body>
        <?php include './nav-top.php'; ?>
        <div class="main">
            <div id="index-banner" class="parallax-container">

                <div class="parallax"><img src="images/autos.jpg" alt="Unsplashed background img 1"></div>
            </div>


            <div class="container">
                <div class="section">
                    <div class="fixed-action-btn submit-fuente">
                        <a class="btn-floating btn-large red "><i class="large material-icons white-text">offline_pin</i></a>
                    </div>
                    <!--   Icon Section   -->
                    <div class="row">
                        <div class="col s12 m12" style="position: relative;top: -100px;">
                            <div class="card z-depth-2">
                                <div class="card-content">
                                    <span class="card-title">Registrar Fuente</span>
                                    <p>Pagina en facebook de la cual obtendremos los post de delitos.</p>
                                    <div class="row pt-30">
                                        <div class="input-field col s12 m6">
                                            <input placeholder="Nombre Pagina" id="nombre_fuente" type="text" class="validate">
                                            <label for="nombre_fuente">Nombre Pagina</label>
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <input placeholder="Fid Pagina" id="fid_fuente" type="text" class="validate">
                                            <label for="fid_fuente">Fid Pagina</label>
                                        </div>

                                        <div class="input-field col s12 m6">
                                            <input placeholder="Hashtag" id="hashtag_fuente" type="text" class="validate">
                                            <label for="hashtag_fuente">Hashtag</label>
                                        </div>

                                        <?php include './controller/getAllUbicacionFuente.php'; ?>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <?php include './modals/loader_spin.php'; ?>

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
        <?php include_once './js.php'; ?>
        <script src="js/fuente_nueva.js"></script>
    </body>
</html>
