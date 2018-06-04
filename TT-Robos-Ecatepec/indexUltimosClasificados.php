<?php
include_once './Model/Conexion.php';
include_once './Model/ReporteRobo.php';
include_once './Model/ReporteRoboDAO.php';
include_once './Model/Publicacion.php';
include_once './Model/PublicacionDAO.php';
include_once './Model/FuenteInformacion.php';
include_once './Model/FuenteInformacionDAO.php';
$rrdao = new ReporteRoboDAO();
$reporte = new ReporteRobo();
$pdao = new PublicacionDAO();
$publicacion = new Publicacion();
$reportes = $rrdao->selectIndexReporteRobo();
?>

                        <?php
                        foreach ($reportes as $reporte) {
                            $publicacion = $pdao->selectPublicacionForReporte($reporte->getPublicacion());
                            ?>

                            <li>
                                <div class="block">
                                    <div class="block_content">
                                        <div class="byline">
                                            <span><?php echo $publicacion->getFecha() ?></span> en <a><?php echo $publicacion->getFuenteInformacion()->getNombre() ?></a>
                                        </div>
                                        <p class="excerpt"><?php echo $publicacion->getPublicacion() ?> <br>
                                            <a href="#" class="openModalReporte orange" id-reporte="<?php echo $reporte->getIdReporteRobo() ?>">Detalles...</a>
                                        </p>
                                    </div>
                                </div>
                            </li>

                            <?php
                        }
                        ?>

