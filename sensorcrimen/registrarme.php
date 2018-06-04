<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
        <title>TT2016-A016 | Registrarme</title>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/custom.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <script src='https://www.google.com/recaptcha/api.js'></script>
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
                                    <span class="card-title">Registrarme</span>
                                    <p>Tu Información quedará resguardada bajo nuestras <strong>Politicas de Privacidad</strong>.</p>
                                    <div class="row pt-30">
                                        <div class="input-field col s12 m6">
                                            <input placeholder="Email" id="email_usuario" type="text" class="validate">
                                            <label for="email_usuario">Email</label>
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <input placeholder="Nombre" id="nombre_usuario" type="text" class="validate">
                                            <label for="nombre_usuario">Nombre Usuario</label>
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <input placeholder="Genero" id="genero_usuario" type="text" class="validate">
                                            <label for="genero_usuario">Genero</label>
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <input id="fecha_usuario" type="date" class="validate">
                                            <label for="fecha_usuario"></label>
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <input placeholder="Clave" id="clave_usuario" type="password" class="validate">
                                            <label for="clave_usuario">Clave</label>
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <input placeholder="Verificar Clave" id="clave_usuario" type="password" class="validate">
                                            <label for="clave_usuario">Verificar Clave</label>
                                        </div>
                                        <div class="col s12 m12 ">
                                            <div class="g-recaptcha center-align" data-sitekey="6Le07QsUAAAAAEq-d1FoRNUqnTb8-ihTU5KLsiq6"></div>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-action right-align">
                                    <a href="home.php" class="black-text">Registrarme</a>
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

    </body>
</html>
