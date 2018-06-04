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
					<form class="pure-form">
						<fieldset>
						<legend>Actualizaci&oacute;n de actividades</legend>
						</fieldset>
						<div class="pure-g" style="font-size: 14px;">

						    <div class="pure-u-1-2">Titulo del TT:</div>
						    <div class="pure-u-1-2">
						    	<?php

		                		$con = Conectarse();
		                		
		                		$sql="SELECT tt.id, titulo FROM tt, alumno WHERE alumno.id=".$_COOKIE['userid']." AND alumno.id_tt = tt.id";
								$result = mysqli_query($con,$sql);

								while($row = mysqli_fetch_array($result))
								  {

									  echo $row['titulo'];
									  $id_tt = $row['id'];
						
								  }

								Cerrar($con);
			                	?>
			                </div>

						</div>
						<br>
						<div class="pure-g" style="font-size: 14px;">

						    <div class="pure-u-1-2">Alumnos:</div>
						    <div class="pure-u-1-2">
						    	<?php

		                		$con = Conectarse();

		                		$i = 0;
		                		
		                		$sql="SELECT nombre, apellidopaterno, apellidomaterno FROM alumno WHERE id_tt=".$id_tt;
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
					</form>
					<br><br>
					<table id="tas" class="pure-table pure-form" style="position: relative; left: 0px; font-size:12px;">
					    <thead>
					        <tr>
					            <th width="50" align="center">#</th>
					            <th width="360" align="center">Titulo</th>
					            <th width="100" align="center">Entrega</th>
					            <th width="310" align="center">Descripci&oacute;n</th>
					            <th width="310" align="center">Resultados</th>
					            <th width="50" align="center">Acci&oacute;n</th>
					        </tr>
					    </thead>
					    <tbody id="body">
							<?php

		                		$con = Conectarse();
		                		
		                		$sql="SELECT * FROM actividad WHERE id_tt=".$id_tt;
								$result = mysqli_query($con,$sql);

								while($row = mysqli_fetch_array($result))
								  {

								  	  $fechaentrega = date("d-m-Y", strtotime($row['fechaentrega']));
									  echo "<tr id='tr_".$row['id']."'><td style='display: none;'><p id='id". $row['id']."' name='id". $row['id']."'>".$row['id']."</p></td>";
									  echo "<td id='numero".$row['id']."' class='sortnr'>".$row['numero']."</td>";
									  echo "<td id='titulo".$row['id']."'>".$row['titulo']."</td>";
									  echo "<td id='fechaentrega".$row['id']."'>".$fechaentrega."</td>";
									  echo "<td id='descripcion".$row['id']."'>".$row['descripcion']."</td>";
									  echo "<td id='resultado".$row['id']."'>".$row['resultado']."</td>";
									  echo "<td id='accion".$row['id']."'><a href='javascript: editarActividad(".$row['id'].");'><img src='../images/pencil2.png' width='20' title='Editar'></a></td></tr>";
									  $last_id = $row['id'] + 1;
						
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

	<script>
	  	function editarActividad(id){
	  		var numero = $("#numero"+id).text();
	  		var titulo = $("#titulo"+id).text();
	  		var fechaentrega = $("#fechaentrega"+id).text();
	  		var descripcion = $("#descripcion"+id).text();
	  		var resultado = $("#resultado"+id).text();

	  		//$("#numero"+id).html("<input type='number' id='numero_i"+id+"' name='numero"+id+"' value='"+numero+"' style='width: 100%' required>");
	  		$("#titulo"+id).html("<input type='text' id='titulo_i"+id+"' name='titulo"+id+"' value='"+titulo+"' style='width: 100%'>");
	  		$("#fechaentrega"+id).html("<input type='text' id='fechaentrega_i"+id+"' name='fechaentrega"+id+"' class='fecha' value='"+fechaentrega+"' style='width: 100%'>");
	  		$("#descripcion"+id).html("<textarea id='descripcion_i"+id+"' name='descripcion"+id+"' rows='5' style='width: 100%'>"+descripcion+"</textarea>");
	  		$("#resultado"+id).html("<textarea id='resultado_i"+id+"' name='resultado"+id+"' style='width: 100%' rows='5'>"+resultado+"</textarea>");
	  		$("#accion"+id).html("<a href='javascript: guardarActividad("+id+");'><img src='../images/save.png' width='25' title='Guardar'></a>");

	  		initDP();

	  	}

	  	function guardarActividad(id){
	  		//var numero_ = $("#numero_i"+id).val();
	  		var titulo_ = $("#titulo_i"+id).val();
	  		var fechaentrega_ = $("#fechaentrega_i"+id).val();
	  		var descripcion_ = $("#descripcion_i"+id).val();
	  		var resultado_ = $("#resultado_i"+id).val();
	  		var id_ = id;

	  		$.post( "ttFunctionPost.php", { proceso: 3, id: id_, titulo: titulo_, fechaentrega: fechaentrega_, descripcion: descripcion_, resultado:resultado_ })
			  .done(function(data) {
			    alert("Se ha actualizado correctamente la actividad");
			    regenerarActividad(id);
			  });
			  sortTable();
	  	}

	  	function regenerarActividad(id){
	  		//var numero = $("#numero_i"+id).val();
	  		var titulo = $("#titulo_i"+id).val();
	  		var fechaentrega = $("#fechaentrega_i"+id).val();
	  		var descripcion = $("#descripcion_i"+id).val();
	  		var resultado = $("#resultado_i"+id).val();

	  		//$("#numero"+id).html(numero);
	  		$("#titulo"+id).html(titulo);
	  		$("#fechaentrega"+id).html(fechaentrega);
	  		$("#descripcion"+id).html(descripcion);
	  		$("#resultado"+id).html(resultado);
	  		$("#accion"+id).html("<a href='javascript: editarActividad("+id+");'><img src='../images/pencil2.png' width='20' title='Editar'></a>");
	  	}


		function initDP(){
			$( ".fecha" ).datepicker({ dateFormat: "dd-mm-yy" });
			$( ".fecha" ).datepicker( "option", "monthNames", [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ] );
		    $( ".fecha" ).datepicker( "option", "dayNamesMin", [ "Do", "Lu", "Ma", "Mie", "Ju", "Vie", "Sa" ] );
		}

		function sortTable(){
		    var tbl = document.getElementById("tas").tBodies[0];
		    var store = [];
		    for(var i=0, len=tbl.rows.length; i<len; i++){
		        var row = tbl.rows[i];
		        var sortnr = parseFloat(row.cells[1].textContent || row.cells[1].innerText);
		        if(!isNaN(sortnr)) store.push([sortnr, row]);
		    }
		    store.sort(function(x,y){
		        return x[0] - y[0];
		    });
		    for(var i=0, len=store.length; i<len; i++){
		        tbl.appendChild(store[i][1]);
		    }
		    store = null;
		}

		$(function(){
			sortTable();
		});
	</script>
</body>
</html>
