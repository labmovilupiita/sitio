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
    		var b = "<?php echo $_GET['status']; ?>"
    		if(b == 1)
    			alert('Se ha actualizado el TT correctamente');
    		else if(b == 2)
    			alert('Se ha registrado el TT correctamente');
    	});
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
		<div id="welcome" class="container" style="width:75%; padding: 4em 0em;">
			<div class="pure-g">
				<div class="pure-u-1">
					<form class="pure-form">
						<fieldset>
						<legend>Lista de Trabajos Terminales</legend>
						</fieldset>
					</form>
					<table class="pure-table" style="position: relative; left: 10px; font-size:12px;">
					    <thead>
					        <tr>
					            <th width="200" align="center" data-sort="string">Titulo</th>
					            <th width="105" align="center" data-sort="string">Fecha de registro</th>
					            <th width="105" align="center" data-sort="string">Fecha final</th>
					            <th width="20" align="center">Total de reportes</th>
					            <th width="300" align="center">Alumnos</th>
					            <th width="40" align="center">Acci&oacute;n</th>
					        </tr>
					    </thead>
					    <tbody id="body">
							<?php

		                		$con = Conectarse();
		                		
		                		$sql="SELECT id, titulo, fechainicial, fechafinal, totalreportes FROM tt WHERE id_profesor = ".$_COOKIE['userid']." GROUP BY tt.id;";
								$result = mysqli_query($con,$sql);

								while($row = mysqli_fetch_array($result))
								  {
								  	  $inicial = date("d-m-Y", strtotime($row['fechainicial']));
				  					  $final = date("d-m-Y", strtotime($row['fechafinal']));
				  					  
									  echo "<tr><td style='display: none;'><p id='id".$row['id']."' name='id". $row['id']."'>".$row['id']."</p></td>";
									  echo "<td>".$row['titulo']."</td>";
									  if($row['fechafinal'] != ''){
										  echo "<td>".$inicial."</td>";
										  echo "<td>".$final."</td>";
										}
									  else{
									  	echo "<td></td>";
										  echo "<td></td>";
									  }
									  echo "<td>".$row['totalreportes']."</td>";

									  $sql1="SELECT nombre, apellidopaterno, apellidomaterno, correo FROM alumno WHERE id_tt = ".$row['id'];
									  $result1 = mysqli_query($con,$sql1);

									  echo "<td>";

									  while($row1 = mysqli_fetch_array($result1)){
									  	echo $row1['nombre']." ".$row1['apellidopaterno']." ".$row1['apellidomaterno']." [". $row1['correo']."]<br>";

									  }
									  echo "</td>";

									  echo "<td><a href='edicionTT.php?id=".$row['id']."'><img src='../images/pencil2.png' width='25' title='Editar'></a></td></tr>";
						
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
