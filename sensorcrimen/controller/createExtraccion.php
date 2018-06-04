<?php
include_once '../Model/Conexion.php';
include_once '../Model/Extraccion.php';
include_once '../Model/ExtraccionDAO.php';
$id = uniqid();
$hora = filter_input(INPUT_POST, "hora");
$restantes = 0;
$fuente = filter_input(INPUT_POST, "id_fuente");
$tiempo = filter_input(INPUT_POST, "id_tiempo");
$extraccion = new Extraccion($id, $hora, $restantes, $fuente, $tiempo);
$edao=new ExtraccionDAO();
$res = $edao->insertExtraccion($extraccion);
echo $res;
