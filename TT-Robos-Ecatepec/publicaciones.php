<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Reportes de Robo | TT A016</title>
        <?php include './css_index.php'; ?>
    </head>

    <body class="nav-sm">
        <div class="container body">
            <div class="main_container">
                <!-- nav index -->
                <?php include './nav_index.php'; ?>

                <!-- page content -->
                <div class="right_col" role="main">


                    <div class="row">
                        <?php include_once './postChartsClases.php'; ?>


                        <?php include_once './postChartsExtracciones.php'; ?>
                    </div>
                    <br>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <?php
                                    $pages = floor($total / 25);
                                    $reciduo = $total % 25;
                                    if ($reciduo > 0) {
                                        $pages++;
                                    }
                                    ?>
                                    <h2>Post Recientes</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li role="presentation" class="dropdown">
                                            <a id="drop5" href="#" class="dropdown-toggle black-text" style="margin-right: 10px;" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                                                Clase
                                                <span class="caret"></span>
                                            </a>
                                            <ul id="menu2" class="dropdown-menu animated fadeInDown" role="menu" aria-labelledby="drop5">   
                                                <li role="presentation" class="divider" style="margin-top: 0;"></li>
                                                <li role="presentation"><a role="menuitem"  href="#">Violencia</a>
                                                <li role="presentation" class="divider"></li>
                                                <li role="presentation"><a role="menuitem"  href="#">Sin Violencia</a>
                                                <li role="presentation" class="divider"></li>
                                                <li role="presentation"><a role="menuitem"  href="#">No especificado</a>
                                                <li role="presentation" class="divider" style="margin-bottom: 0;"></li>
                                        </li>
                                    </ul>
                                    </li>
                                    Página <input type="text" placeholder="1" style="width: 50px" class="pagePost" max-value="<?php echo $pages ?>"/> de <?php echo $pages ?>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <ul class="list-unstyled timeline list-publicaciones">

                                    </ul>

                                </div>
                                <div class="x_title">

                                    <h2>Post Recientes</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        Página <input type="text" placeholder="1" style="width: 50px" class="pagePost" max-value="<?php echo $pages ?>" /> de <?php echo $pages ?>
                                    </ul>

                                </div>
                            </div>
                        </div>

                    </div>



                </div>
                <!-- /page content -->

                <!-- footer content -->
                <footer>
                    <div class="pull-right">
                        TT 2016 A016 2017
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
        </div>

        <?php include './js_index.php'; ?>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGcbqNzfInH9vSo6EYH_Fn5YHJxhAiVpQ">
        </script>
        <script>
            $(document).ready(function () {
                init_chart_doughnut();
                init_charts_bar();
                loadPublicaciones();
            });
        </script>
        <script src="js/publicaciones.js"></script>

    </body>
</html>
