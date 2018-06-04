<?php

/**
 * Description of PublicacionDAO
 *
 * @author ram
 */
class PublicacionDAO {

    private $dbc;

    function __construct() {
        $this->dbc = new Conexion();
    }

    function insertPublicacion($publicacion) {
        $con = $this->dbc->conectar();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            error_log("no conectado");
            return 0;
        } else {
			/*
            $sql = "INSERT INTO publicacion (idpublicacion, publicacion, fecha, hora, procesado, likes, shares, idfuenteinformacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
            $query = $con->prepare($sql);
            $success = $query->execute(array(
                $publicacion->getIdPublicacion(),
                $publicacion->getPublicacion(),
                $publicacion->getFecha(),
                $publicacion->getHora(),
                $publicacion->getProcesado(),
                $publicacion->getLikes(),
                $publicacion->getShares(),
                $publicacion->getFuenteInformacion()
            ));
			*/
            $con = NULL;

            if ($success) {
                return 1;
            } else {
                return 0;
            }
        }
    }

    function selectPublicacion($id) {
        $publicacion = null;
        $con = $this->dbc->conectar();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return NULL;
        }
        $query = $con->prepare("SELECT * FROM publicacion where idpublicacion=:id");
        $query->bindParam(":id", $id);
        $query->execute();
        $con = NULL;

        if ($query->rowCount()) {
            $row = $query->fetch();
            $fidao = new FuenteInformacionDAO();
            $publicacion = new Publicacion($row[0]);
            $publicacion->setPublicacion($row[1]);
            $publicacion->setFecha($row[2]);
            $publicacion->setHora($row[3]);
            $publicacion->setProcesado($row[4]);
            $publicacion->setLikes($row[5]);
            $publicacion->setShares($row[6]);
            $publicacion->setFuenteInformacion($fidao->selectFuente($row[7]));
        }
        return $publicacion;
    }

    function selectAllPublicaciones() {
        $publicaciones = array();
        $con = $this->dbc->conectar();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return NULL;
        }
        $query = $con->prepare("SELECT * FROM publicacion");
        $query->execute();
        $con = NULL;
        $fidao = new FuenteInformacionDAO();
        while ($row = $query->fetch()) {
            $publicacion = new Publicacion($row[0]);
            $publicacion->setPublicacion($row[1]);
            $fecha = explode("-", $row[2]);
            $publicacion->setFecha($fecha[2] . " / " . $fecha[1] . " / " . $fecha[0]);
            $publicacion->setHora($row[3]);
            $publicacion->setProcesado($row[4]);
            $publicacion->setLikes($row[5]);
            $publicacion->setShares($row[6]);
            $publicacion->setFuenteInformacion($fidao->selectFuente($row[7]));
            array_push($publicaciones, $publicacion);
        }
        return $publicaciones;
    }

    function selectPublicacionesPage($num, $page) {
        $page = $page - 1;
        $publicaciones = array();
        $con = $this->dbc->conectar();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return NULL;
        }
        $query = $con->prepare("SELECT * FROM publicacion order by fecha desc LIMIT " . $num . " OFFSET " . $num * $page);
        $query->execute();
        $con = NULL;
        $fidao = new FuenteInformacionDAO();
        while ($row = $query->fetch()) {
            $publicacion = new Publicacion($row[0]);
            $publicacion->setPublicacion($row[1]);
            $fecha = explode("-", $row[2]);
            $publicacion->setFecha($fecha[2] . " / " . $fecha[1] . " / " . $fecha[0]);
            $publicacion->setHora($row[3]);
            $publicacion->setProcesado($row[4]);
            $publicacion->setLikes($row[5]);
            $publicacion->setShares($row[6]);
            $publicacion->setFuenteInformacion($fidao->selectFuente($row[7]));
            array_push($publicaciones, $publicacion);
        }
        return $publicaciones;
    }

    function total() {
        $con = $this->dbc->conectar();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return NULL;
        }
        $query = $con->prepare("SELECT count(idpublicacion) as total from publicacion");
        $query->execute();
        $con = NULL;
        $row = $query->fetch();
        return $row['total'];
    }

    function selectPublicacionForReporte($id) {
        $publicacion = null;
        $con = $this->dbc->conectar();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return NULL;
        }
        $query = $con->prepare("SELECT * FROM publicacion where idpublicacion=:id");
        $query->bindParam(":id", $id);
        $query->execute();
        $con = NULL;

        if ($query->rowCount()) {
            $row = $query->fetch();
            $fidao = new FuenteInformacionDAO();
            $publicacion = new Publicacion($row[0]);
            $publicacion->setPublicacion($row[1]);
            $publicacion->setFecha($row[2]);
            $publicacion->setHora($row[3]);
            $publicacion->setProcesado($row[4]);
            $publicacion->setLikes($row[5]);
            $publicacion->setShares($row[6]);
            $publicacion->setFuenteInformacion($fidao->selectFuenteForReporte($row[7]));
        }
        return $publicacion;
    }

    function totalFecha($fecha) {
        $con = $this->dbc->conectar();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return NULL;
        }
        $query = $con->prepare("SELECT count(idpublicacion) as total from publicacion where fecha = '" . $fecha . "'");
        $query->execute();
        $con = NULL;
        $row = $query->fetch();
        return $row['total'];
    }

}
