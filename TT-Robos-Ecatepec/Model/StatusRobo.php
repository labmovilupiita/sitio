<?php

/**
 * Description of StatusRobo
 *
 * @author Ram
 */
class StatusRobo {

    private $idStatusRobo;
    private $nombre;

    function __construct($idStatusRobo, $nombre) {
        $this->idStatusRobo = $idStatusRobo;
        $this->nombre = $nombre;
    }

    function getIdStatusRobo() {
        return $this->idStatusRobo;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setIdStatusRobo($idStatusRobo) {
        $this->idStatusRobo = $idStatusRobo;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

}
