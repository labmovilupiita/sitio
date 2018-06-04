<?php

/**
 * Description of Tiempo
 *
 * @author Ram
 */
class Tiempo {

    private $idTiempo;
    private $nombre;
    private $dias;

    function __construct($idTiempo = null, $nombre = null, $dias = null) {
        $this->idTiempo = $idTiempo;
        $this->nombre = $nombre;
        $this->dias = $dias;
    }

    function getIdTiempo() {
        return $this->idTiempo;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDias() {
        return $this->dias;
    }

    function setIdTiempo($idTiempo) {
        $this->idTiempo = $idTiempo;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDias($dias) {
        $this->dias = $dias;
    }

}
