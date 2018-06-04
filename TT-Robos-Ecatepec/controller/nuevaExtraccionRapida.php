<?php
include_once './Model/Conexion.php';
include_once './Model/TiempoDAO.php';
include_once './Model/Tiempo.php';
include_once './Model/UbicacionFuente.php';
include_once './Model/UbicacionFuenteDAO.php';
include_once './Model/FuenteInformacionDAO.php';
include_once './Model/FuenteInformacion.php';
$fidao = new FuenteInformacionDAO();
$fuentes = $fidao->selectAllFuentes();
$fuente = new FuenteInformacion();
?>
<div class="card-content">
    <span class="card-title">Programar Extracción</span>
    <p>Programa una <strong>extracción</strong> de una fuente registrada.</p>
    <div class="row pt-30">
        <div class="input-field col s12 m12">
            <select class="browser-default" id="fuente_extraccion">
                <option value="0" disabled selected>Fuente de Extracción</option>
                <?php foreach ($fuentes as $fuente) { ?>
                    <option value="<?php echo $fuente->getIdFuenteInformacion(); ?>" fib="<?php echo $fuente->getFacebookId(); ?>" hash="<?php echo $fuente->getHashtag() ?>"><?php echo $fuente->getNombre() ?></option>
                <?php } ?>
            </select>
        </div>


        <div class="input-field col s12 m6">
            <input placeholder="Facbook id" disabled id="fid_fuente" type="text" class="validate black-text">
            <label for="fid_fuente">Facbook Id</label>
        </div>
        <div class="input-field col s12 m6">
            <input placeholder="Hashtag" disabled id="hash_fuente" type="text" class="validate black-text">
            <label for="hashtag_fuente">Hashtag</label>
        </div>
    </div>
</div>