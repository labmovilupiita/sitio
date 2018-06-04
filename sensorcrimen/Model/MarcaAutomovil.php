<?php

/**
 * Description of MarcaAutomovil
 *
 * @author Ram
 */
class MarcaAutomovil {

    private $idMarcaAutomovil;
    private $nombre;

    function __construct($idMarcaAutomovil, $nombre) {
        $this->idMarcaAutomovil = $idMarcaAutomovil;
        $this->nombre = $nombre;
    }

    function getIdMarcaAutomovil() {
        return $this->idMarcaAutomovil;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setIdMarcaAutomovil($idMarcaAutomovil) {
        $this->idMarcaAutomovil = $idMarcaAutomovil;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

}
