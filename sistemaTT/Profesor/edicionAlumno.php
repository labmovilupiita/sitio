<?php include("../database.php")?>
<?php

	// Inicializa la sesion
	session_start();

	error_reporting(0);

	// Redirecciona
	if (!isset($_SESSION['usuario'])) { //En caso de que ya este activa la sesion
		header('Location: ../index.php');
	}
	if($_COOKIE['usertipo'] == 1){
		header('Location: ../index.php');
	}
	$id = $_GET['id'];

	$con = Conectarse();
	
	$sql="SELECT * FROM alumno WHERE id=".$id;
	$result = mysqli_query($con,$sql);

	while($row = mysqli_fetch_array($result))
	  {

		  $nombre = $row['nombre'];
		  $apellidopaterno = $row['apellidopaterno'];
		  $apellidomaterno = $row['apellidomaterno'];
		  $correo = $row['correo'];
		  $password = $row['password'];
		  $telefono = $row['telefono'];
		  $celular = $row['celular'];
	  }

	Cerrar($con);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Trabajo Terminal</title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="author" content="Bruno Ramirez">
	<meta name="Title" content="Gestor de trabajos terminales">

	<link rel="stylesheet" href="../css/pure-master/src/forms/css/forms.css">
	<link rel="stylesheet" href="../css/pure-master/src/buttons/css/buttons.css">
	<link rel="stylesheet" href="../css/pure-master/src/grids/css/grids-min.css">
	<link rel="stylesheet" href="../css/default.css">
	<link rel="stylesheet" href="../css/fonts.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900">

	<link rel="icon" type="image/png" href="../images/logo_upiita.png">

	<link rel="stylesheet" href="../css/jquery-ui-1.10.4/css/smoothness/jquery-ui.css">
	<script src="../js/jquery-2.1.0.min.js"></script>
	<script src="../js/jquery-ui.js"></script>

	<script>
		$(function() {
			var nombre = "<?php echo $nombre; ?>";
			var apellidopaterno = "<?php echo $apellidopaterno; ?>";
			var apellidomaterno = "<?php echo $apellidomaterno; ?>";
			var id = "<?php echo $id; ?>";
			var password = "<?php echo $password; ?>";
			var correo = "<?php echo $correo; ?>";
			var telefono = "<?php echo $telefono; ?>";
			var celular = "<?php echo $celular; ?>";
			$("#nombre").val(nombre);
			$("#apaterno").val(apellidopaterno);
			$("#amaterno").val(apellidomaterno);
			$("#id").val(id);
			$("#correo").val(correo);
			$("#pass").val(password);
			$("#telefono").val(telefono);
			$("#celular").val(celular);
		});
		function redirInicio(){
			window.location.assign("listaAlumno.php");
		}

	</script>
	<style>
		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button {
		    /* display: none; <- Crashes Chrome on hover */
		    -webkit-appearance: none;
		    margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
		}
		.button-error {
	        background: rgb(202, 60, 60); /* this is a maroon */
	        color: white;
	        border-radius: 4px;
	        text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
	    }
	</style>
