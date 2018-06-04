<?php


include_once '../Model/EstadisticasMapper.php';
function msn(){
	return "Hola desde funcion";
}


header('Content-Type: application/json; charset=utf-8');

//$dao = new EstadisticasDAO();
$mapper = new EstadisticasMapper();

$rangofecha = filter_input(INPUT_POST, "rangofecha");

$result = $mapper->obtenerEstadisticas($rangofecha);//"01/01/2015 - 08/01/2017");//obtenerEstadisticasRobo("2015-01-01","2017-08-01");



echo json_encode(array('data'=>$result,'consulta'=>1), JSON_PRETTY_PRINT);

