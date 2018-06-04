<?php

  $con = new mysqli("148.204.86.18", "systemtt4", "Systemtt4.", "tematicasTabasco", 9090);
  if ($con->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
  }

  // Cantidad total de posts
  $sql = "SELECT count(*)  as total FROM publicacion";
  $result = $con->query($sql);
  $total_posts = $result->fetch_assoc();
    
  //Promedio por dia(promedio de post por dia)
  $sql = "SELECT avg(di.post_dia) as pd FROM (select fecha,count(*) as post_dia from publicacion where month(fecha) = ".date("m")." and year(fecha) = ".date("Y")." group by fecha) as di";
  $result = $con->query($sql);
  $post_dia = $result->fetch_assoc();

  //Post por mes
  $sql = "SELECT month(fecha) as mes ,count(*) as post_mes FROM publicacion where year(fecha) = 2017 group by month(fecha)";
  $result_grafica = $con->query($sql);

  //Top fuentes de informacion(nombre fuente, cantidad de posts por fuente)
  $sql = "SELECT nombre,count(*) as total FROM fuenteinformacion f, publicacion p where f.idfuenteinformacion=p.idfuenteinformacion group by nombre order by total desc limit 5";
  $result = $con->query($sql);

  //Datos para tabla(nombre,facebookId,hashtag,total)
  $sql = "SELECT f.idfuenteInformacion,nombre,facebookId,hashtag, count(*) as total FROM fuenteinformacion f, publicacion p where f.idfuenteinformacion=p.idfuenteinformacion group by f.idfuenteInformacion,nombre,facebookId,hashtag desc";
  $result_table = $con->query($sql);

