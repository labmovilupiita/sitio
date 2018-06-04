<?php

/**
 * Description of Municipio
 *
 * @author Ram
 */
class Municipio {

    private $idMunicipio;
    private $nombre;
    private $estado;

    function __construct($idMunicipio, $nombre, $estado = null) {
        $this->idMunicipio = $idMunicipio;
        $this->nombre = $nombre;
        $this->estado = $estado;
    }

    function getIdMunicipio() {
        return $this->idMunicipio;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getEstado() {
        return $this->estado;
    }

    function setIdMunicipio($idMunicipio) {
        $this->idMunicipio = $idMunicipio;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

}
