<?php
include_once '../Model/Conexion.php';
include_once '../Model/Publicacion.php';
include_once '../Model/PublicacionDAO.php';
include_once '../Model/FuenteInformacion.php';
include_once '../Model/FuenteInformacionDAO.php';
include_once '../Model/UbicacionFuente.php';
include_once '../Model/UbicacionFuenteDAO.php';
$page = filter_input(INPUT_POST, "page");
$pubdao = new PublicacionDAO();
$publis = $pubdao->selectPublicacionesPage(25, $page);
$totalPublis = $pubdao->total();
foreach ($publis as $pub) {
    ?>
    <div class="col s12 m12 l12" >
        <div class="card z-depth-2">
            <div class="card-content">
                <div class="row center bb-1">
                    <div class="col m6 s6 br-1 pb-15">
                        <?php echo $pub->getFecha() ?>
                    </div>
                    <div class="col m6 s6 pb-15">
                        <?php echo $pub->getHora() ?>
                    </div>
                </div>
                <div class="row center bb-1">
                    <div class="col m12 s12 pb-15">
                        <?php echo $pub->getPublicacion() ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php } ?>
<script>
    $('.total-post').text(<?php echo $totalPublis ?>)
</script>
