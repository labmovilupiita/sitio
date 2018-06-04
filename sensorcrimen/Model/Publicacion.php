<?php

/**
 * Description of Publicacion
 *
 * @author Ram
 */
class Publicacion {

    private $idPublicacion;
    private $publicacion;
    private $fecha;
    private $hora;
    private $procesado;
    private $fuenteInformacion;
    private $likes;
    private $shares;

    function __construct($idPublicacion = null, $publicacion = null, $fecha = null, $hora = null, $procesado = 0, $likes = 0, $shares = 0, $fuenteInformacion = null) {
        $this->idPublicacion = $idPublicacion;
        $this->publicacion = $publicacion;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->procesado = $procesado;
        $this->likes = $likes;
        $this->shares=$shares;
        $this->fuenteInformacion = $fuenteInformacion;
    }

    function getIdPublicacion() {
        return $this->idPublicacion;
    }

    function getPublicacion() {
        return $this->publicacion;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getHora() {
        return $this->hora;
    }

    function getProcesado() {
        return $this->procesado;
    }

    function getFuenteInformacion() {
        return $this->fuenteInformacion;
    }

    function getLikes() {
        return $this->likes;
    }

    function getShares() {
        return $this->shares;
    }

    function setIdPublicacion($idPublicacion) {
        $this->idPublicacion = $idPublicacion;
    }

    function setPublicacion($publicacion) {
        $this->publicacion = $publicacion;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

    function setProcesado($procesado) {
        $this->procesado = $procesado;
    }

    function setFuenteInformacion($fuenteInformacion) {
        $this->fuenteInformacion = $fuenteInformacion;
    }

    function setLikes($likes) {
        $this->likes = $likes;
    }

    function setShares($shares) {
        $this->shares = $shares;
    }

}
