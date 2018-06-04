<?php

/**
 * Description of Usuario
 *
 * @author Ram
 */
class Usuario {

    private $idUsuario;
    private $email;
    private $nombre;
    private $genero;
    private $nacimiento;
    private $clave;
    private $tipoUsuario;

    function __construct($idUsuario, $email, $nombre, $genero, $nacimiento = null, $clave, $tipoUsuario = null) {
        $this->idUsuario = $idUsuario;
        $this->email = $email;
        $this->nombre = $nombre;
        $this->genero = $genero;
        $this->nacimiento = $nacimiento;
        $this->clave = $clave;
        $this->tipoUsuario = $tipoUsuario;
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getEmail() {
        return $this->email;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getGenero() {
        return $this->genero;
    }

    function getNacimiento() {
        return $this->nacimiento;
    }

    function getClave() {
        return $this->clave;
    }

    function getTipoUsuario() {
        return $this->tipoUsuario;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }

    function setNacimiento($nacimiento) {
        $this->nacimiento = $nacimiento;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    function setTipoUsuario($tipoUsuario) {
        $this->tipoUsuario = $tipoUsuario;
    }

}
