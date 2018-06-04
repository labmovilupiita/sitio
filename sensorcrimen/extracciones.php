<!DOCTYPE html>
<html lang="es">
    <head>
        <?php
        $title = "TT2016A016 | Extracciones";
        $nav_active = "ext";
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
                    <li><h6>Extraccion Rapida</h6><a href="extraccion_rapida.php" class="btn-floating amber"><i class="material-icons">loop</i></a></li>
                    <li><h6>Programar Extracción</h6><a href="extraccion_nueva.php" class="btn-floating red"><i class="material-icons">today</i></a></li>
                </ul>
            </div>

            <div class="container">
                <div class="section">
                    <!--   Icon Section   -->
                    <div class="row">
                        <div class="col s12 m12" style="position: relative;top: -100px;">

                            <div class="card z-depth-2">
                                <div class="card-content">
                                    <span class="card-title">Extracciones</span>
                                    <p>Programación por cada Pagina en facebook de la que obtenemos post de delitos.</p>
                                    <div class="row pt-30">
                                        <div class="col s12 m12">
                                            <?php
                                            include_once './controller/getAllExtracciones.php';
                                            ?>
                                        </div>

                                    </div>
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


        <div class="overlay-filters"></div>

        <div id="delete_extraccion" class="modal" id-extraccion="">
            <div class="modal-content">
                <h5>¿Estas seguro de eliminar esta Extracción?</h5>
            </div>
            <div class="modal-footer">
                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat submit-delete-extraccion">Ok</a>
                <a href="#!" class=" modal-action modal-close waves-effect waves-red btn-flat ">Cencelar</a>
            </div>
        </div>

        <?php include './modals/loader_spin.php'; ?>
        <!--  Scripts-->
        <?php include_once './js.php'; ?>
        <script src="sources/dataTables/script.js"></script>
        <script type="text/javascript" src="js/extracciones.js"></script>
    </body>
</html>
