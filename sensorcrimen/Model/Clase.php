<?php

/**
 * Description of Clase
 *
 * @author Ram
 */
class Clase {

    private $idClase;
    private $nombre;

    function __construct($idClase, $nombre) {
        $this->idClase = $idClase;
        $this->nombre = $nombre;
    }

    function getIdClase() {
        return $this->idClase;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setIdClase($idClase) {
        $this->idClase = $idClase;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

}
