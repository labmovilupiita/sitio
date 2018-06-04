<?php

/**
 * Description of ReporteRobo
 *
 * @author Ram
 */
class ReporteRobo {

    private $idReporteRobo;
    private $fechaCreacion;
    private $detalle;
    private $lematizado;
    private $ubicacion;
    private $publicacion;
    private $clase;

    function __construct($idReporteRobo = null, $fechaCreacion = null, $detalle = null, $lematizado = null, $ubicacion = null, $publicacion = null, $clase = null) {
        $this->idReporteRobo = $idReporteRobo;
        $this->fechaCreacion = $fechaCreacion;
        $this->detalle = $detalle;
        $this->lematizado = $lematizado;
        $this->ubicacion = $ubicacion;
        $this->publicacion = $publicacion;
        $this->clase = $clase;
    }

    function getIdReporteRobo() {
        return $this->idReporteRobo;
    }

    function getFechaCreacion() {
        return $this->fechaCreacion;
    }

    function getDetalle() {
        return $this->detalle;
    }

    function getLematizado() {
        return $this->lematizado;
    }

    function getUbicacion() {
        return $this->ubicacion;
    }

    function getPublicacion() {
        return $this->publicacion;
    }

    function getClase() {
        return $this->clase;
    }

    function setIdReporteRobo($idReporteRobo) {
        $this->idReporteRobo = $idReporteRobo;
    }

    function setFechaCreacion($fechaCreacion) {
        $this->fechaCreacion = $fechaCreacion;
    }

    function setDetalle($detalle) {
        $this->detalle = $detalle;
    }

    function setLematizado($lematizado) {
        $this->lematizado = $lematizado;
    }

    function setUbicacion($ubicacion) {
        $this->ubicacion = $ubicacion;
    }

    function setPublicacion($publicacion) {
        $this->publicacion = $publicacion;
    }

    function setClase($clase) {
        $this->clase = $clase;
    }

}
