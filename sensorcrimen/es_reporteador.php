<?php
include_once './Model/Conexion.php';
include_once './Model/ReporteRoboDAO.php';
$rrdao = new ReporteRoboDAO();
$repo = $rrdao->getReporteador();
$total = $repo[0];
?>

<div class="widget_summary">
    <div class="w_left w_25">
        <span>Totales</span>
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
        <span>Utiles</span>
    </div>
    <div class="w_center w_55">
        <div class="progress">
            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="<?php echo round(($repo[1] * 100) / $total, 1); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round(($repo[1] * 100) / $total, 1); ?>%;">
            </div>
        </div>
    </div>
    <div class="w_right w_20">
        <span><?php echo $repo[1] ?></span>
    </div>
    <div class="clearfix"></div>
</div>
<div class="divider"></div>

<br>
<div class="widget_summary">
    <div class="w_left w_25">
        <span>Violencia</span>
    </div>
    <div class="w_center w_55">
        <div class="progress">
            <div class="progress-bar bg-red" role="progressbar" aria-valuenow="<?php echo round(($repo[2] * 100) / $total, 1); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round(($repo[2] * 100) / $total, 1); ?>%;">
            </div>
        </div>
    </div>
    <div class="w_right w_20">
        <span><?php echo $repo[2] ?></span>
    </div>
    <div class="clearfix"></div>
</div>

<div class="widget_summary">
    <div class="w_left w_25">
        <span>Sin Violencia</span>
    </div>
    <div class="w_center w_55">
        <div class="progress">
            <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="<?php echo round(($repo[3] * 100) / $total, 1); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round(($repo[3] * 100) / $total, 1); ?>%;">
            </div>
        </div>
    </div>
    <div class="w_right w_20">
        <span><?php echo $repo[3] ?></span>
    </div>
    <div class="clearfix"></div>
</div>

<div class="widget_summary">
    <div class="w_left w_25">
        <span>No especificado</span>
    </div>
    <div class="w_center w_55">
        <div class="progress">
            <div class="progress-bar bg-blue" role="progressbar" aria-valuenow="<?php echo round(($repo[4] * 100) / $total, 1); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round(($repo[4] * 100) / $total, 1); ?>%;">
            </div>
        </div>
    </div>
    <div class="w_right w_20">
        <span><?php echo $repo[4] ?></span>
    </div>
    <div class="clearfix"></div>
</div>
<div class="divider"></div>
<br>

<div class="widget_summary">
    <div class="w_left w_25">
        <span>Ubicados</span>
    </div>
    <div class="w_center w_55">
        <div class="progress">
            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="<?php echo round(($repo[5] * 100) / $total, 1); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round(($repo[5] * 100) / $total, 1); ?>%;">
            </div>
        </div>
    </div>
    <div class="w_right w_20">
        <span><?php echo $repo[2] ?></span>
    </div>
    <div class="clearfix"></div>
</div>
<?php $total = $repo[5]; ?>
<div class="widget_summary">
    <div class="w_left w_25">
        <span>Con Colonia</span>
    </div>
    <div class="w_center w_55">
        <div class="progress">
            <div class="progress-bar bg-blue" role="progressbar" aria-valuenow="<?php echo round(($repo[6] * 100) / $total, 1); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round(($repo[6] * 100) / $total, 1); ?>%;">
            </div>
        </div>
    </div>
    <div class="w_right w_20">
        <span><?php echo $repo[6] ?></span>
    </div>
    <div class="clearfix"></div>
</div>

<div class="widget_summary">
    <div class="w_left w_25">
        <span>Con Calle</span>
    </div>
    <div class="w_center w_55">
        <div class="progress">
            <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="<?php echo round(($repo[7] * 100) / $total, 1); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round(($repo[7] * 100) / $total, 1); ?>%;">
            </div>
        </div>
    </div>
    <div class="w_right w_20">
        <span><?php echo $repo[7] ?></span>
    </div>
    <div class="clearfix"></div>
</div>

<div class="widget_summary">
    <div class="w_left w_25">
        <span>Con Avenida</span>
    </div>
    <div class="w_center w_55">
        <div class="progress">
            <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="<?php echo round(($repo[8] * 100) / $total, 1); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round(($repo[8] * 100) / $total, 1); ?>%;">
            </div>
        </div>
    </div>
    <div class="w_right w_20">
        <span><?php echo $repo[8] ?></span>
    </div>
    <div class="clearfix"></div>
</div>
