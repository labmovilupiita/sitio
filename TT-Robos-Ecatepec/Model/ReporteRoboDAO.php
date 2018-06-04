<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ReporteRoboDAO
 *
 * @author ram
 */
class ReporteRoboDAO {

    private $dbc;

    function __construct() {
        $this->dbc = new Conexion();
    }

    function selectReporteRobo($id) {
        $reporte = null;
        $con = $this->dbc->conectar();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return NULL;
        }
        $query = $con->prepare("SELECT * FROM reporterobo where idreporteRobo=:id");
        $query->bindParam(":id", $id);
        $query->execute();
        $con = NULL;

        if ($query->rowCount()) {
            $row = $query->fetch();
            $udao = new UbicacionDAO();
            $pdao = new PublicacionDAO();
            $reporte = new ReporteRobo($row[0]);
            $reporte->setFechaCreacion($row[1]);
            $reporte->setDetalle($row[2]);
            $reporte->setLematizado($row[3]);
            $reporte->setUbicacion($udao->selectUbicacion($row[4]));
            $reporte->setPublicacion($pdao->selectPublicacionForReporte($row[5]));
            $reporte->setClase($row[6]);
        }
        return $reporte;
    }

    function selectAllReporteRobo() {
        $reportes = array();
        $con = $this->dbc->conectar();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return NULL;
        }
        $query = $con->prepare("SELECT * FROM reporterobo order by idreporteRobo desc");
        $query->execute();
        $con = NULL;
        $udao = new UbicacionDAO();
        $pdao = new PublicacionDAO();
        while ($row = $query->fetch()) {
            $reporte = new ReporteRobo($row[0]);
            $reporte->setFechaCreacion($row[1]);
            $reporte->setDetalle($row[2]);
            $reporte->setLematizado($row[3]);
            $reporte->setUbicacion($udao->selectUbicacion($row[4]));
            $reporte->setPublicacion($pdao->selectPublicacionForReporte($row[5]));
            $reporte->setClase("");
            array_push($reportes, $reporte);
        }
        return $reportes;
    }

    function selectReporteRoboByUbicacion($id) {
        $reporte = null;
        $con = $this->dbc->conectar();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return NULL;
        }
        $query = $con->prepare("SELECT * FROM reporterobo where idubicacion=:id ");
        $query->bindParam(":id", $id);
        $query->execute();
        $con = NULL;

        if ($query->rowCount()) {
            $row = $query->fetch();
            $udao = new UbicacionDAO();
            $pdao = new PublicacionDAO();
            $reporte = new ReporteRobo($row[0]);
            $reporte->setFechaCreacion($row[1]);
            $reporte->setDetalle($row[2]);
            $reporte->setLematizado($row[3]);
            $reporte->setUbicacion($udao->selectUbicacion($row[4]));
            $reporte->setPublicacion($pdao->selectPublicacionForReporte($row[5]));
            $reporte->setClase("");
        }
        return $reporte;
    }

    function selectIndexReporteRobo() {
        $reportes = array();
        $con = $this->dbc->conectar();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return NULL;
        }
        $query = $con->prepare("SELECT idreporteRobo, idpublicacion FROM reporterobo order by idreporteRobo desc limit 10");
        $query->execute();
        $con = NULL;
        while ($row = $query->fetch()) {
            $reporte = new ReporteRobo($row[0]);
            $reporte->setPublicacion($row[1]);
            array_push($reportes, $reporte);
        }
        return $reportes;
    }

    function total() {
        $con = $this->dbc->conectar();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return NULL;
        }
        $query = $con->prepare("SELECT count(idreporteRobo) as total from reporterobo");
        $query->execute();
        $con = NULL;
        $row = $query->fetch();
        return $row['total'];
    }

    function totalByClase($clase) {
        $con = $this->dbc->conectar();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return NULL;
        }
        switch ($clase) {
            case "violencia": {
                    $query = $con->prepare("SELECT count(idreporteRobo) as total from reporterobo where idclase=4");
                    break;
                }
            case "sviolencia": {
                    $query = $con->prepare("SELECT count(idreporteRobo) as total from reporterobo where idclase=6");
                    break;
                }
            case "neutro": {
                    $query = $con->prepare("SELECT count(idreporteRobo) as total from reporterobo where idclase=5");
                    break;
                }
            default : {
                    $query = $con->prepare("SELECT count(idreporteRobo) as total from reporterobo");
                    break;
                }
        }
        $query->execute();
        $con = NULL;
        $row = $query->fetch();
        return $row['total'];
    }

    function selectPostReporteRobo($page) {
        $page = $page - 1;
        $reportes = array();
        $con = $this->dbc->conectar();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return NULL;
        }
        $query = $con->prepare("SELECT idreporteRobo, idpublicacion, idclase FROM reporterobo order by idreporteRobo desc LIMIT 25 OFFSET " . 25 * $page);
        $query->execute();
        $con = NULL;
        while ($row = $query->fetch()) {
            $reporte = new ReporteRobo($row[0]);
            $reporte->setPublicacion($row[1]);
            $reporte->setClase($row[2]);
            array_push($reportes, $reporte);
        }
        return $reportes;
    }

    function selectPostReporteRoboByClase($page, $idclase) {
        $page = $page - 1;
        $reportes = array();
        $con = $this->dbc->conectar();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return NULL;
        }
        $query = $con->prepare("SELECT idreporteRobo, idpublicacion, idclase FROM reporterobo where idclase=" . $idclase . " order by idreporteRobo desc LIMIT 25 OFFSET " . 25 * $page);
        $query->execute();
        $con = NULL;
        while ($row = $query->fetch()) {
            $reporte = new ReporteRobo($row[0]);
            $reporte->setPublicacion($row[1]);
            $reporte->setClase($row[2]);
            array_push($reportes, $reporte);
        }
        return $reportes;
    }

    function getDiasReportes() {
        $dias = array();

        $con = $this->dbc->conectar();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return NULL;
        }
        $query = $con->prepare("SELECT dia as dia , count(*) as veces FROM publicacion JOIN reporterobo ON publicacion.idpublicacion=reporterobo.idpublicacion group by dia order by veces desc;");
        $query->execute();
        while ($row = $query->fetch()) {
            $dia = array($row[0], $row[1]);
            array_push($dias, $dia);
        }
        return $dias;
    }
    
    function getReporteador() {

        $con = $this->dbc->conectar();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return NULL;
        }
        $query = $con->prepare("SELECT sum(totalMuestras) as total , SUM(muestrasUtiles) AS utiles, sum(muestrasViolencias) as violencia, sum(muestrasSinViolencias) sviolencia, sum(muestrasNoEspecificadas) as nespecificadas, sum(muestrasConLocalizacion) as ubicados ,sum(muestrasColonia) as colonia, sum(muestrasCalle) as calle, sum(muestrasAvenida) as avenidas FROM reporteador;");
        $query->execute();
        return $query->fetch();
    }
   

}
