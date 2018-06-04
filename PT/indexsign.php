<?php

	// Inicializa la sesion
	session_start();

	$logError = "";

	// Redirecciona
	if (isset($_SESSION['usuario'])) { //En caso de que ya este activa la sesion
		if($_COOKIE['usertipo'] == 0)
			header('Location: Profesor/indexlog.php');
		else if($_COOKIE['usertipo'] == 1)
			header('Location: Alumno/indexlog.php');
		else if($_COOKIE['usertipo'] == 2)
			header('Location: Administrador/indexlog.php');

	}
	else if (isset($_GET['loginfail'])) { //En caso de que no haya sesion activa
		$logError = "*Usuario o contraseña invalidos";
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Trabajo Terminal</title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="author" content="Bruno Ramirez">
	<meta name="Title" content="Gestor de trabajos terminales">

	<link rel="stylesheet" href="css/pure-master/src/forms/css/forms.css">
	<link rel="stylesheet" href="css/pure-master/src/buttons/css/buttons.css">
	<link rel="stylesheet" href="css/default.css">
	<link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900">

	<link rel="icon" type="image/png" href="images/logo_upiita.png">

	<script src="js/jquery-2.1.0.min.js"></script>
	<script>
	$(function() {
		// Funcionalidad de "Recuerdame"
	    if (localStorage.chkbx && localStorage.chkbx != '') {
	        $('#remember').attr('checked', 'checked');
	        $('#email').val(localStorage.usrname);
	        $('#pass').val(localStorage.pass);
	    } else {
	        $('#remember').removeAttr('checked');
	        $('#email').val('');
	        $('#pass').val('');
	    }

	    $('#remember').click(function() {

	        if ($('#remember').is(':checked')) {
	            // save username and password
	            localStorage.usrname = $('#email').val();
	            localStorage.pass = $('#pass').val();
	            localStorage.chkbx = $('#remember').val();
	        } else {
	            localStorage.usrname = '';
	            localStorage.pass = '';
	            localStorage.chkbx = '';
	        }
	    });
	    $('#form').submit( function() {
	    	if ($('#remember').is(':checked')){
	    		localStorage.usrname = $('#email').val();
	            localStorage.pass = $('#pass').val();
	            localStorage.chkbx = $('#remember').val();
	    	}

	     });
	});

	</script>
</head>
<body>
	<div id="header-wrapper">
		<div id="header">
			<img src="images/logo_ipn.png" id="logoipn" width="120" height="150" alt="img" />
			<div id="logo" class="container">
	 			<h1><a href="index.php">Trabajo Terminal</a></h1>
				<span><a href="index.php">Registro de trabajos terminales</a></span>
			</div>
			<img src="images/logo_upiita.png" id="logoupiita" width="150" height="150" alt="img" />
		</div>
	</div>
	<div id="wrapper1">
		<div id='cssmenu'>
			<ul>
			   <li><a href='index.php'><span>Inicio</span></a>
			  </li>
			</ul>
		</div>
		<div id="welcome" class="container">
			<div class="title">
				<h2>¡Bienvenido!</h2>
				<span class="byline">Una nueva manera de registrar tu Trabajo Terminal, de manera más fácil y rápida.</span>
			</div>
			<div class="content">
				<p>Para ingresar tecle&eacute; su correo y contrase&ntilde;a</p>
				<form id="form" class="pure-form pure-form-stacked" action="login.php" method= "post">
					<table align="center">
						<tr>
							<td align= "right">Email:</td>
							<td><input type="text" id="email" name="user" style="width: 200px;"/></td>
							<td style="color: red;" id="logError"><?php echo $logError; ?></td>
						</tr>
						<tr>
							<td align= "right">Contraseña:</td>
							<td><input id="pass" type="password" name="pass" style="width: 200px;"/></td>
						</tr>
						<tr>
							<td>
							</td>
							<td>
							<label for="remember">
					            <input id="remember" type="checkbox"> Recuerdame
					        </label>
					       	</td>
						</tr>
						<tr>
							<td colspan="2"><input class="pure-button pure-button-primary" type="submit" value="Entrar" style="width: 100%;"/></td>
						</tr>
					</table> 
				</form>
			</div>
		</div>
	</div>
	<div id="footer">
		<p>Unidad Profesional Interdisciplinaria en Ingeniería y Tecnologías Avanzadas Av. Instituto Politécnico Nacional 2580, Barrio La Laguna Ticomán, Gustavo A. Madero, 07340, México .D.F.</p>
		<p>Tels.: 57296000, ext. 56807</p>
	</div>
</body>
</html>
