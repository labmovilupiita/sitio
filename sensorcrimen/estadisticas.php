<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sensor del Crimen | Estadisticas</title>
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
                        <div class="col-md-4 col-sm-6 col-xs-12 es-ubicaciones">

                            <div class="x_panel " style="height:220px">
                                <div class="loader-local">
                                    <img src="images/loader.gif" >
                                </div>
                                <div class="x_title">
                                    <h2>Estadisticas Ubicaciones</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content ">

                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6 col-xs-12 es-clases">

                            <div class="x_panel ">
                                <div class="loader-local">
                                    <img src="images/loader.gif" >
                                </div>
                                <div class="x_title">
                                    <h2>Estadisticas Clases</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content ">

                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6 col-xs-12 es-dias">

                            <div class="x_panel ">
                                <div class="loader-local">
                                    <img src="images/loader.gif" >
                                </div>
                                <div class="x_title">
                                    <h2>Dias Con Reportes Robos</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content ">

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        
                        <div class="col-md-6 col-sm-12 es-reporteador">
                            <div class="x_panel">
                                <div class="loader-local">
                                    <img src="images/loader.gif" >
                                </div>
                                <div class="x_title">
                                    <h2>Estadisticas Generales</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-sm-12 es-caracteristicas">
                            <div class="x_panel">
                                <div class="loader-local">
                                    <img src="images/loader.gif" >
                                </div>
                                <div class="x_title">
                                    <h2>Estadisticas Atributos y Caracteristicas</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                </div>
                            </div>
                        </div>

                        
                    </div>


                </div>
                <!-- /page content -->

                <!-- footer content -->
                <?php include './footer.php'; ?>
                <!-- /footer content -->
            </div>
        </div>

        <?php include './js_index.php'; ?>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGcbqNzfInH9vSo6EYH_Fn5YHJxhAiVpQ">
        </script>
        <script>

        </script>
        <script src="./vendors/echarts/dist/echarts.min.js"></script>
        <script src="js/estadisticas.js"></script>

        <script>

        </script>
    </body>
</html>
