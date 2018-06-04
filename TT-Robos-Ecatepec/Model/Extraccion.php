<?php

/**
 * Description of Extraccion
 *
 * @author Ram
 */
class Extraccion {

    private $idExtraccion;
    private $hora;
    private $diasRestantes;
    private $fuenteInformacion;
    private $tiempo;

    function __construct($idExtraccion = null, $hora = null, $diasRestantes = null, $fuenteInformacion = null, $tiempo = null) {
        $this->idExtraccion = $idExtraccion;
        $this->hora = $hora;
        $this->diasRestantes = $diasRestantes;
        $this->fuenteInformacion = $fuenteInformacion;
        $this->tiempo = $tiempo;
    }

    function getIdExtraccion() {
        return $this->idExtraccion;
    }

    function getHora() {
        return $this->hora;
    }

    function getDiasRestantes() {
        return $this->diasRestantes;
    }

    function getFuenteInformacion() {
        return $this->fuenteInformacion;
    }

    function getTiempo() {
        return $this->tiempo;
    }

    function setIdExtraccion($idExtraccion) {
        $this->idExtraccion = $idExtraccion;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

    function setDiasRestantes($diasRestantes) {
        $this->diasRestantes = $diasRestantes;
    }

    function setFuenteInformacion($fuenteInformacion) {
        $this->fuenteInformacion = $fuenteInformacion;
    }

    function setTiempo($tiempo) {
        $this->tiempo = $tiempo;
    }

}
