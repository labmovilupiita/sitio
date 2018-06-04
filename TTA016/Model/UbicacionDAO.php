<?php

/**
 * @author ram
 */
class UbicacionDAO {

    private $dbc;

    function __construct() {
        $this->dbc = new Conexion();
    }

    function editUbicacion($ubicacion) {
        $con = $this->dbc->conectar();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return 0;
        } else {
            $success = $sql = "UPDATE ubicacion SET direccion=?, latitud=?, longitud=?, ubicado=? WHERE idubicacion=?;";
            $query = $con->prepare($sql);
            $query->execute(array(
                $ubicacion->getDireccion(),
                $ubicacion->getLatitud(),
                $ubicacion->getLongitud(),
                $ubicacion->getUbicado(),
                $ubicacion->getIdUbucacion()
            ));
            $con = NULL;
            if ($success) {
                return 1;
            } else {
                return 0;
            }
        }
    }

    function selectUbicacion($id) {
        $con = $this->dbc->conectar();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return NULL;
        }
        $ubicacion = null;
        $query = $con->prepare("SELECT * FROM ubicacion where idubicacion=:id and ubicado=1");
        $query->bindParam(":id", $id);
        $query->execute();
        $con = NULL;
        if ($query->rowCount()) {
            $row = $query->fetch();
            $ubicacion = new Ubicacion($row[0]);
            $ubicacion->setDireccion($row[2]);
            $ubicacion->setLatitud($row[3]);
            $ubicacion->setLongitud($row[4]);
            $ubicacion->setUbicado($row[5]);
        }


        return $ubicacion;
    }

    function selectUbicacionesUbicadas() {
        $ubicaciones = array();
        $con = $this->dbc->conectar();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return NULL;
        }
        $query = $con->prepare("SELECT * FROM ubicacion where ubicado=1");
        $query->execute();
        $con = NULL;
        while ($row = $query->fetch()) {
            $ubicacion = new Ubicacion($row[0]);
            $ubicacion->setDireccion($row[2]);
            $ubicacion->setLatitud($row[3]);
            $ubicacion->setLongitud($row[4]);
            $ubicacion->setUbicado($row[5]);
            array_push($ubicaciones, $ubicacion);
        }
        return $ubicaciones;
    }

    function selectIdUbicacionesUbicadas($limit = 25) {
        $ubicaciones = array();
        $con = $this->dbc->conectar();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return NULL;
        }
        $query = $con->prepare("SELECT idubicacion FROM ubicacion where ubicado=1 order by idubicacion desc limit " . $limit);
        $query->execute();
        $con = NULL;
        while ($row = $query->fetch()) {
            $ubicacion = new Ubicacion($row[0]);
            array_push($ubicaciones, $ubicacion);
        }
        return $ubicaciones;
    }

    function selectUbicacionesNoUbicadas() {
        $ubicaciones = array();
        $con = $this->dbc->conectar();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return NULL;
        }
        $query = $con->prepare("SELECT * FROM ubicacion where ubicado=0");
        $query->execute();
        $con = NULL;

        while ($row = $query->fetch()) {
            $ubicacion = new Ubicacion($row[0]);
            $ubicacion->setDireccion(utf8_decode($row[1]));
            $ubicacion->setLatitud($row[3]);
            $ubicacion->setLongitud($row[4]);
            $ubicacion->setUbicado($row[5]);
            array_push($ubicaciones, $ubicacion);
        }
        return $ubicaciones;
    }

}
