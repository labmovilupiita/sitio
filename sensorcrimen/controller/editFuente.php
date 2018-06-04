<?php

include '../Model/Conexion.php';
include '../Model/FuenteInformacion.php';
include '../Model/FuenteInformacionDAO.php';

$fuente = new FuenteInformacion(filter_input(INPUT_POST, "id"), filter_input(INPUT_POST, "fid"),filter_input(INPUT_POST, "nombre"), filter_input(INPUT_POST, "hash"), filter_input(INPUT_POST, "ufuente"));
$fdao=new FuenteInformacionDAO();
$res = $fdao->editFuente($fuente);
echo $res;