<?php

/**
 * Description of Estado
 *
 * @author Ram
 */
class Estado {

    private $idEstado;
    private $nombre;

    function __construct($idEstado, $nombre) {
        $this->idEstado = $idEstado;
        $this->nombre = $nombre;
    }

    function getIdEstado() {
        return $this->idEstado;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setIdEstado($idEstado) {
        $this->idEstado = $idEstado;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

}
