<?php

	$destinatario = $_POST['destinatario'];
	$asunto = $_POST['asunto'];
	$contenido = $_POST['contenido'];
	$remitente = $_POST['remitente'];
	$pass = $_POST['pass'];

	$destinatarios = explode(",", $destinatario);
	/*Lo primero es añadir al script la clase phpmailer desde la ubicación en que esté*/
	require 'class.phpmailer.php';
	 
	//Crear una instancia de PHPMailer
	$mail = new PHPMailer();
	//Definir que vamos a usar SMTP
	$mail->IsSMTP();
	//Esto es para activar el modo depuración. En entorno de pruebas lo mejor es 2, en producción siempre 0
	// 0 = off (producción)
	// 1 = client messages
	// 2 = client and server messages
	$mail->SMTPDebug  = 0;
	//Ahora definimos gmail como servidor que aloja nuestro SMTP
	$mail->Host       = 'smtp.gmail.com';
	//El puerto será el 587 ya que usamos encriptación TLS
	$mail->Port       = 587;
	//Definmos la seguridad como TLS
	$mail->SMTPSecure = 'tls';
	//Tenemos que usar gmail autenticados, así que esto a TRUE
	$mail->SMTPAuth   = true;
	//Definimos la cuenta que vamos a usar. Dirección completa de la misma
	$mail->Username   = $remitente;
	//Introducimos nuestra contraseña de gmail
	$mail->Password   = $pass;
	//Definimos el remitente (dirección y, opcionalmente, nombre)
	$mail->SetFrom($remitente);
	//Esta línea es por si queréis enviar copia a alguien (dirección y, opcionalmente, nombre)
	//$mail->AddReplyTo('replyto@correoquesea.com','El de la réplica');
	//Y, ahora sí, definimos el destinatario (dirección y, opcionalmente, nombre)
	foreach ($destinatarios as $d) {
	    $mail->AddAddress($d);
	}
	//Definimos el tema del email
	$mail->Subject = $asunto;
	//Para enviar un correo formateado en HTML lo cargamos con la siguiente función. Si no, puedes meterle directamente una cadena de texto.
	$mail->MsgHTML($contenido);
	//Y por si nos bloquean el contenido HTML (algunos correos lo hacen por seguridad) una versión alternativa en texto plano (también será válida para lectores de pantalla)
	$mail->AltBody = $contenido;
	//Enviamos el correo
	if(!$mail->Send()) {
	  header( 'Location: gestor.php?status=2&error='.$mail->ErrorInfo) ;
	} else {
	  header( 'Location: gestor.php?status=1') ;
	}
?>
