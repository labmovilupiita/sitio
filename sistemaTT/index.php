<?php include("database.php")?>
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
	<link rel="stylesheet" href="css/pure-master/src/grids/css/grids-min.css">
	<link rel="stylesheet" href="css/pure-master/src/tables/css/tables.css">

	<link rel="stylesheet" href="css/jquery-ui-1.10.4/css/smoothness/jquery-ui.css">
	<script src="js/jquery-2.1.0.min.js"></script>
	<script src="js/jquery-ui.js"></script>

	<link rel="stylesheet" href="css/default.css">
	<link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900">

	<link rel="icon" type="image/png" href="images/logo_upiita.png">

	<script>
		function desplegarTTs(){
			$("#tabla").show();
			$( "#tabla" ).effect( "bounce", "slow" );
		}

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
				<li><a href='indexsign.php'><span>Sesión</span></a></li>
			</ul>
		</div>
		<div id="welcome" class="container">
			<div class="title">
				<h2>¡Bienvenido!</h2>
				<span class="byline">Presiona el botón para desplegar la lista de Trabajos Terminales.</span>
				<br><br>
				<button onclick="desplegarTTs()" class="pure-button pure-button-primary">Desplegar TT's</button>
			</div>
			<div id="tabla" class="pure-g" style="width: 80%; margin: 0 auto; display: none;">
				<div class="pure-u-1">
					<form class="pure-form">
						<fieldset>
						<legend>Descarga de tesis</legend>
						</fieldset>
					</form>
					<table class="pure-table" style="position: relative; left: 40px; font-size:12px;">
					    <thead>
					        <tr>
					            <th width="300" align="center" data-sort="string">Titulo</th>
					            <th width="300" align="center" data-sort="string">Asesores</th>
					            <th width="100" align="center" data-sort="string">Fecha</th>
					            <th width="70" align="center">Descargar</th>
					        </tr>
					    </thead>
					    <tbody id="body">
							<?php

		                		$con = Conectarse();
		                		
		                		$sql="SELECT * FROM tesis";
								$resultx = mysqli_query($con,$sql);

								while($row = mysqli_fetch_array($resultx))
								  {
				  					  if($row['bandera'] == 0){
				  					  	$fecha = date("d-m-Y", strtotime($row['fecha']));
				  					  	  if($row['fecha'] == ''){
											  $fecha = "";
											}
				  					  	  echo "<tr><td style='display: none;'><p id='id".$row['id']."' name='id". $row['id']."'>".$row['id']."</p></td>";
										  echo "<td>".$row['titulo']."</td>";
										  echo "<td>".$row['asesor']."</td>";
										  echo "<td>".$fecha."</td>";
										  echo "<td><a href='javascript: red(".$row['id'].");'><img src='images/arrow_stop_down.png' width='40' title='Descargar'></a></td></tr>";
				  					  }
				  					  else{
				  					  	echo "<tr><td style='display: none;'><p id='id".$row['id']."' name='id". $row['id']."'>".$row['id']."</p></td>";
				  				 	  	$sql="SELECT titulo, fechafinal, id_profesor FROM tt WHERE id = ".$row['id_tt'];
										$result = mysqli_query($con,$sql);
										$row1 = mysqli_fetch_array($result);
										$fecha = date("d-m-Y", strtotime($row1['fechafinal']));
				  				 	  	  if($row1['fechafinal'] == ''){
										 	  $fecha = "";
										 	}
										echo "<td>".$row1['titulo']."</td>";
										$sql="SELECT nombre, apellidopaterno, apellidomaterno FROM profesor WHERE id = ".$row1['id_profesor'];
										$result = mysqli_query($con,$sql);
										$row2 = mysqli_fetch_array($result);
										echo "<td>".$row2['nombre']." ".$row2['apellidopaterno']." ".$row2['apellidomaterno']."</td>";
										echo "<td>".$fecha."</td>";
										echo "<td><a href='javascript: red(".$row['id'].");'><img src='images/arrow_stop_down.png' width='40' title='Descargar'></a></td></tr>";

				  					  }
									  
						
								  }

								Cerrar($con);
			                ?>
					    </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div id="footer">
		<br>
		<p>Unidad Profesional Interdisciplinaria en Ingeniería y Tecnologías Avanzadas Av. Instituto Politécnico Nacional 2580, Barrio La Laguna Ticomán, Gustavo A. Madero, 07340, México .D.F.</p>
		<p>Tels.: 57296000, ext. 56807</p>
	</div>
</body>
</html>
