<?php
include_once './Model/UbicacionFuente.php';
include_once './Model/UbicacionFuenteDAO.php';
include_once './Model/Conexion.php';
$ufuentesdao = new UbicacionFuenteDAO();
$ufuentes = $ufuentesdao->selectAllFuentes();
$ufuente = new UbicacionFuente();
?>
<div class="input-field col s12 m6">
    <select class="browser-default" id="ubicacionFuente">
        <option value="0" disabled selected>Ubicacion de Fuente</option>
        <?php foreach ($ufuentes as $ufuente) { ?>
            <option value="<?php echo $ufuente->getId() ?>"><?php echo $ufuente->getNombre() ?></option>
        <?php } ?>
    </select>
</div>
