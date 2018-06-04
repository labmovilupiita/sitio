<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sensor del Crimen | Consulta</title>
        <?php include './css_index.php'; ?>
    </head>

    <body class="nav-sm">
        <div class="container body">
            <div class="main_container">
                <!-- nav index -->
                <?php include './nav_index.php'; ?>

                <!-- page content -->
                <div class="right_col" role="main">
		    
	      	    <div class="page-title">
                        <div class="title_left" style="width: 100%;">
                          <center><h1>Consulta</h1></center>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div id="loaderPublicaciones" class="loader-local">
                                    <img src="images/loader.gif" >
                                </div>
                                <div class="x_title">
                                    <h2>Publicaciones</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <?php include_once './tablaPost.php'; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>


                    <div class="row">
                        <?php include_once './postChartsClases.php'; ?>


                        <?php include_once './postChartsExtracciones.php'; ?>
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
            $(document).ready(function () {
                init_chart_doughnut();
                init_charts_bar();
                //loadPublicaciones();
                loadTablaDinamicaPublicaciones();
                //$('#datatable-responsive').DataTable();
                
            });
        </script>
        <script src="js/publicaciones.js"></script>

    </body>
</html>