</head>
<body>
	<div id="header-wrapper">
		<div id="header">
			<img src="../images/logo_ipn.png" id="logoipn" width="120" height="150" alt="img" />
			<div id="logo" class="container">
	 			<h1><a href="../index.php">Trabajo Terminal</a></h1>
				<span><a href="../index.php">Registro de trabajos terminales</a></span>
			</div>
			<img src="../images/logo_upiita.png" id="logoupiita" width="150" height="150" alt="img" />
		</div>
	</div>
	<div id="wrapper1">
		<div id='cssmenu'>
			<ul>
			   <li><a href='../index.php'><span>Inicio</span></a>
			   	<ul>
			   		<li style="overflow: auto;"><a href="../index.php"><span>Profesor(a)
			   			<?php echo $_COOKIE['usernombre'];?>
			   		</span></a></li>
			        <li class='last'><a href="indexlog.php?logout=1"><span>Salir</span></a></li>
			  	</ul>
			  </li>
			   <li class='has-sub'><a href='#'><span>Trabajos Terminales</span></a>
			      <ul>
			      	 <li><a href='altaTT.php'><span>Dar de alta</span></a></li>
			         <li><a href='listaTT.php'><span>Listado</span></a></li>
			         <li class='last'><a href='consultaTT.php'><span>Consulta</span></a></li>
			      </ul>
			   </li>
			   <li class='has-sub'><a href='#'><span>Alumnos</span></a>
			      <ul>
			         <li><a href='altaAlumno.php'><span>Dar de alta</span></a></li>
			         <li><a href='listaAlumno.php'><span>Listado</span></a></li>
			         <li class='last'><a href='consultaAlumno.php'><span>Consulta</span></a></li>
			      </ul>
			   </li>
			   <li><a href='calendario.php'><span>Calendario</span></a></li>
			   <li><a href='gestor.php'><span>Gestor de correo</span></a></li>
			   <li><a href='tesis.php'><span>Tesis</span></a></li>
			   <li class='has-sub last'><a href='#'><span>Sitios de interes</span></a>
			      <ul>
			         <li><a href='http://www.saes.upiita.ipn.mx'><span>SAES UPIITA</span></a></li>
			         <li class='last'><a href='http://www.upiita.ipn.mx'><span>UPIITA</span></a></li>
			      </ul>
			   </li>
			</ul>
		</div>
		<div id="welcome" class="container" style="width:70%; padding: 4em 0em;">
			<form class="pure-form pure-form-stacked" method="post" action="ttFunctionPost.php">
			    <fieldset>
			        <legend>Edición de perfil de alumno</legend>
			        <br>
			        <div class="pure-g">
			            <div class="pure-u-1-2">
			                <label for="nombre">Nombre</label>
			                <input id="nombre" name="nombre" type="text" style="width: 90%;">
			            </div>
			            <div class="pure-u-1-4">
			                <label for="apaterno">Apellido paterno</label>
			                <input id="apaterno" name="apaterno" type="text" style="width: 90%;">
			            </div>
			            <div class="pure-u-1-4">
			                <label for="amaterno">Apellido materno</label>
			                <input id="amaterno" name="amaterno" type="text" style="width: 90%;">
			            </div>
			        </div>
			        <br>
			        <div class="pure-g">
			            <div class="pure-u-1-4">
			                <label for="correo">Correo electr&oacute;nico</label>
			                <input id="correo" name="correo" type="email" style="width: 90%;" required>
			            </div>

			            <div class="pure-u-1-4">
			                <label for="pass">Password</label>
			                <input id="pass" name="pass" style="width: 80%;" required>
			            </div>

			        	<div class="pure-u-1-4">
			                <label for="telefono">Tel&eacute;fono</label>
			                <input id="telefono" name="telefono" type="number" style="width: 90%;">
			            </div>

			            <div class="pure-u-1-4">
			                <label for="celular">Celular</label>
			                <input id="celular" name="celular" type="number" style="width: 90%;">
			            </div>

			       	</div>
			       	<br>
			       	<input id="proceso" name="proceso" type="text" style="display:none;" value="3">
			       	<input id="id" name="id" type="text" style="display:none;">
			       	<br>
			        <input type="button" class="button-error pure-button" onclick="redirInicio();" value="Cancelar">
			        <button type="submit" class="pure-button pure-button-primary" style="width: 200px;">Guardar</button>
			    </fieldset>
			</form>
		</div>
	</div>
	<div id="footer">
		<br>
		<p>Unidad Profesional Interdisciplinaria en Ingeniería y Tecnologías Avanzadas Av. Instituto Politécnico Nacional 2580, Barrio La Laguna Ticomán, Gustavo A. Madero, 07340, México .D.F.</p>
		<p>Tels.: 57296000, ext. 56807</p>
	</div>
</body>
</html>
