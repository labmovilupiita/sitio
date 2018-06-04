<?php

/**
 * Description of FuenteInformacion
 *
 * @author Ram
 */
class FuenteInformacion {

    private $idFuenteInformacion;
    private $facebookId;
    private $nombre;
    private $hashtag;
    private $ubicacionFuente;

    function __construct($idFuenteInformacion = null, $facebookId = null, $nombre = null, $hashtag = null, $ubicacionFuente = null) {
        $this->idFuenteInformacion = $idFuenteInformacion;
        $this->facebookId = $facebookId;
        $this->nombre = $nombre;
        $this->hashtag = $hashtag;
        $this->ubicacionFuente = $ubicacionFuente;
    }

    function getIdFuenteInformacion() {
        return $this->idFuenteInformacion;
    }

    function getFacebookId() {
        return $this->facebookId;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getHashtag() {
        return $this->hashtag;
    }

    function getUbicacionFuente() {
        return $this->ubicacionFuente;
    }

    function setIdFuenteInformacion($idFuenteInformacion) {
        $this->idFuenteInformacion = $idFuenteInformacion;
    }

    function setFacebookId($facebookId) {
        $this->facebookId = $facebookId;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setHashtag($hashtag) {
        $this->hashtag = $hashtag;
    }

    function setUbicacionFuente($ubicacionFuente) {
        $this->ubicacionFuente = $ubicacionFuente;
    }

}
