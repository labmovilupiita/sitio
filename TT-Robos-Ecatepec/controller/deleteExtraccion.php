<?php

include_once '../Model/Conexion.php';
include_once '../Model/Extraccion.php';
include_once '../Model/ExtraccionDAO.php';
$id = filter_input(INPUT_POST, "id");
$exdao = new ExtraccionDAO();
$code = $exdao->deleteExtraccion($id);
echo $code;

