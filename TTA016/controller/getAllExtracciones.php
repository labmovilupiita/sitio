<?php
include_once './Model/Conexion.php';
include_once './Model/UbicacionFuente.php';
include_once './Model/UbicacionFuenteDAO.php';
include_once './Model/FuenteInformacion.php';
include_once './Model/FuenteInformacionDAO.php';
include_once './Model/Tiempo.php';
include_once './Model/TiempoDAO.php';
include_once './Model/Extraccion.php';
include_once './Model/ExtraccionDAO.php';
$exdao = new ExtraccionDAO();
$extracciones = $exdao->selectAllExtracciones();
?>

<table id="" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Fuente</th>
            <th>Hashtag</th>
            <th>Tiempo</th>
            <th>Hora</th>
            <th>Editar</th>
            <th>Borrar</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Fuente</th>
            <th>Hashtag</th>
            <th>Tiempo</th>
            <th>Hora</th>
            <th>Editar</th>
            <th>Borrar</th>
        </tr>
    </tfoot>
    <tbody>
        <?php
        foreach ($extracciones as $extraccion) {
            $fuente = $extraccion->getFuenteInformacion();
            $tiempo=$extraccion->getTiempo();
            ?>
            <tr>
                <td><?php echo $fuente->getNombre() ?></td>
                <td><?php echo $fuente->getHashtag() ?></td>
                <th><?php echo $tiempo->getNombre() ?></th>
                <th><?php echo $extraccion->getHora() ?></th>
                <td><a href="extraccion.php?id=<?php echo $extraccion->getIdExtraccion(); ?>"  class="waves-effect waves-light btn list red"><i class="material-icons center">mode_edit</i></a></td>
                <td><a class="waves-effect waves-light btn list red delete-extraccion" id-extraccion="<?php echo $extraccion->getIdExtraccion(); ?>" ><i class="material-icons center">delete</i></a></td>
            </tr>
        <?php } ?>


    </tbody>
</table>