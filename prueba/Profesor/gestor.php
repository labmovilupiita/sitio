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
	<link rel="stylesheet" href="../css/pure-master/src/grids/css/grids-min.css">
	<link rel="stylesheet" href="../css/pure-master/src/tables/css/tables.css">
	<link rel="stylesheet" href="../css/default.css">
	<link rel="stylesheet" href="../css/fonts.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900">

	<link rel="icon" type="image/png" href="../images/logo_upiita.png">

	<script src="../js/jquery-2.1.0.min.js"></script>

    <script>
	    $(function(){
	    	var bandera = 0;
	    	var cadena = "";
	    	$(".se").change(function(){
	    		var contador = 0;
	    		$('.'+$(this).attr('class').split(' ')[0]+':checked').each(function() {
	    			contador++;
				    if(contador == $('.'+$(this).attr('class').split(' ')[0]).length){
				    	var c = $(this).attr('class').split(' ')[0].replace("cc_", "");
				    	$('#'+c).prop('checked', true);
				    }
				    else{
				    	var c = $(this).attr('class').split(' ')[0].replace("cc_", "");
				    	$('#'+c).prop('checked', false);
				    }
				});
	    		cadena = $("#destinatario").val();
	    		if (this.checked){
	    			if($("#destinatario").val() != ""){
	    				cadena += ",";
	    				bandera = 1;
	    			}
	    			$("#destinatario").val(cadena + this.value);
	    		}
	    		else{
	    			if(bandera == 1){
	    				cadena = cadena.replace(","+this.value,"");
	    				if(cadena.indexOf(this.value) == 0)
	    					cadena = cadena.replace(this.value,"");
	    				if(cadena.indexOf(",") < 0)
	    					bandera = 0;
	    			}
	    			else if(cadena.indexOf(",") < 0){
	    				cadena = "";
	    			}
	    			if(cadena.indexOf(",") == 0)
	    				cadena = cadena.substring(1, cadena.length);
	    			$("#destinatario").val(cadena);

	    		}
			});
			$(".pr").click(function(){
	    		if (this.checked){
	    			$('.cc_'+this.id).prop('checked', true);
	    		}
	    		else{
	    			$('.cc_'+this.id).prop('checked', false);
	    		}
	    		$('.cc_'+this.id).trigger('change');
			});
	    });
  	</script>
  	 <script>
    	$(function(){
    		var b = "<?php echo $_GET['status']; ?>"
    		if(b == 1)
    			alert('Correo enviado con éxito');
    		else if(b == 2){
    			var e = "<?php echo $_GET['error']; ?>"
    			alert('Error: '+e+' Intente de nuevo');
    		}
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
		<div id="welcome" class="container" style="width:90%; padding: 4em 0em;">
			<form class="pure-form">
				<fieldset>
					<legend>Gestor de correo electr&oacute;nico</legend>
				</fieldset>
			</form>
			<div class="pure-g">
				<div class="pure-u-3-5">
					<table class="pure-table" style="position: relative; left: 0px; font-size:12px;">
					    <thead>
					        <tr>
					            <th width="200" align="center" data-sort="string">Trabajo terminal</th>
					            <th width="20" align="center">Selecci&oacute;n por TT</th>
					            <th width="180" align="center">Alumnos</th>
					            <th width="20" align="center">Selecci&oacute;n individual</th>
					        </tr>
					    </thead>
					    <tbody id="body">
							<?

		                		$con = Conectarse();
		                		
		                		$sql="SELECT * FROM tt WHERE id_profesor = ".$_COOKIE['userid'];
								$result = mysqli_query($con,$sql);

								$cont = 0;

								while($row = mysqli_fetch_array($result))
								  {

									  echo "<tr><td style='display: none;'><p id='id".$row['id']."' name='id". $row['id']."'>".$row['id']."</p></td>";
									  echo "<td>".$row['titulo']."</td>";
									  echo "<td><input class='pr' id='".$row['id']."' type='checkbox'></td>";

								

									  $sql1="SELECT correo, nombre, apellidopaterno, apellidomaterno FROM alumno WHERE id_tt = '".$row['id']."'";
									  $result1 = mysqli_query($con,$sql1);

									  echo "<td>";

									  $cont = 0;
									  $stack = array();

									  while($row1 = mysqli_fetch_array($result1)){
									  	echo "<p style='margin: 0px;'>".$row1['nombre']." ".$row1['apellidopaterno']." ".$row1['apellidomaterno']."</p><br>";
									  	$cont = $cont + 1;
									  	array_push($stack, $row1['correo']);
									  }
									  echo "</td><td>";


									  for($i = 0; $i < $cont; $i++) {
									  	echo "<p style='margin: 0px;'><input class='cc_".$row['id']." se' type='checkbox' value='".$stack[$i]."'></p><br>";
									  }

									  echo "</td></tr>";
						
								  }

								Cerrar($con);
			                ?>
					    </tbody>
					</table>
				</div>
				<div class="pure-u-2-5">
					<form class="pure-form pure-form-stacked" method="post" action="email.php" style="position: relative; left: 30px;">
						<div class="pure-g">
				            <div class="pure-u-1">
				                <label for="destinatario">Para</label>
				                <input id="destinatario" name="destinatario" type="text" style="width: 90%;" required>
				            </div>
				       	</div>
				       	<div class="pure-g">
				            <div class="pure-u-1">
				                <label for="asunto">Asunto</label>
				                <input id="asunto" name="asunto" type="text" style="width: 90%;" required>
				            </div>
				       	</div>
				       	<div class="pure-g">
				            <div class="pure-u-1">
				                <label for="contenido">Contenido</label>
				                <textarea id="contenido" name="contenido" style="width: 90%; height: 150px;" required></textarea>
				            </div>
				       	</div>
				       	<div class="pure-g">
				            <div class="pure-u-1-2">
				                <label for="remitente">Email remitente</label>
				                <input type="text" id="remitente" name="remitente" style="width: 90%;" required>
				            </div>
				            <div class="pure-u-1-2">
				                <label for="pass">Contraseña</label>
				                <input type="password" id="pass" name="pass" style="width: 80%;" required>
				            </div>
				       	</div>
				       	<br>
				       	<input id="proceso" name="proceso" type="text" style="display:none;" value="8">

			        	<button type="submit" class="pure-button pure-button-primary">Enviar</button>
				    </form>
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
