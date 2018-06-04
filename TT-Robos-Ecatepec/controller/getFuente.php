<?php
include_once 'Model/Conexion.php';
include_once 'Model/FuenteInformacion.php';
include_once 'Model/FuenteInformacionDAO.php';
include_once './Model/UbicacionFuente.php';
include_once './Model/UbicacionFuenteDAO.php';
$fidao = new FuenteInformacionDAO();
$fuente = $fidao->selectFuente(filter_input(INPUT_GET, "id"));
$ufuentesdao = new UbicacionFuenteDAO();
$ufuentes = $ufuentesdao->selectAllFuentes();
$ufuente = new UbicacionFuente();
?>

<div class="card-content">
    <span class="card-title">Fuente</span>
    <p>Pagina en facebook de la cual obtendremos los post de delitos.</p>
    <div class="row pt-30">
        <div class="input-field col s12 m6">
            <input placeholder="Nombre Pagina" value="<?php echo $fuente->getNombre() ?>" id="nombre_fuente" type="text" class="validate">
            <label for="nombre_fuente">Nombre Pagina</label>
        </div>
        <div class="input-field col s12 m6">
            <input placeholder="Fid Pagina" id="fid_fuente" value="<?php echo $fuente->getFacebookId() ?>" type="text" class="validate">
            <label for="fid_fuente">Fid Pagina</label>
        </div>

        <div class="input-field col s12 m6">
            <input placeholder="Hashtag" id="hashtag_fuente" value="<?php echo $fuente->getHashtag() ?>" type="text" class="validate">
            <label for="hashtag_fuente">Hashtag</label>
        </div>

        <div class="input-field col s12 m6">
            <select class="browser-default" id="ubicacionFuente">
                <option value="0" disabled selected>Ubicacion de Fuente</option>
                <?php foreach ($ufuentes as $ufuente) { ?>
                <option value="<?php echo $ufuente->getId() ?>" <?php if($ufuente->getId() == $fuente->getUbicacionFuente()->getId()){
                echo ' selected';}?>><?php echo $ufuente->getNombre() ?></option>
                }
                <?php } ?>
            </select>
        </div>


        <input  id="id_fuente" value="<?php echo $fuente->getIdFuenteInformacion() ?>" type="hidden">
    </div>
</div>