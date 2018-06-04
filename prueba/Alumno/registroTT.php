<?php include("../database.php")?>
<?php

	// Inicializa la sesion
	session_start();

	error_reporting(0);

	// Redirecciona
	if (!isset($_SESSION['usuario'])) { //En caso de que no este activa la sesion
		header('Location: ../index.php');
	}

	if($_COOKIE['usertipo'] == 0){
		header('Location: ../index.php');
	}

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
	<link rel="stylesheet" href="../css/default.css">
	<link rel="stylesheet" href="../css/fonts.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900">

	<link rel="icon" type="image/png" href="../images/logo_upiita.png">

	<link rel="stylesheet" href="../css/jquery-ui-1.10.4/css/smoothness/jquery-ui.css">
	<script src="../js/jquery-2.1.0.min.js"></script>
	<script src="../js/jquery-ui.js"></script>
	<script>
		$(function() {
			initDP(); //Inicializa datepicker
			var titulo = "<?php echo $titulo; ?>";
			var resumen = "<?php echo $resumen; ?>";
			var relacionado = "<?php echo $relacionado; ?>";
			var id = "<?php echo $id; ?>";
			$("#titulo").val(titulo);
			$("#relacionado").val(relacionado);
			$("#resumen").text(resumen);
			$("#id").val(id);
		});

		function initDP(){
			$( ".fecha" ).datepicker({ dateFormat: "dd-mm-yy" });
			$( ".fecha" ).datepicker( "option", "monthNames", [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ] );
		    $( ".fecha" ).datepicker( "option", "dayNamesMin", [ "Do", "Lu", "Ma", "Mie", "Ju", "Vie", "Sa" ] );
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
			   <li><a href='calendario.php'><span>Calendario</span></a></li>
			   <li class='has-sub'><a href='editarPerfil.php'><span>Mi perfil</span></a></li>
			   <li><a href='tesis.php'><span>Tesis</span></a></li>
			   <li class='has-sub last'><a href='sitios.php'><span>Sitios de interes</span></a>
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
			        <legend>Registro de Trabajo Terminal</legend>
			        <div class="pure-g">
			            <div class="pure-u-1-2">
			                <label for="titulo">Titulo</label>
			                <input id="titulo" name="titulo" type="text" style="width: 95%;" required>
			            </div>
			            <div class="pure-u-1-2">
			                <label for="relacionado">TT relacionado</label>
			                <input id="relacionado" name="relacionado" type="text" style="width: 95%;">
			            </div>
			        </div>
			        <div class="pure-g">
			        	<div class="pure-u-1-3">
			                <label for="inicial">Fecha de registro</label>
			                <input id="inicial" name="inicial" class="fecha" type="text" style="width: 95%;" required>
			            </div>
			            <div class="pure-u-1-3">
			                <label for="final">Fecha final</label>
			                <input id="final" name="final" class="fecha" type="text" style="width: 95%;" required>
			            </div>
			            <div class="pure-u-1-3">
			                <label for="total">Total de reportes</label>
			                <input id="total" name="total" type="number" style="width: 93%;" min="1" max="20" step="1" value="1" required>
			            </div>
			       	</div>
			       	<div class="pure-g">
			       		 <div class="pure-u-2-3">
			                <label for="resumen">Resumen</label>
			                <textarea id="resumen" name="resumen" style="width: 95%; height: 200px;"></textarea>
			            </div>
			            <div class="pure-u-1-3">
			            	<label for="reportes">Reportes</label>
			            	<div style="height: 200px;overflow:auto;">
				            	<table style="width:100%;" align="center" id="reportes" class="pure-table">
								    <thead>
								        <tr>
								            <th width="20%">#</th>
								            <th width="80%">Fecha de entrega</th>
								        </tr>
								    </thead>
								    <tbody id="tb">
								        <tr id="tr_1">
								            <td>1</td>
								            <td><input id="i_1" name="i_1" class="fecha" style="margin: 0 auto; width: 50%;" type="text" required></td>
								        </tr>
								    </tbody>
								</table>
							</div>
			            </div>
			       	</div>
			       	<br>

			       	<input id="proceso" name="proceso" type="text" style="display:none;" value="2">
			       	<input id="id" name="id" type="text" style="display:none;">

			        <button type="submit" class="pure-button pure-button-primary">Registrar</button>
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
<script>
	//Inserta reportes
	var contador = 1;
	$( "#total" ).change(function() {
		if($("#total").val() == 0)
			return;
		if($("#total").val() == (contador+1) ){
			contador++;
	  		$("#tb").append('<tr id="tr_'+contador+'"><td>'+contador+'</td><td><input id="i_'+contador+'" name="i_'+contador+'" class="fecha" style="margin: 0 auto; width: 50%;" type="text" required></td></tr>');
		}
		else if($("#total").val() == (contador-1)){
			$("#tr_"+contador).remove();
			contador--;
		}
		else{
			contador = 0;
			var cadena = "";
			while(contador < $("#total").val()) {
				contador++;
				cadena += '<tr id="tr_'+contador+'"><td>'+contador+'</td><td><input id="i_'+contador+'" name="i_'+contador+'" class="fecha" style="margin: 0 auto; width: 50%;" type="text" required></td></tr>';
				$("#tb").html(cadena);
				if(contador == 20)
					break;
			}
		}
		initDP();
	});
</script>
</html>
