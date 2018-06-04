<?php

/*
 * @author Ram
 */
class ReporteadorDAO {
    
    private $dbc;

    function __construct() {
        $this->dbc = new Conexion();
    }
    
   function selectReporteById($id) {
        $reporte = null;
        $con = $this->dbc->conectar();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return NULL;
        }
        $query = $con->prepare("SELECT * FROM reporteador where idreporte=:id");
        $query->bindParam(":id", $id);
        $query->execute();
        $con = NULL;

        if ($query->rowCount()) {
            $row = $query->fetch();
            $reporte = new Reporteador($row[0]);
            $reporte->setTotalMuestras($row[1]);
            $reporte->setMuestrasDescartadas($row[2]);
            $reporte->setMuestrasUtiles($row[3]);
            $reporte->setMuestrasNoEspecificadas($row[4]);
            $reporte->setMuestrasClasificadas($row[5]);
            $reporte->setMuestrasViolencia($row[6]);
            $reporte->setMuestrasSinViolencia($row[7]);
            $reporte->setMuestrasSinLocalizacion($row[8]);
            $reporte->setMuestrasConLocalizacion($row[9]);
            $reporte->setMuestrasCP($row[10]);
            $reporte->setMuestrasAvenida($row[11]);
            $reporte->setMuestrasCalle($row[12]);
            $reporte->setMuestrasColonia($row[13]);
            $reporte->setFecha($row[16]);
        }
        return $reporte;
    }
    
    function selectReporteByFecha($fecha) {
        $reporte = null;
        $con = $this->dbc->conectar();
        //Si la conexion no fue exitosa
        if ($con == NULL) {
            return NULL;
        }
        $query = $con->prepare("SELECT * FROM reporteador where fecha=:fecha");
        $query->bindParam(":fecha", $fecha);
        $query->execute();
        $con = NULL;

        if ($query->rowCount()) {
            $row = $query->fetch();
            $reporte = new Reporteador($row[0]);
            $reporte->setTotalMuestras($row[1]);
            $reporte->setMuestrasDescartadas($row[2]);
            $reporte->setMuestrasUtiles($row[3]);
            $reporte->setMuestrasNoEspecificadas($row[4]);
            $reporte->setMuestrasClasificadas($row[5]);
            $reporte->setMuestrasViolencia($row[6]);
            $reporte->setMuestrasSinViolencia($row[7]);
            $reporte->setMuestrasSinLocalizacion($row[8]);
            $reporte->setMuestrasConLocalizacion($row[9]);
            $reporte->setMuestrasCP($row[10]);
            $reporte->setMuestrasAvenida($row[11]);
            $reporte->setMuestrasCalle($row[12]);
            $reporte->setMuestrasColonia($row[13]);
            $reporte->setFecha($row[16]);
        }
        return $reporte;
    }
}
