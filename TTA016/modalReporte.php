<?php
include_once './Model/Conexion.php';
include_once './Model/ReporteRobo.php';
include_once './Model/ReporteRoboDAO.php';
include_once './Model/Publicacion.php';
include_once './Model/PublicacionDAO.php';
include_once './Model/FuenteInformacion.php';
include_once './Model/FuenteInformacionDAO.php';
include_once './Model/Ubicacion.php';
include_once './Model/UbicacionDAO.php';
include_once './Model/AtributoCaracteristica.php';
include_once './Model/AtributoCaracteristicaDAO.php';
$rrdao = new ReporteRoboDAO();
$reporte = new ReporteRobo();
$pdao = new PublicacionDAO();
$publicacion = new Publicacion();
$acsdao = new AtributoCaracteristicaDAO();
$ac = new AtributoCaracteristica();
$ubicacion = new Ubicacion();
$reporte = $rrdao->selectReporteRobo($_POST["id"]);
$publicacion = $reporte->getPublicacion();
$ubicacion = $reporte->getUbicacion();

$acs = $acsdao->getAtributoCaracteristicas($_POST["id"]);
?>

<div class="modal fade modal_reporte" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Reporte de Robo</h4>
            </div>
            <div class="modal-body">

                <p><?php echo $publicacion->getPublicacion() ?></p>
                <div class="divider"></div>
                <?php
                if (!is_null($ubicacion)) {
                    ?>

                    <p>Ubicacion:
                        <br>
                        <?php echo $ubicacion->getDireccion() ?>
                    </p>
                    <div class="divider"></div>

                    <?php
                }
                ?>
                <?php
                if (count($acs)) {
                    ?>

                    <p>Caracteristicas Encontradas:
                        <br>
                        <?php
                        foreach ($acs as $ac) {
                            echo $ac->getCaracteristica() . " - " . $ac->getAtributo();
                            ?>
                            <br>
                            <?php
                        }
                        ?>
                    </p>
                    <div class="divider"></div>

                    <?php
                }
                ?>

                <div class="row">
                    <div class="col-md-6 center-align"><i class="fa fa-thumbs-up"></i> <?php echo $publicacion->getLikes() ?></div>
                    <div class="col-md-6 center-align"><i class="fa fa-share" aria-hidden="true"></i> <?php echo $publicacion->getShares() ?></div>
                </div>
                <div class="divider"></div>

                <?php
                switch ($reporte->getClase()) {
                    case 4: {
                            echo '<div class="alert alert-danger" role="alert">Violencia </div>';
                            break;
                        }
                    case 5: {
                            echo '<div class="alert alert-warning" role="alert">Sin Violencia</div>';
                            break;
                        }
                    case 6: {
                            echo '<div class="alert alert-info" role="alert">No Especificado</div>';
                            break;
                        }
                }
                ?>
               

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    
</div><!-- /.modal -->