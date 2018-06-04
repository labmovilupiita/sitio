<?php

/**
 * Description of Reporteador
 *
 * @author Ram
 */
class Reporteador {

    private $idreporte;
    private $totalMuestras;
    private $muestrasDescartadas;
    private $muestrasUtiles;
    private $muestrasNoEspecificadas;
    private $muestrasClasificadas;
    private $muestrasViolencia;
    private $muestrasSinViolencia;
    private $muestrasSinLocalizacion;
    private $muestrasConLocalizacion;
    private $muestrasCP;
    private $muestrasAvenida;
    private $muestrasCalle;
    private $muestrasColonia;
    private $conocimiento;
    private $fecha;

    function __construct($idreporte = null, $totalMuestras = null, $muestrasDescartadas = null, $muestrasUtiles = null, $muestrasNoEspecificadas = null, $muestrasClasificadas = null, $muestrasViolencia = null, $muestrasSinViolencia = null, $muestrasSinLocalizacion = null, $muestrasConLocalizacion = null, $muestrasCP = null, $muestrasAvenida = null, $muestrasCalle = null, $muestrasColonia = null, $conocimiento = null, $fecha = null) {
        $this->idreporte = $idreporte;
        $this->totalMuestras = $totalMuestras;
        $this->muestrasDescartadas = $muestrasDescartadas;
        $this->muestrasUtiles = $muestrasUtiles;
        $this->muestrasNoEspecificadas = $muestrasNoEspecificadas;
        $this->muestrasClasificadas = $muestrasClasificadas;
        $this->muestrasViolencia = $muestrasViolencia;
        $this->muestrasSinViolencia = $muestrasSinViolencia;
        $this->muestrasSinLocalizacion = $muestrasSinLocalizacion;
        $this->muestrasConLocalizacion = $muestrasConLocalizacion;
        $this->muestrasCP = $muestrasCP;
        $this->muestrasAvenida = $muestrasAvenida;
        $this->muestrasCalle = $muestrasCalle;
        $this->muestrasColonia = $muestrasColonia;
        $this->conocimiento = $conocimiento;
        $this->fecha = $fecha;
    }

    function getIdreporte() {
        return $this->idreporte;
    }

    function getTotalMuestras() {
        return $this->totalMuestras;
    }

    function getMuestrasDescartadas() {
        return $this->muestrasDescartadas;
    }

    function getMuestrasUtiles() {
        return $this->muestrasUtiles;
    }

    function getMuestrasNoEspecificadas() {
        return $this->muestrasNoEspecificadas;
    }

    function getMuestrasClasificadas() {
        return $this->muestrasClasificadas;
    }

    function getMuestrasViolencia() {
        return $this->muestrasViolencia;
    }

    function getMuestrasSinViolencia() {
        return $this->muestrasSinViolencia;
    }

    function getMuestrasSinLocalizacion() {
        return $this->muestrasSinLocalizacion;
    }

    function getMuestrasConLocalizacion() {
        return $this->muestrasConLocalizacion;
    }

    function getMuestrasCP() {
        return $this->muestrasCP;
    }

    function getMuestrasAvenida() {
        return $this->muestrasAvenida;
    }

    function getMuestrasCalle() {
        return $this->muestrasCalle;
    }

    function getMuestrasColonia() {
        return $this->muestrasColonia;
    }

    function getConocimiento() {
        return $this->conocimiento;
    }

    function getFecha() {
        return $this->fecha;
    }

    function setIdreporte($idreporte) {
        $this->idreporte = $idreporte;
    }

    function setTotalMuestras($totalMuestras) {
        $this->totalMuestras = $totalMuestras;
    }

    function setMuestrasDescartadas($muestrasDescartadas) {
        $this->muestrasDescartadas = $muestrasDescartadas;
    }

    function setMuestrasUtiles($muestrasUtiles) {
        $this->muestrasUtiles = $muestrasUtiles;
    }

    function setMuestrasNoEspecificadas($muestrasNoEspecificadas) {
        $this->muestrasNoEspecificadas = $muestrasNoEspecificadas;
    }

    function setMuestrasClasificadas($muestrasClasificadas) {
        $this->muestrasClasificadas = $muestrasClasificadas;
    }

    function setMuestrasViolencia($muestrasViolencia) {
        $this->muestrasViolencia = $muestrasViolencia;
    }

    function setMuestrasSinViolencia($muestrasSinViolencia) {
        $this->muestrasSinViolencia = $muestrasSinViolencia;
    }

    function setMuestrasSinLocalizacion($muestrasSinLocalizacion) {
        $this->muestrasSinLocalizacion = $muestrasSinLocalizacion;
    }

    function setMuestrasConLocalizacion($muestrasConLocalizacion) {
        $this->muestrasConLocalizacion = $muestrasConLocalizacion;
    }

    function setMuestrasCP($muestrasCP) {
        $this->muestrasCP = $muestrasCP;
    }

    function setMuestrasAvenida($muestrasAvenida) {
        $this->muestrasAvenida = $muestrasAvenida;
    }

    function setMuestrasCalle($muestrasCalle) {
        $this->muestrasCalle = $muestrasCalle;
    }

    function setMuestrasColonia($muestrasColonia) {
        $this->muestrasColonia = $muestrasColonia;
    }

    function setConocimiento($conocimiento) {
        $this->conocimiento = $conocimiento;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

}
