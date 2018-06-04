<?php

/**
 * Description of UbicacionFuente
 *
 * @author ram
 */
class UbicacionFuente {

    private $id;
    private $nombre;
    private $lat;
    private $lng;

    function __construct($id = null, $nombre = null, $lat = null, $lng = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->lat = $lat;
        $this->lng = $lng;
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getLat() {
        return $this->lat;
    }

    function getLng() {
        return $this->lng;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setLat($lat) {
        $this->lat = $lat;
    }

    function setLng($lng) {
        $this->lng = $lng;
    }

}
