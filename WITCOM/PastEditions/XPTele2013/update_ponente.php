<?php
session_start();
include 'myscon.ajs.php';
include 'libs/util.php';


if(!isset($_SESSION['ponente_id'])){
    die('{"type":"error","message":"La sesion ha caducado."}');
} 

//------------------------------------------------------------------------------------------------------------------
// VALIDADACIONES
//------------------------------------------------------------------------------------------------------------------

if(strlen($_POST[nombre]) == 0){
        die('{"type":"error","message":"El nombre es obligatorio."}');
} else  if(!preg_match ('/^[A-ZáÁéÉíÍÓóÚúñÑ ]{1,255}$/i', $_POST[nombre])){
        die('{"type":"error","message":"El nombre deben ser solo letras."}');
}else{
 $v_nombre = trim($_POST[nombre]);
}

$v_mail=$_SESSION['ponente_id'];



if(strlen($_POST[empresa]) == 0){
        die('{"type":"error","message":"El nombre de la empresa es obligatorio."}');
}else{
 $v_empresa = mysql_real_escape_string(trim($_POST[empresa]));
}

if(strlen($_POST[palabra_cve]) == 0){
        die('{"type":"error","message":"Las palabras clave son obligatorias."}');
}else{
 $v_palabra_cve = mysql_real_escape_string(trim($_POST[palabra_cve]));
}

if(strlen($_POST[resumen]) == 0){
        die('{"type":"error","message":"El resumen es obligatorio."}');
}else{
 $v_resumen = mysql_real_escape_string(trim($_POST[resumen]));
}

if(strlen($_POST[titulo]) == 0){
        die('{"type":"error","message":"El titulo es obligatorio."}');
}else{
 $v_titulo = mysql_real_escape_string(trim($_POST[titulo]));
}




/*
$v_nombre = utf8_decode($v_nombre);
$v_empresa = utf8_decode($v_empresa);
$v_resumen = utf8_decode($v_resumen);
$v_palabra_cve = utf8_decode($v_palabra_cve);
$v_titulo = utf8_decode($v_titulo);
*/


mysql_query("UPDATE ponentes set nombre ='$v_nombre', empresa='$v_empresa',ponencia='$v_titulo', clave='$v_palabra_cve', resumen='$v_resumen' where email='$v_mail'") or 
die('{"type":"error","message":"'.mysql_error().'"}');



die('{"type":"info","message":"La actualización ha sido completado de manera correcta."}');

?>

