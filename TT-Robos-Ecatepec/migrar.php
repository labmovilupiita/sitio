<?php

include './Model/Publicacion.php';

function conectaLocal() {

    $host = "127.0.0.1";
    $user = "root";
    $password = "ramponce7";
    $database = "tt2016";

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
    $database = "tta016";

    try {
        $connection = new PDO('mysql:host=' . $host . ';dbname=' . $database . ';port=' . $port, $user, $password);
        error_log("conectado");
        return $connection;
    } catch (PDOException $e) {
        error_log("errror");
        return NULL;
    }
}

function extraerRemoto() {
    $con = conectaRemoto();
    $query = $con->prepare("SELECT * FROM publicacion");
    $query->execute();
    $con = NULL;
    while ($row = $query->fetch()) {
        $publicacion = new Publicacion($row[0]);
        $publicacion->setPublicacion($row[1]);
        $publicacion->setFecha($row[2]);
        $publicacion->setHora($row[3]);
        $publicacion->setProcesado($row[4]);
        $publicacion->setLikes(0);
        $publicacion->setShares(0);
        $publicacion->setFuenteInformacion("5925e8c2b4e9d");
        guardarLocal($publicacion);
    }
}

function guardarLocal($publicacion) {
    $con = conectaLocal();
    $sql = "INSERT INTO publicacion (idpublicacion, publicacion, fecha, hora, procesado, likes, shares, idfuenteinformacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
    $query = $con->prepare($sql);
    echo "Guardando " . $publicacion->getIdPublicacion() . "<br>";
    $success = $query->execute(array(
        $publicacion->getIdPublicacion(),
        $publicacion->getPublicacion(),
        $publicacion->getFecha(),
        $publicacion->getHora(),
        $publicacion->getProcesado(),
        $publicacion->getLikes(),
        $publicacion->getShares(),
        $publicacion->getFuenteInformacion()
    ));
    $con = NULL;
}


extraerRemoto();