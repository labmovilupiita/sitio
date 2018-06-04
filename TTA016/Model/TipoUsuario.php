<?php

/**
 * Description of TipoUsuario
 *
 * @author Ram
 */
class TipoUsuario {
    private $idTipoUsuario;
    private $nombre;
    
    function __construct($idTipoUsuario, $nombre) {
        $this->idTipoUsuario = $idTipoUsuario;
        $this->nombre = $nombre;
    }
    
    
    function getIdTipoUsuario() {
        return $this->idTipoUsuario;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setIdTipoUsuario($idTipoUsuario) {
        $this->idTipoUsuario = $idTipoUsuario;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }


}
