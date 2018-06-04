<?php
include_once './Model/Conexion.php';
include_once './Model/UbicacionDAO.php';
$udao = new UbicacionDAO();
$tnu = $udao->totalNoUbicados();
$tu = $udao->totalUbicados();
$total = $tnu + $tu;
$ptnu = round(($tnu * 100) / $total, 1);
$ptu = round(($tu * 100) / $total, 1);
?>
<div class="widget_summary">
    <div class="w_left w_25">
        <span>Con Ubicación</span>
    </div>
    <div class="w_center w_55">
        <div class="progress">
            <div class="progress-bar bg-blue" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
            </div>
        </div>
    </div>
    <div class="w_right w_20">
        <span><?php echo $total ?></span>
    </div>
    <div class="clearfix"></div>
</div>
<div class="widget_summary">
    <div class="w_left w_25">
        <span>Ubicados</span>
    </div>
    <div class="w_center w_55">
        <div class="progress">
            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="<?php echo $ptu ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $ptu ?>%;">
            </div>
        </div>
    </div>
    <div class="w_right w_20">
        <span><?php echo $tu ?></span>
    </div>
    <div class="clearfix"></div>
</div>
<div class="widget_summary">
    <div class="w_left w_25">
        <span>No Ubicados</span>
    </div>
    <div class="w_center w_55">
        <div class="progress">
            <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="<?php echo $ptnu ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $ptnu ?>%;">
            </div>
        </div>
    </div>
    <div class="w_right w_20">
        <span><?php echo  $tnu ?></span>
    </div>
    <div class="clearfix"></div>
</div>
