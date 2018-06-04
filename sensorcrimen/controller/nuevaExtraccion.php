<?php
include_once './Model/Conexion.php';
include_once './Model/TiempoDAO.php';
include_once './Model/Tiempo.php';
include_once './Model/UbicacionFuente.php';
include_once './Model/UbicacionFuenteDAO.php';
include_once './Model/FuenteInformacionDAO.php';
include_once './Model/FuenteInformacion.php';
$tdao = new TiempoDAO();
$tiempos = $tdao->selectAllTiempos();
$fidao = new FuenteInformacionDAO();
$fuentes = $fidao->selectAllFuentes();
$fuente = new FuenteInformacion();
?>
<div class="card-content">
    <span class="card-title">Programar Extracción</span>
    <p>Programa una <strong>extracción</strong> de una fuente registrada.</p>
    <div class="row pt-30">
        <div class="input-field col s12 m6">
            <select class="browser-default" id="fuente_extraccion">
                <option value="" disabled selected>Fuente de Extracción</option>
                <?php foreach ($fuentes as $fuente) { ?>
                    <option value="<?php echo $fuente->getIdFuenteInformacion(); ?>" fib="<?php echo $fuente->getFacebookId(); ?>" hash="<?php echo $fuente->getHashtag() ?>"><?php echo $fuente->getNombre() ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="input-field col s6 m3">
            <select class="browser-default" id="tiempo_extraccion">
                <option value="" disabled selected>Rango de Tiempo</option>
                <?php foreach ($tiempos as $tiempo) { ?>
                    <option value="<?php echo $tiempo->getIdTiempo() ?>"><?php echo $tiempo->getNombre() ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="input-field col s6 m3">
            <div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                <input type="text" class="form-control" id="hora_extraccion" value="12:00">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </span>
            </div>
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