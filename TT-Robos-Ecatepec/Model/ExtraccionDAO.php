<?php

/**
 * Description of ExtraccionDAO
 *
 * @author Ram
 */
class ExtraccionDAO {

    private $dbc;

    function __construct() {
        $this->dbc = new Conexion();
    }

    function insertExtraccion($extraccion) {
        $con = $this->dbc->conectar();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return 0;
        } else {
            $sql = "INSERT INTO extraccion (idextraccion, hora, diasRestantes, idfuenteInformacion, idtiempo) VALUES (?, ?, ?, ?, ?);";
            $query = $con->prepare($sql);
            $success = $query->execute(array(
                $extraccion->getIdExtraccion(),
                $extraccion->getHora(),
                $extraccion->getDiasRestantes(),
                $extraccion->getFuenteInformacion(),
                $extraccion->getTiempo()
            ));
            $con = NULL;
            if ($success) {
                return 1;
            } else {
                return 0;
            }
        }
    }

    function editFuente($fuente) {
        $con = $this->dbc->conectar();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return 0;
        } else {
            $success = $sql = "UPDATE fuenteinformacion SET facebookId=?, nombre=?, hashtag=? WHERE idfuenteInformacion=?;";
            $query = $con->prepare($sql);
            $query->execute(array(
                $fuente->getFacebookId(),
                $fuente->getNombre(),
                $fuente->getHashtag(),
                $fuente->getIdFuenteInformacion()
            ));
            $con = NULL;
            if ($success) {
                return 1;
            } else {
                return 0;
            }
        }
    }

    function deleteExtraccion($idExtraccion) {
        $con = $this->dbc->conectar();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return 0;
        }
        $delete = $con->prepare("DELETE FROM extraccion WHERE idextraccion=:id");
        $delete->bindParam(":id", $idExtraccion);
        $delete->execute();
        $con = NULL;
        return 1;
    }

    function selectExtraccion($id) {
        $con = $this->dbc->conectar();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return NULL;
        }
        $query = $con->prepare("SELECT * FROM extraccion where idextraccion=:id");
        $query->bindParam(":id", $id);
        $query->execute();
        $con = NULL;
        $row = $query->fetch();
        $fidao = new FuenteInformacionDAO();
        $tdao = new TiempoDAO();

        $extraccion = new Extraccion($row[0]);
        $extraccion->setHora($row[1]);
        $extraccion->setDiasRestantes($row[2]);
        $extraccion->setFuenteInformacion($fidao->selectFuente($row[3]));
        $extraccion->setTiempo($tdao->selectTiempo($row[4]));

        return $extraccion;
    }

    function selectAllExtracciones() {
        $extracciones = array();
        $con = $this->dbc->conectar();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return NULL;
        }
        $query = $con->prepare("SELECT * FROM extraccion");
        $query->execute();
        $con = NULL;
        $fidao = new FuenteInformacionDAO();
        $tdao = new TiempoDAO();
        while ($row = $query->fetch()) {
            $extraccion = new Extraccion($row[0]);
            $extraccion->setHora($row[1]);
            $extraccion->setDiasRestantes($row[2]);
            $extraccion->setFuenteInformacion($fidao->selectFuente($row[3]));
            $extraccion->setTiempo($tdao->selectTiempo($row[4]));
            array_push($extracciones, $extraccion);
        }
        return $extracciones;
    }

}
