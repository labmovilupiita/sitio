<?php

/**
 * Description of TiempoDAO
 *
 * @author Ram
 */
class TiempoDAO {

    private $dbc;

    function __construct() {
        $this->dbc = new Conexion();
    }

    function selectAllTiempos() {
        $tiempos = array();
        $con = $this->dbc->conectar();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return NULL;
        }
        $query = $con->prepare("SELECT * FROM tiempo");
        $query->execute();
        $con = NULL;
        while ($row = $query->fetch()) {
            $tiempo = new Tiempo($row[0]);
            $tiempo->setNombre($row[1]);
            $tiempo->setDias($row[2]);
            array_push($tiempos, $tiempo);
        }
        return $tiempos;
    }

    function selectTiempo($id) {
        $con = $this->dbc->conectar();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return NULL;
        }
        $query = $con->prepare("SELECT * FROM tiempo where idtiempo=:id");
        $query->bindParam(":id", $id);
        $query->execute();
        $con = NULL;
        $row = $query->fetch();
        //Si la referencia no fue encontrada
        if (!$row) {
            return NULL;
        }
        $tiempo = new Tiempo($row[0]);
        $tiempo->setNombre($row[1]);
        $tiempo->setDias($row[2]);
        return $tiempo;
    }

}