?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tematicas Tabasco</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Efecto de carga -->
    <link rel="stylesheet" type="text/css" href="carga.css">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md" >
    <div id="preloader">
      <div id="status">&nbsp;</div>
    </div>

    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Patrones Delictivos</span></a>
            </div>

            <div class="clearfix"></div>
            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index_post_extraidos.html">Post Extraidos</a></li>
                      <li><a href="index_definiciones.html">Definiciones</a></li>
                      <li><a href="index_clasificacion.html">Clasificacion</a></li>
                      <li><a href="index3.html">Agrupaciones</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form.html">General Form</a></li>
                      <li><a href="form_advanced.html">Advanced Components</a></li>
                      <li><a href="form_validation.html">Form Validation</a></li>
                      <li><a href="form_wizards.html">Form Wizard</a></li>
                      <li><a href="form_upload.html">Form Upload</a></li>
                      <li><a href="form_buttons.html">Form Buttons</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="general_elements.html">General Elements</a></li>
                      <li><a href="media_gallery.html">Media Gallery</a></li>
                      <li><a href="typography.html">Typography</a></li>
                      <li><a href="icons.html">Icons</a></li>
                      <li><a href="glyphicons.html">Glyphicons</a></li>
                      <li><a href="widgets.html">Widgets</a></li>
                      <li><a href="invoice.html">Invoice</a></li>
                      <li><a href="inbox.html">Inbox</a></li>
                      <li><a href="calendar.html">Calendar</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tables.html">Tables</a></li>
                      <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="chartjs.html">Chart JS</a></li>
                      <li><a href="chartjs2.html">Chart JS2</a></li>
                      <li><a href="morisjs.html">Moris JS</a></li>
                      <li><a href="echarts.html">ECharts</a></li>
                      <li><a href="other_charts.html">Other Charts</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <h1>Post Extraidos   </h1>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-users"></i> Post Totales</span>
              <div class="count"><?php echo $total_posts["total"]; ?></div>
              <span class="count_bottom"><i class="green"><i class="fa fa-database"></i>60% </i> Información Total</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Post por dia</span>
              <div class="count"><?php echo (int)$post_dia["pd"]; ?></div>
              <span class="count_bottom"><i class="green"><i class="fa fa-database"></i>1% </i> Información Total</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-facebook-square"></i> Post Facebook</span>
              <div class="count"><?php echo $total_posts["total"]; ?></div>
              <span class="count_bottom"><i class="green"><i class="fa fa-database"></i>60% </i> Información de Redes Sociales</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-twitter-square"></i> Post Twitter</span>
              <div class="count">---</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-database"></i>40% </i> Información de Redes Sociales</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Fuentes Oficiales</span>
              <div class="count">---</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-database"></i>100% </i> SSP</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-database"></i> Informacion Total</span>
              <div class="count">---</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-database"></i></i> Oficiales y No Oficiales</span>
            </div>
          </div>
          <!-- /top tiles -->
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">
                <div class="x_title">
                  <h2>Post extraidos de redes Sociales <small>Facebook y Twitter</small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <div class="x_content" style="height: 50%;">
                    <canvas id="grafica" width="920px" height="300"></canvas>
                  </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                  <div class="x_title">
                    <h2>Top Redes Sociales </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-6">
                    <?php
                      while($top_fuentes = $result->fetch_assoc()) {
                        $top_divs ="<div>
                                      <p>".utf8_encode($top_fuentes["nombre"])."</p>
                                      <div class=''>
                                        <div class='progress progress_sm' style='width: 95%;'>
                                          <div class='progress-bar bg-green' role='progressbar' data-transitiongoal=".((int)$top_fuentes["total"]/(int)$total_posts["total"]*100)."></div>
                                        </div>
                                      </div>
                                    </div>";
                        echo $top_divs;
                      }
                    ?>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
          </br>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Agregar fuente para extracción<small>Facebook y Twitter</small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form id="registro" action="#" method="post" data-parsley-validate class="form-horizontal form-label-left">
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre_fuente">Nombre de la fuente  <span class="required">:</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="nombre_fuente" name="nombre_fuente" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_fuente">Id de la fuente<span class="required">:</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="id_fuente" name="id_fuente" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Hashtags de busqueda<span class="required">:</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="tags_1" type="text" class="tags form-control" />
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-10 col-md-offset-6 ">
                        <button class="btn btn-primary" type="reset">Limpiar</button>
                        <button type="submit" class="btn btn-success">Enviar</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>  
      
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Fuentes de extracción<small>Facebook y Twitter</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Registro de todas las fuentes de las que se extrae información 
                    </p>
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Nombre fuente</th>
                          <th>Id fuente</th>
                          <th>Hashtags</th>
                          <th>Cantidad de posts</th>
                          <th>Realizar extracción</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          while($tables = $result_table->fetch_assoc()) {
                            $table_db ="<tr>
                                          <td>".utf8_encode ($tables["nombre"])."</td>
                                          <td>".$tables["facebookId"]."</td>
                                          <td>".$tables["hashtag"]."</td>
                                          <td>".$tables["total"]."</td>
                                          <td><input type='button' value='Extracción' onClick='postdata(".$tables["idfuenteInformacion"].",".$tables["facebookId"].")'></td>
                                        </tr>";
                            echo $table_db;
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
          </div>
        </div>
		<!-- Inicia modal -->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="myModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">Realizando extracion de Posts</h4>
                    </div>
                    <div class="modal-body">
                    	<IMG SRC="https://www.sportrooms.com/sites/default/files/images/loader.gif" class="imgcenter" ALT="Realizando extración de Posts">
      					<!-- 	<div id="status_extracion">&nbsp;</div> -->
    				</div>
                </div>
            </div>
        </div>
                        <!-- Termina modal -->
            </div>
          </div>
              </div>
              <!-- /end container-->
            </div>
          </div>
        </div>
        <!-- /page content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>
<script type="text/javascript">
  /*   
     Configuracion de la grafica de barras
  */
  <?php 
    $labels = array();
    $data = array();
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); 
    while($grafica = $result_grafica->fetch_assoc()) {
      array_push($labels, $meses[$grafica["mes"] - 1 ]);
      array_push($data, $grafica["post_mes"]);
    }
    $js_array_labels = json_encode($labels);
    $js_array_data = json_encode($data);
    echo "var js_array_labels = ". $js_array_labels . ";\n";
    echo "var js_array_data = ". $js_array_data . ";\n";
  ?>
  new Chart(document.getElementById("grafica"), {
    type: 'line',
    data: {
      labels: js_array_labels,   
      datasets: [
        { 
          data: js_array_data,
          label: "Facebook",
          borderColor: "#3e95cd",
          fill: true
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Extracción de POSTs por mes'
      }
    }
  });

$( "#registro" ).submit(function( event ) {
  event.preventDefault();
  $("#myModal").modal();
  $.post("registro_fuente.php",
    {
        nombre_fuente: $("#nombre_fuente").val(),
        id_fuente: $("#id_fuente").val(),
        hashtags: $("#tags_1").val()
    },
    function(data, status){
        $('#myModal').modal('hide');
        location.reload();
    })
   });

  $(window).on('load', function() { // makes sure the whole site is loaded 
    $('#status').fadeOut(); // will first fade out the loading animation 
    $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
    $('body').delay(350).css({'overflow':'visible'});
   })

  function postdata(idfuente, idfacebook){
    $("#myModal").modal();
    $.post("registro_fuente.php",
      {
        fuente: idfuente,
        facebook: idfacebook
      },
      function(data) {
        $('#myModal').modal('hide');
        location.reload();
      }
    );
  }

</script>
