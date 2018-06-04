<?php

set_time_limit(0);

function conectaLocal() {

    $host = "127.0.0.1";
    $user = "root";
    $password = "ramponce";
    $database = "tta016";

    try {
        $connection = new PDO('mysql:host=' . $host . ';dbname=' . $database, $user, $password);
        return $connection;
    } catch (PDOException $e) {
        error_log("errror");
        return NULL;
    }
}

function conectaRemoto() {

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

function getDay($fecha) {
    echo "<br> FECHA : " . $fecha . "<br>";
    switch (date('D', strtotime($fecha))) {
        case "Mon": {
                return "Lunes";
                break;
            }
        case "Tue": {
                return "Martes";
                break;
            }
        case "Wed": {
                return "Miercoles";
                break;
            }
        case "Thu": {
                return "Jueves";
                break;
            }
        case "Fri": {
                return "Viernes";
                break;
            }
        case "Sat": {
                return "Sabado";
                break;
            }
        case "Sun": {
                return "Domingo";
                break;
            }
    }
}

function updateDay($fecha) {

    $con = conectaLocal();
    //Si la conexion no fue exitosa
    if ($con == NULL) {
        return;
    } else {
        $dia = getDay($fecha);
        echo "DIA : " . $dia . "<br>";
        $sql = "UPDATE publicacion SET dia=? WHERE fecha=?;";
        $query = $con->prepare($sql);
        $query->execute(array(
            $dia,
            $fecha
        ));
        $con = NULL;
    }
}

function selectAllPublicaciones() {
    $con = conectaLocal();
    //Si la conexion no fue exitosa
    if ($con == NULL) {
        return NULL;
    }
    $query = $con->prepare("select fecha, count(*) as veces from publicacion group by fecha order by veces desc;");
    $query->execute();
    $con = NULL;
    while ($row = $query->fetch()) {
        $fecha = $row[0];
        updateDay($fecha);
    }
}

selectAllPublicaciones();
