<?php

include_once '../Model/Conexion.php';
include_once '../Model/FuenteInformacion.php';
include_once '../Model/FuenteInformacionDAO.php';
$fidao = new FuenteInformacionDAO();
$idFuente = filter_input(INPUT_POST, "id");
$code = $fidao->deleteFuente($idFuente);
echo $code;
?>