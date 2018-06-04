<?php

/**
 * Description of UbicacionFuenteDAO
 *
 * @author ram
 */
class UbicacionFuenteDAO {

    private $dbc;

    function __construct() {
        $this->dbc = new Conexion();
    }

    function selectUbicacionFuente($id) {
        $con = $this->dbc->conectar();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return NULL;
        }
        $query = $con->prepare("SELECT * FROM ubicacionfuente WHERE idubicacionfuente=:id");
        $query->bindParam(":id", $id);
        $query->execute();
        $con = NULL;
        $row = $query->fetch();
        //Si la referencia no fue encontrada
        if (!$row) {
            error_log("error");
            return NULL;
        }
        $ufuente = new UbicacionFuente($row[0]);
        $ufuente->setNombre($row[1]);
        $ufuente->setLat($row[2]);
        $ufuente->setLng($row[3]);
        return $ufuente;
    }

    function selectAllFuentes() {
        $ufuentes = array();
        $con = $this->dbc->conectar();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return NULL;
        }
        $query = $con->prepare("SELECT * FROM ubicacionfuente order by idubicacionfuente desc");
        $query->execute();
        $con = NULL;
        while ($row = $query->fetch()) {
            $ufuente = new UbicacionFuente($row[0]);
            $ufuente->setNombre($row[1]);
            $ufuente->setLat($row[2]);
            $ufuente->setLng($row[3]);
            array_push($ufuentes, $ufuente);
        }
        return $ufuentes;
    }

}
