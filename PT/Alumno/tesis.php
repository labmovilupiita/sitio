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
	<link rel="stylesheet" href="../css/pure-master/src/tables/css/tables.css">
	<link rel="stylesheet" href="../css/pure-master/src/grids/css/grids-min.css">
	<link rel="stylesheet" href="../css/default.css">
	<link rel="stylesheet" href="../css/fonts.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900">

	<link rel="icon" type="image/png" href="../images/logo_upiita.png">

	<script src="../js/jquery-2.1.0.min.js"></script>

  	<script>
    	$(function(){
    		var b = "<?php echo $_GET['status']; ?>";
    		if(b == 1)
    			alert('Se ha cargado la tesis correctamente');
    		else if(b == 2)
    			alert('Ya existe una tesis con ese nombre de archivo');
    		else if(b == 3){
    			var b = "<?php echo $_GET['error']; ?>"
    			alert("No se cargo el archivo correctamente. Error: " + b);
    		}

    	});

    	function red(id){

    		$.get("ttFunctionGet.php",{proceso: 4} ).done(function(data){
    			//alert(data);
			  	var json = JSON.parse(data);
			  	var url;

			  	for (var i = 0; i < json.tesis.length; i++){

			  		if(json.tesis[i].id == id){
			    		url = json.tesis[i].url;
			    		break;
			    	}
			    }

			    window.open("../Tesis/"+url, "", "width=750, height=600");
			});
    	}
  	</script>
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
			<form class="pure-form pure-form-stacked" method="post" action="../tesisUpload.php" enctype="multipart/form-data">
			    <fieldset>
			        <legend style="font-size: 18px;">Carga de tesis</legend>
			        <div class="pure-g">
			            <div class="pure-u-1-2">
			                <label for="file">Selecciona el archivo a cargar (Max. 30 MB)</label>
			                <input id="file" name="file" type="file" style="width: 100%;" required>
			            </div>
			       	</div>
			       	<br>
			       	<input id="proceso" name="proceso" type="text" style="display:none;" value="9">

			        <button type="submit" class="pure-button pure-button-primary" style="width: 200px;">Cargar archivo</button>
			    </fieldset>
			</form>
			<br><br>
			<div class="pure-g">
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
							<?

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
										  echo "<td><a href='javascript: red(".$row['id'].");'><img src='../images/arrow_stop_down.png' width='40' title='Descargar'></a></td></tr>";
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
										echo "<td><a href='javascript: red(".$row['id'].");'><img src='../images/arrow_stop_down.png' width='40' title='Descargar'></a></td></tr>";

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
