<?php 
include './Model/Conexion.php';
include './Model/ReporteRobo.php';
include './Model/ReporteRoboDAO.php';
$rrdoa= new ReporteRoboDAO();
?>
<!-- top tiles -->
<div class="row tile_count">
    <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Post</span>
        <div class="count"><?php echo $rrdoa->total() ?></div>
    </div>
   <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Con Violencia</span>
        <div class="count red"><?php echo $rrdoa->totalByClase("violencia") ?></div>

    </div>
    
    
    <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Sin violencia</span>
        <div class="count orange"><?php echo $rrdoa->totalByClase("sviolencia") ?></div>

    </div>
    
    <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> No Especificados</span>
        <div class="count green"><?php echo $rrdoa->totalByClase("neutro") ?></div>

    </div>


</div>
<!-- /top tiles -->