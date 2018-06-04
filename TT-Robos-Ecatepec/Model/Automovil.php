<?php

/**
 * Description of Automovil
 *
 * @author Ram
 */
class Automovil {

    private $idAutomovil;
    private $placa;
    private $modelo;
    private $color;
    private $submarcaAutomovil;

    function __construct($idAutomovil, $placa = null, $modelo = null, $color = null, $submarcaAutomovil = null) {
        $this->idAutomovil = $idAutomovil;
        $this->placa = $placa;
        $this->modelo = $modelo;
        $this->color = $color;
        $this->submarcaAutomovil = $submarcaAutomovil;
    }

    function getIdAutomovil() {
        return $this->idAutomovil;
    }

    function getPlaca() {
        return $this->placa;
    }

    function getModelo() {
        return $this->modelo;
    }

    function getColor() {
        return $this->color;
    }

    function getSubmarcaAutomovil() {
        return $this->submarcaAutomovil;
    }

    function setIdAutomovil($idAutomovil) {
        $this->idAutomovil = $idAutomovil;
    }

    function setPlaca($placa) {
        $this->placa = $placa;
    }

    function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    function setColor($color) {
        $this->color = $color;
    }

    function setSubmarcaAutomovil($submarcaAutomovil) {
        $this->submarcaAutomovil = $submarcaAutomovil;
    }

}
