<?php


header('Content-Type: application/json; charset=utf-8');
include '../Model/Conexion.php';
include '../Model/ReporteRobo.php';
include '../Model/ReporteRoboDAO.php';
include '../Model/Ubicacion.php';
include '../Model/UbicacionDAO.php';
include '../Model/Publicacion.php';
include '../Model/PublicacionDAO.php';
include '../Model/FuenteInformacionDAO.php';
include '../Model/FuenteInformacion.php';
$ubicacion = new Ubicacion();
$publicacion = new Publicacion();
$reporte = new ReporteRobo();
$udao = new UbicacionDAO();
$ubicaciones = $udao->selectIdUbicacionesUbicadas(1000);
$reportesJson = array();
$rrdao = new ReporteRoboDAO();

foreach ($ubicaciones as $ubicacion) {
    $reporte = $rrdao->selectReporteRoboByUbicacion($ubicacion->getIdUbucacion());
    $publicacion = $reporte->getPublicacion();
    $ubicacion = $reporte->getUbicacion();
    $clase;
    $publicacionJson = array("idpublicacion" => $publicacion->getIdPublicacion(), "publicacion" =>$publicacion->getPublicacion(), "fecha" => $publicacion->getFecha(), "hora" => $publicacion->getHora(), "likes" => $publicacion->getLikes(), "shares" => $publicacion->getShares(), "fuente" => array());
    $ubicacionJson = array("idubicacion" => $ubicacion->getIdUbucacion(), "direccion" => $ubicacion->getDireccion(), "lat" => $ubicacion->getLatitud(), "lng" => $ubicacion->getLongitud());
    $reporteJson = array("idreporte" => $reporte->getIdReporteRobo(), "fecha" => $reporte->getFechaCreacion(), "detalle" => $reporte->getDetalle(), "lematizado" => utf8_encode($reporte->getLematizado()), "ubicacion" => $ubicacionJson, "publicacion" => $publicacionJson, "clase" => array());
    array_push($reportesJson, $reporteJson);
}

echo json_encode($reportesJson, JSON_PRETTY_PRINT);
