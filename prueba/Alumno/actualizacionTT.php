<?php include("../database.php")?>
<?php

	// Inicializa la sesion
	session_start();

	error_reporting(0);

	// Redirecciona
	if (!isset($_SESSION['usuario'])) { //En caso de que ya este activa la sesion
		header('Location: ../index.php');
	}

	if($_COOKIE['usertipo'] == 0){
		header('Location: ../index.php');
	}

	if ($_GET['status'] == 1){
		echo "<script>alert('Se ha actualizado el TT correctamente');</script>";
	}

	$id_tt = "";

	$con = Conectarse();
	
	$sql="SELECT tt.id, tt.titulo, tt.resumen, tt.tt_relacionado FROM tt, alumno WHERE alumno.id=".$_COOKIE['userid']." AND tt.id = alumno.id_tt";
	$result = mysqli_query($con,$sql);

	while($row = mysqli_fetch_array($result))
	  {
	  	  $id = $row['id'];
		  $titulo = $row['titulo'];
		  $resumen = $row['resumen'];
		  $relacionado = $row['tt_relacionado'];
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
	<link rel="stylesheet" href="../css/pure-master/src/tables/css/tables.css">
	<link rel="stylesheet" href="../css/default.css">
	<link rel="stylesheet" href="../css/fonts.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900">

	<link rel="icon" type="image/png" href="../images/logo_upiita.png">

	<link rel="stylesheet" href="../css/jquery-ui-1.10.4/css/smoothness/jquery-ui.css">
	<script src="../js/jquery-2.1.0.min.js"></script>
	<script src="../js/jquery-ui.js"></script>
	<script>
		$(function() {
			var titulo = "<?php echo $titulo; ?>";
			var resumen = "<?php echo $resumen; ?>";
			var relacionado = "<?php echo $relacionado; ?>";
			var id = "<?php echo $id; ?>";
			$("#titulo").val(titulo);
			$("#relacionado").val(relacionado);
			$("#resumen").text(resumen);
			$("#id").val(id);
		});

		function redirInicio(){
			window.location.assign("indexlog.php");
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
			   		<li style="overflow: auto;"><a href="../index.php"><span>
			   			<?php echo "Alumno: ".$_COOKIE['usernombre'];?>
			   		</span></a></li>
			        <li class='last'><a href="indexlog.php?logout=1"><span>Salir</span></a></li>
			  	</ul>
			  </li>
			   <li class='has-sub'><a href='#'><span>Trabajos Terminales</span></a>
			      <ul>
			      	<?php 
			      		$con = Conectarse();
		                		
                		$sql="SELECT tt.bandera FROM tt, alumno WHERE alumno.id =".$_COOKIE['userid']." AND alumno.id_tt = tt.id";
						$result = mysqli_query($con,$sql);
						$row = mysqli_fetch_array($result);

						if ($row['bandera'] != 5)
							echo "<li class='last'><a href='registroTT.php'><span>Registro</span></a></li>";
						else{
							echo "<li><a href='actualizacionTT.php'><span>Actualizaci&oacute;n de TT</span></a></li>";
							echo "<li class='last'><a href='actualizacionActividades.php'><span>Actualizaci&oacute;n de actividades</span></a></li>";
						}
						Cerrar($con);
			      	?>
			         
			      </ul>
			   </li>
			   <li><a href='#'><span>Mis actividades</span></a>
			   	  <ul>
			        <li><a href="calendariott.php"><span>Calendario</span></a></li>
			        <li class='last'><a href="seguimientoTT.php"><span>Seguimiento</span></a></li>
			      </ul>
			  </li>
			   <li class='has-sub'><a href='editarPerfil.php'><span>Mi perfil</span></a></li>
			   <li><a href='tesis.php'><span>Tesis</span></a></li>
			   <li class='has-sub last'><a href='#'><span>Sitios de interes</span></a>
			      <ul>
			         <li><a href='http://www.saes.upiita.ipn.mx'><span>SAES UPIITA</span></a></li>
			         <li class='last'><a href='http://www.upiita.ipn.mx'><span>UPIITA</span></a></li>
			      </ul>
			   </li>
			</ul>
		</div>
		<div id="welcome" class="container" style="width:75%; padding: 4em 0em;">
			<div class="pure-g">
				<div class="pure-u-1">
					<form class="pure-form pure-form-stacked" method="post" action="ttFunctionPost.php">
					    <fieldset>
					        <legend>Actualizaci&oacute;n de Trabajo Terminal</legend>

					        <div class="pure-g">
					            <div class="pure-u-1">
					                <label for="titulo">Titulo</label>
					                <input id="titulo" name="titulo" type="text" style="width: 100%;" required>
					            </div>
					        </div>

					        <div class="pure-g">
					            <div class="pure-u-1">
					                <label for="relacionado">TT relacionado</label>
					                <input id="relacionado" name="relacionado" type="text" style="width: 100%;">
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
			<br>
		</div>
	</div>
	<div id="footer">
		<br>
		<p>Unidad Profesional Interdisciplinaria en Ingeniería y Tecnologías Avanzadas Av. Instituto Politécnico Nacional 2580, Barrio La Laguna Ticomán, Gustavo A. Madero, 07340, México .D.F.</p>
		<p>Tels.: 57296000, ext. 56807</p>
	</div>
</body>
</html>
