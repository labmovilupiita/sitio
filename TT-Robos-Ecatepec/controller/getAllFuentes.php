<?php
include_once './Model/Conexion.php';
include_once './Model/FuenteInformacion.php';
include_once './Model/FuenteInformacionDAO.php';
include_once './Model/UbicacionFuente.php';
include_once './Model/UbicacionFuenteDAO.php';
$fidao = new FuenteInformacionDAO();
$fuentes = $fidao->selectAllFuentes();
?>
<table id="" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width: 40%;">Nombre</th>
            <th style="width: 20%;">Fid</th>
            <th style="width: 12%;">Hashtag</th>
            <th style="width: 12%;">Municipio</th>
            <th style="width: 8%;">Editar</th>
            <th style="width: 8%;">Eliminar</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Nombre</th>
            <th>Fid</th>
            <th>Hashtag</th>
            <th>Editar</th>
             <th>Eliminar</th>
        </tr>
    </tfoot>
    <tbody>
        <?php
        $fuente = new FuenteInformacion();
        foreach ($fuentes as $fuente) {
            ?>
            <tr>
                <td><?php echo $fuente->getNombre() ?></td>
                <td><?php echo $fuente->getFacebookId() ?></td>
                <td><?php echo $fuente->getHashtag() ?></td>
                <td><?php echo $fuente->getUbicacionFuente()->getNombre() ?></td>
                <td class="center"><a href="fuente.php?id=<?php echo $fuente->getIdFuenteInformacion() ?>" class="waves-effect waves-light btn list red"><i class="material-icons center">mode_edit</i></a></td>
                <td class="center"><a id-fuente="<?php echo $fuente->getIdFuenteInformacion() ?>" class="waves-effect waves-light btn list red delete-fuente"><i class="material-icons">delete_forever</i></a></td>
            </tr>
        <?php } ?>

    </tbody>
</table>