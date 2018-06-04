<?php

/**
 * Description of Ubicacion
 *
 * @author Ram
 */
class Ubicacion {

    private $idUbucacion;
    private $direccion;
    private $latitud;
    private $longitud;
    private $ubicado;

    function __construct($idUbucacion = null, $direccion=null, $latitud=null, $longitud =null, $ubicado=null) {
        $this->idUbucacion = $idUbucacion;
        $this->direccion = $direccion;
        $this->latitud = $latitud;
        $this->longitud = $longitud;
        $this->ubicado = $ubicado;
    }

    
    function getIdUbucacion() {
        return $this->idUbucacion;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getLatitud() {
        return $this->latitud;
    }

    function getLongitud() {
        return $this->longitud;
    }

    function getUbicado() {
        return $this->ubicado;
    }

    function setIdUbucacion($idUbucacion) {
        $this->idUbucacion = $idUbucacion;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setLatitud($latitud) {
        $this->latitud = $latitud;
    }

    function setLongitud($longitud) {
        $this->longitud = $longitud;
    }

    function setUbicado($ubicado) {
        $this->ubicado = $ubicado;
    }




}
