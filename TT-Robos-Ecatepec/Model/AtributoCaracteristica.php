<?php

/**
 *
 * @author ram
 */
class AtributoCaracteristica {

    private $idatributo;
    private $atributo;
    private $idcaracteristica;
    private $caracteristica;
    private $idreporte;
//
    function __construct($idatributo = null, $atributo = null, $idcaracteristica = null, $caracteristica = null, $idreporte = null) {
        $this->idatributo = $idatributo;
        $this->atributo = $atributo;
        $this->idcaracteristica = $idcaracteristica;
        $this->caracteristica = $caracteristica;
        $this->idreporte = $idreporte;
    }
    
    function getIdatributo() {
        return $this->idatributo;
    }

    function getAtributo() {
        return $this->atributo;
    }

    function getIdcaracteristica() {
        return $this->idcaracteristica;
    }

    function getCaracteristica() {
        return $this->caracteristica;
    }

    function getIdreporte() {
        return $this->idreporte;
    }

    function setIdatributo($idatributo) {
        $this->idatributo = $idatributo;
    }

    function setAtributo($atributo) {
        $this->atributo = $atributo;
    }

    function setIdcaracteristica($idcaracteristica) {
        $this->idcaracteristica = $idcaracteristica;
    }

    function setCaracteristica($caracteristica) {
        $this->caracteristica = $caracteristica;
    }

    function setIdreporte($idreporte) {
        $this->idreporte = $idreporte;
    }



}
