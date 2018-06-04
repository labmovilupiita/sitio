<?php

include '../Model/Conexion.php';
include '../Model/Publicacion.php';
include '../Model/PublicacionDAO.php';
include '../Model/UbicacionFuente.php';
include '../Model/UbicacionFuenteDAO.php';
include '../Model/FuenteInformacion.php';
include '../Model/FuenteInformacionDAO.php';
include '../Core/Extractor.php';
set_time_limit(0);
$id = filter_input(INPUT_POST, "id");
$idFb = filter_input(INPUT_POST, "idFb");
$hash = filter_input(INPUT_POST, "hash");

$extractor = new Extractor($id, $idFb, $hash);
$response = $extractor->extraer();
echo $response;
