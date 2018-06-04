<?php

/**
 * Description of FuenteInformacionDAO
 *
 * @author Ram & Aaron
 * 
 * @develop 17/02/2017
 */
class FuenteInformacionDAO {

    private $dbc;

    function __construct() {
        $this->dbc = new Conexion();
    }

    function insertFuente($fuente) {
        $con = $this->dbc->conectar();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return 0;
        } else {
            $sql = "INSERT INTO fuenteinformacion (idfuenteinformacion, facebookid, nombre, hashtag, idubicacionfuente) " . " VALUES(?,?,?,?,?)";
            $query = $con->prepare($sql);
            $success = $query->execute(array(
                $fuente->getIdFuenteInformacion(),
                $fuente->getFacebookId(),
                $fuente->getNombre(),
                $fuente->getHashtag(),
                $fuente->getUbicacionFuente()
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
            $success = $sql = "UPDATE fuenteinformacion SET facebookid=?, nombre=?, hashtag=?, idubicacionfuente=? WHERE idfuenteinformacion=?;";
            $query = $con->prepare($sql);
            $query->execute(array(
                $fuente->getFacebookId(),
                $fuente->getNombre(),
                $fuente->getHashtag(),
                $fuente->getUbicacionFuente(),
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

    function deleteFuente($idFuente) {
        $con = $this->dbc->conectar();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return 0;
        }
        $delete = $con->prepare("DELETE FROM extraccion WHERE idfuenteinformacion=:id");
        $delete->bindParam(":id", $idFuente);
        $delete->execute();
        $delete = $con->prepare("DELETE FROM fuenteinformacion WHERE idfuenteinformacion=:id");
        $delete->bindParam(":id", $idFuente);
        $delete->execute();
        $con = NULL;
        return 1;
    }

    function selectFuente($id) {
        $con = $this->dbc->conectar();
        $ufuentedao = new UbicacionFuenteDAO();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return NULL;
        }
        $query = $con->prepare("SELECT * FROM fuenteinformacion WHERE idfuenteinformacion=:id");
        $query->bindParam(":id", $id);
        $query->execute();
        $con = NULL;
        $row = $query->fetch();
        //Si la referencia no fue encontrada
        if (!$row) {
            error_log("error");
            return NULL;
        }
        $fuente = new FuenteInformacion($row[0]);
        $fuente->setFacebookId($row[1]);
        $fuente->setNombre($row[2]);
        $fuente->setHashtag($row[3]);
        $fuente->setUbicacionFuente($ufuentedao->selectUbicacionFuente($row[4]));
        return $fuente;
    }

    function selectAllFuentes() {
        $fuentes = array();
        $con = $this->dbc->conectar();
        $ufuentedao = new UbicacionFuenteDAO();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return NULL;
        }
        $query = $con->prepare("SELECT * FROM fuenteinformacion order by idfuenteinformacion desc");
        $query->execute();
        $con = NULL;
        while ($row = $query->fetch()) {
            $fuente = new FuenteInformacion($row[0]);
            $fuente->setFacebookId($row[1]);
            $fuente->setNombre($row[2]);
            $fuente->setHashtag($row[3]);
            $fuente->setUbicacionFuente($ufuentedao->selectUbicacionFuente($row[4]));
            array_push($fuentes, $fuente);
        }
        return $fuentes;
    }

    function selectFuenteForReporte($id) {
        $con = $this->dbc->conectar();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return NULL;
        }
        $query = $con->prepare("SELECT * FROM fuenteinformacion WHERE idfuenteinformacion=:id");
        $query->bindParam(":id", $id);
        $query->execute();
        $con = NULL;
        $row = $query->fetch();
        //Si la referencia no fue encontrada
        if (!$row) {
            error_log("error");
            return NULL;
        }
        $fuente = new FuenteInformacion($row[0]);
        $fuente->setFacebookId($row[1]);
        $fuente->setNombre($row[2]);
        $fuente->setHashtag($row[3]);
        $fuente->setUbicacionFuente($row[4]);
        return $fuente;
    }

}
