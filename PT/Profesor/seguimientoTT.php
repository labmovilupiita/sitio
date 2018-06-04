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

	<link rel="stylesheet" href="../css/morris/morris-0.4.3.min.css">
	<script src="../css/morris/raphael-min.js"></script>
	<script src="../css/morris/morris-0.4.3.min.js"></script>

	<link href="../css/circliful/css/jquery.circliful.css" rel="stylesheet" type="text/css" />

	<script src="../css/circliful/js/jquery.circliful.min.js"></script>
	<script>

		function point(day, numero)
		{
			this.day = day;
			this.numero = numero;
		}

		$(function(){
			var id_ = "<?php echo $id; ?>";
			var totalAct = 0;
			$.get( "ttFunctionGet.php", { proceso: 3, id: id_} )
			  .done(function( data ) {
			  	var json = JSON.parse(data);
			  	var myPoints=new Array(); 
			  	var max = json.actividades.length + 1;
			  	var contador = 0;
			  	var fechaActual = new Date();
			  	fechaActual.setDate(fechaActual.getDate());
			  	for (var i = 0; i < json.actividades.length; i++){
			    	var obj = new point(json.actividades[i].fechaentrega, json.actividades[i].numero);
			    	myPoints[i]=obj;  

			    	var fechaComparar = new Date(json.actividades[i].fechaentrega);

			    	if(fechaActual >= fechaComparar)
			    		contador++;
			    }


			    new Morris.Line({
				  // ID of the element in which to draw the chart.
				  element: 'linealChart',
				  // Chart data records -- each entry in this array corresponds to a point on
				  // the chart.
				  data: myPoints,
				  // The name of the data record attribute that contains x-values.
				  xkey: 'day',
				  // A list of names of data record attributes that contain y-values.
				  ykeys: ['numero'],
				  ymax: [max],
				  xLabels: ['day'],
				  // Labels for the ykeys -- will be displayed when you hover over the
				  // chart.
				  labels: ['Número de reporte']
				});

			    var porcentaje = contador*100/(max-1);


			    $( "#myStat" ).attr( "data-text", porcentaje+"%" );
			    $( "#myStat" ).attr( "data-percent", porcentaje );
				 $('#myStat').circliful();


			  });
		 
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
							<legend>Seguimiento de actividades</legend>
						</fieldset>
						<div class="pure-g" style="font-size: 14px;">

						    <div class="pure-u-1-2">Titulo del TT:</div>
						    <div class="pure-u-1-2">
						    	<?

		                		$con = Conectarse();
		                		
		                		$sql="SELECT titulo FROM tt WHERE id=".$id;
								$result = mysqli_query($con,$sql);

								while($row = mysqli_fetch_array($result))
								  {

									  echo $row['titulo'];
						
								  }

								Cerrar($con);
			                	?>
			                </div>

						</div>
						<br>
						<div class="pure-g" style="font-size: 14px;">

						    <div class="pure-u-1-2">Alumnos:</div>
						    <div class="pure-u-1-2">
						    	<?

		                		$con = Conectarse();

		                		$i = 0;
		                		
		                		$sql="SELECT nombre, apellidopaterno, apellidomaterno FROM alumno WHERE id_tt=".$id;
								$result = mysqli_query($con,$sql);

								while($row = mysqli_fetch_array($result))
								  {

									  $i = $i + 1;
									  echo $row['nombre']." ".$row['apellidopaterno']." ".$row['apellidomaterno'];
									  if(mysqli_num_rows($result) > 1 && $i != mysqli_num_rows($result))
									  	echo " / ";
						
								  }

								Cerrar($con);
			                	?>
			                </div>

						</div>
						<br>
						<br>
					</form>	
				</div>
			</div>
			<div class="pure-g">
				<div class="pure-u-2-3" id="linealChart" style="height: 300px;">
					
				</div>
				<div class="pure-u-1-3" style="text-align: center;">
					<div id="myStat" data-dimension="300" data-text="" data-info="Avanzado" data-width="30" data-fontsize="38" data-percent="" data-fgcolor="#d1b630" data-bgcolor="#eee" data-fill="#ddd" data-total="200" data-part="35" data-icon="long-arrow-up" data-icon-size="28" data-icon-color="#fff" style="margin: auto 0;"></div>
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
