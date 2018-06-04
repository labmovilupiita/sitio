<?php
include 'myscon.ajs.php';
include 'libs/util.php';
//require_once 'libs/Swift-4.3.1/lib/swift_required.php';

	// TODO: Refactorizar las llamadas de error.

	//------------------------------------------------------------------------------------------------------------------
	// VALIDADACIONES
	//------------------------------------------------------------------------------------------------------------------
	if(!filter_var($_POST[email], FILTER_VALIDATE_EMAIL)){
		die('{"type":"error","message":"El formato del correo no es correcto."}');
	}else{
	 $v_email = mysql_real_escape_string(trim($_POST[email]));
	}

	if(strlen($_POST[nombre]) == 0){
		die('{"type":"error","message":"El nombre es obligatorio."}');
	} else  if(!preg_match ('/^[A-Záéíóúñ ]{1,255}$/i', $_POST[nombre])){
		die('{"type":"error","message":"El nombre deben ser solo letras."}');
	}else{
	 $v_nombre = trim($_POST[nombre]);
	}

	if(strlen($_POST[apellidos]) == 0){
		die('{"type":"error","message":"Los apellidos son obligatorios."}');
	} else  if(!preg_match ('/^[A-Záéíóúñ ]{1,255}$/i', $_POST[apellidos])){
		die('{"type":"error","message":"Los apellidos deben ser solo letras."}');
	}else{
	 $v_apellidos = mysql_real_escape_string(trim($_POST[apellidos]));
	}

	if(strlen($_POST[ife]) == 0){
		die('{"type":"error","message":"La clave de elector es obligatoria."}');
	} else  if(!preg_match ('/^[A-Z0-9]{1,255}$/i', $_POST[ife])){
		die('{"type":"error","message":"La clave de elector deben ser solo letras y numeros."}');
	}else{
	 $v_ife = strtoupper(mysql_real_escape_string(trim($_POST[ife])));
	}

	if(strlen($_POST['plan']) == 0){
	  die('{"type":"error","message":"Seleccione un plan de estudios."}');
	}
	
	 if($_POST['plan'] == 'n' || $_POST['plan'] == 'v'){ // -- BOLETA OBLIGATORIA PARA LOS ALUMNOS 
		if(strlen($_POST[boleta]) == 0){
		  die('{"type":"error","message":"La  boleta es obligatoria."}');
		} else if(!ctype_digit($_POST[boleta])){
			die('{"type":"error","message":"La boleta deben ser solo números."}');
		}else{
		 $v_boleta = mysql_real_escape_string(trim($_POST[boleta]));

		}
	}else{
		$v_boleta =0;	
	}

    if (count($_POST['ponencias']) == 0){
	   die('{"type":"error","message":"Seleccione al menos un evento."}');
	}
        
        $v_constancia = $_POST['constancia'] == 0? 0: $_POST['constancia'];

	//------------------------------------------------------------------------------------------------------
	//  END VALIDADACIONES
	//------------------------------------------------------------------------------------------------------	


	//------------------------------------------------------------------------------------------------------
	// PONDERACION DEL USUARIO
	//------------------------------------------------------------------------------------------------------
	if($_POST['plan'] == 'n') {
		$plan = 'n';
		$avance = $_POST['nplan'];
		$tipo_usuario = 30;
		}
	else if($_POST['plan'] == 'v'){
		$plan = 'v';
		$avance = $_POST['vplan'];
		$tipo_usuario = 30;
	}else if($_POST['plan'] == 'i'){
		$plan = 'i';
		$avance = null;
		$tipo_usuario = 10;
	}
	else{
		$plan = 'e';
		$avance = null;
		$tipo_usuario = 20;
		}
	

	//-- VERIFICA SI EXISTE EL USUARIO EN LA BASE 
	$result = mysql_query("select ife from auditorio where ife='$v_ife'");
	if (!$result) die('{"type":"error","message":"count: '.mysql_error().'"}');
	if(mysql_num_rows($result) > 0){
		die('{"type":"error","message":"El usuario ya existe, recupere la contraseña en la opcion del menu"}');
	}
	
	//-- GENERA LA CONTRASEÑA DEL USUARIO 	
	$v_pass = generateRandomString();

	//-- FUNCIONES NECESARIAS SI EL SERVIDOR PHP ESTA EN UTF8

        //$v_apellidos = utf8_decode($v_apellidos);	
	//$v_nombre = utf8_decode($v_nombre);	
	
	// -- INSERTA UN NUEVO USUARIO 
	
	mysql_query("INSERT INTO auditorio (boleta, nombre, apellidos, email, plan, avance, ife, tipo_usuario, pass, constancia) VALUES
	($v_boleta,'$v_nombre', '$v_apellidos', '$v_email', '$plan',  '$avance', '$v_ife',$tipo_usuario, '$v_pass',$v_constancia)") 
	or die('{"type":"error","message":"'.mysql_error().'"}');

	// --  REGRESA EL CAMPO AUTO INCREMENTADO DEL NUEVO USUARIO YA QUE ES UNA LLAVE FORANEA	
	$id_user = mysql_insert_id();
	
	
	$concatena = '';
	//error_log($_POST['ponencias']);
	foreach($_POST['ponencias'] as $i => $ponencia){
	// -- OBTIENE ID_PONENCIA-PRIORIDAD
		$pon_array = explode('-',$ponencia);
		$concatena.= "($id_user, $pon_array[0], $pon_array[1]), ";
		}
	$concatena = substr($concatena,0,-2);
	$query = "INSERT INTO asistencia (usuario, ponencia,prioridad) VALUES ".$concatena;
	mysql_query($query) or  die('{"type":"error","message":"'.mysql_error().'"}');
	$_SESSION['user'] = $_POST['ife'];


	// TODO: ENVIO DEL CORREO DE REGISTRO.

	// ---------------------------------------------------------------------------------------------------------------------------------------
	// ENVIO DEL CORREO
	//----------------------------------------------------------------------------------------------------------------------------------------
	//$to = $v_email.',xptele2013@gmail.com';
        $to = $v_email;
	$subject = "Registro Congreso Telemática [2013]";
	$message = '<br>Tu usuario: <strong>user_'.$id_user.'</strong> y tu contraseña: <strong>'.$v_pass.'</strong><br>'.
			  'Guarda estos datos porque con ellos se te dará acceso al evento. Estás '.
			  'invitado a las ponencias pero los talleres depende de la disponiblidad.<br>';
			  //'Estos datos serán enviados a tu correo, favor de revisa la carpeta de correo no deseado.';
	$from = "experienciastelematicas@gmail.com";
	$headers = "From: $from";
	$body = 'Tu usuario: user_'.$id_user.' y tu contraseña: '.$v_pass.
			  'Guarda estos datos porque con ellos se te dará acceso al evento. Estás '.
			  'invitado a las ponencias pero los talleres depende de tu la disponiblidad.';
			  //'Estos datos serán enviados a tu correo, favor de revisar tu la carpeta de correo no deseado.';
	//mail($to,$subject,$body,$headers);
        //$body =$message;
        //include './mmail.php';

	echo '{"type":"info","message":"Hemos recibido tus datos.<br>'.
		$message.'<br><br><strong>Laboratorio de Computo Movil</strong>"}';


?>
