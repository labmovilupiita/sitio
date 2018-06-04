<?php include("../database.php")?>
<?php

	// Inicializa la sesion
	session_start();

	error_reporting(0);

	// Redirecciona
	if (!isset($_SESSION['usuario'])) { //En caso de que no este activa la sesion
		header('Location: index.php');
	}
	if($_COOKIE['usertipo'] == 1){
		header('Location: ../index.php');
	}
	if ($_GET['status'] == 1){
		echo "<script>alert('Se ha registrado el TT correctamente');</script>";
	}

	$id = $_GET['id'];

	$con = Conectarse();
	
	$sql="SELECT id, titulo, resumen, fechainicial, fechafinal, tt_relacionado FROM tt WHERE id=".$id;
	$result = mysqli_query($con,$sql);

	while($row = mysqli_fetch_array($result))
	  {

		  $titulo = $row['titulo'];
		  $resumen = $row['resumen'];
		  $relacionado = $row['tt_relacionado'];
		  $fechainicial = date("d-m-Y", strtotime($row['fechainicial']));
		  $fechafinal = date("d-m-Y", strtotime($row['fechafinal']));

		  if($row['fechafinal'] == ''){
			$fechainicial = "";
			$fechafinal = "";
		  }
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
			initDP();
			var titulo = "<?php echo $titulo; ?>";
			var resumen = "<?php echo $resumen; ?>";
			var relacionado = "<?php echo $relacionado; ?>";
			var inicial = "<?php echo $fechainicial; ?>";
			var finall = "<?php echo $fechafinal; ?>";
			var id = "<?php echo $id; ?>";
			$("#titulo").val(titulo);
			$("#relacionado").val(relacionado);
			$("#inicial").val(inicial);
			$("#final").val(finall);
			$("#resumen").text(resumen);
			$("#id").val(id);
		});
		function redirInicio(){
			window.location.assign("listaTT.php");
		}
		function initDP(){
			$( ".fecha" ).datepicker({ dateFormat: "dd-mm-yy" });
			$( ".fecha" ).datepicker( "option", "monthNames", [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ] );
		    $( ".fecha" ).datepicker( "option", "dayNamesMin", [ "Do", "Lu", "Ma", "Mie", "Ju", "Vie", "Sa" ] );
		}
	</script>
	<style>
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
	 			<h1><a href="index.php">Trabajo Terminal</a></h1>
				<span><a href="index.php">Registro de trabajos terminales</a></span>
			</div>
			<img src="../images/logo_upiita.png" id="logoupiita" width="150" height="150" alt="img" />
		</div>
	</div>
	<div id="wrapper1">
		<div id='cssmenu'>
			<ul>
			   <li><a href='../index.php'><span>Inicio</span></a>
			   		<ul>
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
			        <legend>Edici&oacute;n de Trabajo Terminal</legend>

			        <div class="pure-g">
			            <div class="pure-u-1">
			                <label for="titulo">Titulo</label>
			                <input id="titulo" name="titulo" type="text" style="width: 100%;" required>
			            </div>
			        </div>

			        <div class="pure-g">
			            <div class="pure-u-1-2">
			                <label for="relacionado">TT relacionado</label>
			                <input id="relacionado" name="relacionado" type="text" style="width: 95%;">
			            </div>
			            <div class="pure-u-1-4">
			                <label for="inicial">Fecha de registro</label>
			                <input id="inicial" name="inicial" class="fecha" type="text" style="width: 95%;">
			            </div>
			            <div class="pure-u-1-4">
			                <label for="final">Fecha final</label>
			                <input id="final" name="final"  class="fecha" type="text" style="width: 100%;">
			            </div>

			       	</div>

			       	<div class="pure-g">
			       		 <div class="pure-u-1">
			                <label for="resumen">Resumen</label>
			                <textarea id="resumen" name="resumen" style="width: 100%; height: 200px;"></textarea>
			            </div>
			       	</div>
			       	<br>

			       	<input id="proceso" name="proceso" type="text" style="display:none;" value="4">
			       	<input id="id" name="id" type="text" style="display:none;">

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