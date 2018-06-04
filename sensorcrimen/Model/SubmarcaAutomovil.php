<?php

/**
 * Description of submarcaAutomovil
 *
 * @author Ram
 */
class SubmarcaAutomovil {

    private $idSubmarcaAutomovil;
    private $nombre;
    private $marcaAutomovil;

    function __construct($idSubmarcaAutomovil, $nombre, $marcaAutomovil = null) {
        $this->idSubmarcaAutomovil = $idSubmarcaAutomovil;
        $this->nombre = $nombre;
        $this->marcaAutomovil = $marcaAutomovil;
    }

    function getIdSubmarcaAutomovil() {
        return $this->idSubmarcaAutomovil;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getMarcaAutomovil() {
        return $this->marcaAutomovil;
    }

    function setIdSubmarcaAutomovil($idSubmarcaAutomovil) {
        $this->idSubmarcaAutomovil = $idSubmarcaAutomovil;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setMarcaAutomovil($marcaAutomovil) {
        $this->marcaAutomovil = $marcaAutomovil;
    }

}
