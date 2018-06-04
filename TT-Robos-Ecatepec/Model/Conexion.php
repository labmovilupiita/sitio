<?php

/**
 * Description of Conexion
 *
 * @author Ram
 */
class Conexion {

    const SUCCESSFUL = 1;
    const CONNECTION_FAIL = -2;
    const ERROR_ON_INSERT = -3;
    const ERROR_ON_DELETE = -4;
    const NO_RESULTS = -5;

    function conectar() {
        $host = "148.204.86.18";
        $port = "9090";
        $user = "systemtt4";
        $password = "Systemtt4.";
        $database = "tt2016a016";

        try {
            $connection = new PDO('mysql:host=' . $host . ';dbname=' . $database . ';port=' . $port, $user, $password);
            error_log("conectado");
            return $connection;
        } catch (PDOException $e) {
            error_log("errror");
            return NULL;
        }
    }



}
