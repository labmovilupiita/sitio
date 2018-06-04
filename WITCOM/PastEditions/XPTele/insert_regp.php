<?php
include 'myscon.ajs.php';
include 'libs/util.php';
require_once 'libs/Swift-4.3.1/lib/swift_required.php';

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

if(!filter_var($_POST[email], FILTER_VALIDATE_EMAIL)){
	die('{"type":"error","message":"El formato del correo no es correcto."}');
}else{
	$v_email = mysql_real_escape_string(trim($_POST[email]));
}

if(strlen($_POST[anio]) == 0){
	die('{"type":"error","message":"El a&ntildeo de egresado, es un campo obligatorio."}');
}else{
	if(is_numeric($_POST[anio])){
		$v_anio = mysql_real_escape_string(trim($_POST[anio]));
	}else{
		die('{"type":"error","message":"Este campo debe ser n&uacutemerico."}');
	}
}

if(strlen($_POST[especialidad]) == 0){
        die('{"type":"error","message":"La especialidad es obligatoria."}');
}else{
 	$v_especialidad = mysql_real_escape_string(trim($_POST[especialidad]));
}

if(strlen($_POST[experiencia]) == 0){
        die('{"type":"error","message":"Los a&ntildeos de experiencia, es un campo obligatorio."}');
}else{
 	$v_experiencia = mysql_real_escape_string(trim($_POST[experiencia]));
}

if(strlen($_POST[empresas]) == 0){
        die('{"type":"error","message":"Las empresas es obligatorio."}');
}else{
 	$v_empresas = mysql_real_escape_string(trim($_POST[empresas]));
}

if(strlen($_POST[temas]) == 0){
        die('{"type":"error","message":"Los posibles temas a hablar, es un campo obligatorio."}');
}else{
 	$v_temas = mysql_real_escape_string(trim($_POST[temas]));
}

if(strlen($_POST[talleres]) == 0){
        die('{"type":"error","message":"Los posibles talleres a impartir, es un campo obligatorio."}');
}else{
 	$v_talleres = mysql_real_escape_string(trim($_POST[talleres]));
}

//-- VERIFICA SI EXISTE EL PONENTE EN LA BASE 
$result = mysql_query("select nombre from Aspirantes where email='$v_email'");
if (!$result) {
	die('{"type":"error","message":"count: '.mysql_error().'"}');
}
if(mysql_num_rows($result) > 0){
    die('{"type":"error","message":"El aspirante ya existe."}');
}

/*
$v_nombre = utf8_decode($v_nombre);
$v_empresa = utf8_decode($v_empresa);
$v_resumen = utf8_decode($v_resumen);
$v_palabra_cve = utf8_decode($v_palabra_cve);
$v_titulo = utf8_decode($v_titulo);
*/

//-- GENERA LA CONTRASEÑA DEL USUARIO 	
//$v_pass = generateRandomString();

mysql_query("INSERT INTO Aspirantes (Nombre, Email, Anio, Especialidad, Experiencia, Empresas, Temas, Talleres) VALUES
('$v_nombre','$v_email','$v_anio','$v_especialidad','$v_experiencia','$v_empresas','$v_temas','$v_talleres')") or 
die('{"type":"error","message":"'.mysql_error().'"}');


// ---------------------------------------------------------------------------------------------------------------------------------------
// ENVIO DEL CORREO
//----------------------------------------------------------------------------------------------------------------------------------------
//$to = $v_email.',xptele2013@gmail.com';
//$to = $v_email;
//$subject = "Registro Congreso Telemática [2013]";
//$message = 'Tu contraseña: '.$v_pass.' '.
//                  'tu taller o ponencia será activada cuando tus datos sean validados.';
//$from = "tomik@totox.com.mx";
//$headers = "From: $from";
//mail($to,$subject,$message,$headers);
//$body =$message;
//include './mmail.php';

echo '{"type":"info","message":"Hemos recibido tus datos. '.
          '<br><br><strong>Laboratorio de Computo Movil</strong>"}';

?>