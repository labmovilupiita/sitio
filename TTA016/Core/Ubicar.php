<?php

/**
 * @author ram
 */
include '../Model/Conexion.php';
include '../Model/Ubicacion.php';
include '../Model/UbicacionDAO.php';

set_time_limit(0);
header('charset=utf-8');
class Ubicar {

    function __construct() {
        
    }

    public function saveUbicacion($ubicacion) {
        $udao = new UbicacionDAO();
        $udao->editUbicacion($ubicacion);
    }

    public function ubicarRobos() {
        $udao = new UbicacionDAO();
        $ubicaciones = $udao->selectUbicacionesNoUbicadas();
        foreach ($ubicaciones as $ubicacion) {
            $this->ubicarPost($ubicacion);
        }
        echo "success";
    }

    public function ubicarPost($ubicacion) {
        $direccion = $ubicacion->getDireccion();
        $ubicado = $this->buscar($this->makeDireccion($direccion));
        if (!is_null($ubicado)) {
            $ubicacion->setDireccion($ubicado[0]);
            $ubicacion->setLatitud($ubicado[1]);
            $ubicacion->setLongitud($ubicado[2]);
            $ubicacion->setUbicado(1);
        } else {
            $ubicacion->setDireccion("");
            $ubicacion->setUbicado(2);
        }
        $this->saveUbicacion($ubicacion);
    }

    public function makeDireccion($direccion) {
        $direccion = explode(" ", $direccion);
        $direccionBusqueda = "";
        for ($i = 0; $i < count($direccion); $i++) {
            switch ($direccion[$i]) {
                case "calle":
                    if (strlen($direccion[$i + 1]) < 4 && isset($direccion[$i + 2])) {
                        $direccionBusqueda = $direccionBusqueda . "calle " . $direccion[$i + 1] . " " . $direccion[$i + 2] . " ";
                        $i++;
                    } else {
                        $direccionBusqueda = $direccionBusqueda . "calle " . $direccion[$i + 1] . " ";
                    }
                    $i++;
                    break;
                case "colonia":
                    if (strlen($direccion[$i + 1]) < 4 && isset($direccion[$i + 2])) {
                        $direccionBusqueda = $direccionBusqueda . "colonia " . $direccion[$i + 1] . " " . $direccion[$i + 2] . " ";
                        $i++;
                    } else {
                        $direccionBusqueda = $direccionBusqueda . "colonia " . $direccion[$i + 1] . " ";
                    }
                    $i++;
                    break;
                case "avenida":
                    if (strlen($direccion[$i + 1]) < 4 && isset($direccion[$i + 2])) {
                        $direccionBusqueda = $direccionBusqueda . "avenida " . $direccion[$i + 1] . " " . $direccion[$i + 2] . " ";
                        $i++;
                    } else {
                        $direccionBusqueda = $direccionBusqueda . "avenida " . $direccion[$i + 1] . " ";
                    }
                    $i++;
                    break;
            }
        }
        return $direccionBusqueda;
    }

    public function buscar($direccion) {
        header('charset=utf-8');
        $url = "https://maps.googleapis.com/maps/api/directions/json?origin=" . $direccion . "+ecatepec&destination=upiita+ipn&key=AIzaSyBGcbqNzfInH9vSo6EYH_Fn5YHJxhAiVpQ";
        $url = str_replace(" ", "%20", $url);
        error_log($url);
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($ch);
            curl_close($ch);
            $json = json_decode($response);
            if (isset($json->routes[0]->legs[0]->start_location->lat) && isset($json->routes[0]->legs[0]->start_location->lng) && isset($json->routes[0]->legs[0]->start_address)) {
                return array($json->routes[0]->legs[0]->start_address, $json->routes[0]->legs[0]->start_location->lat, $json->routes[0]->legs[0]->start_location->lng);
            } else {
                return null;
            }
        } catch (Exception $e) {
            return null;
        }
    }

}

$u = new Ubicar();
$u->ubicarRobos();
