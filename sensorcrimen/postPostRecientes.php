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
$reportes = $rrdao->selectPostReporteRobo($_POST["page"]);
?>


<?php
foreach ($reportes as $reporte) {
    $publicacion = $pdao->selectPublicacionForReporte($reporte->getPublicacion());
    ?>
    <li>
        <div class="block">
            <div class="tags">
                <?php
                switch ($reporte->getClase()) {
                    case 4: {
                            echo '<a href="" class="tag bg-red"><span>Violencia</span></a>';
                            break;
                        }
                    case 6: {
                            echo '<a href="" class="tag bg-orange"><span>Sin Violencia</span></a>';
                            break;
                        }
                    case 5: {
                            echo '<a href="" class="tag"><span>No Especificado</span></a>';
                            break;
                        }
                }
                ?>
            </div>
            <div class="block_content">

                <p class="excerpt"><?php echo $publicacion->getPublicacion() ?> <br>
                    <a href="#" class="openModalReporte orange" id-reporte="<?php echo $reporte->getIdReporteRobo() ?>">Detalles...</a>
                </p>
                <div class="byline">
                    <span><?php echo $publicacion->getFecha() ?></span> en <a><?php echo $publicacion->getFuenteInformacion()->getNombre(); ?></a>
                </div>
            </div>
        </div>
    </li>
    <?php
}
?>

