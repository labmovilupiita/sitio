<?php

/**
 * Description of Caracteristica
 *
 * @author Ram
 */
class Caracteristica {

    private $idCaracteristica;
    private $nombre;
    private $clase;

    function __construct($idCaracteristica, $nombre, $clase = null) {
        $this->idCaracteristica = $idCaracteristica;
        $this->nombre = $nombre;
        $this->clase = $clase;
    }

    function getIdCaracteristica() {
        return $this->idCaracteristica;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getClase() {
        return $this->clase;
    }

    function setIdCaracteristica($idCaracteristica) {
        $this->idCaracteristica = $idCaracteristica;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setClase($clase) {
        $this->clase = $clase;
    }

}
