<?php include("../database.php")?>
<?php
	// Inicializa la sesion
	session_start();

	error_reporting(0);
	if($_GET['logout'] == 1){
		if(isset($_SESSION['usuario'])){
			unset($_SESSION['usuario']);
			setcookie("userid", "" ,time() - 3600);
			setcookie("usercorreo", "" , time() - 3600);
			setcookie("usertipo", "" , time() - 3600);
			header('Location: ../index.php');
		}
	}

	// Redirecciona
	if (!isset($_SESSION['usuario'])) { //En caso de que ya este activa la sesion
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
	<link rel="stylesheet" href="../css/default.css">
	<link rel="stylesheet" href="../css/fonts.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900">

	<link rel="icon" type="image/png" href="../images/logo_upiita.png">


	<link rel="stylesheet" href="../css/jquery-ui-1.10.4/css/smoothness/jquery-ui.css">
	<script src="../js/jquery-2.1.0.min.js"></script>
	<script src="../js/jquery-ui.js"></script>
	<script>
    	$(function(){
    		var b = "<?php echo $_GET['status']; ?>"
    		if(b == 1)
    			alert('Se ha registrado al profesor correctamente');
    		else if (b == 2)
    			alert('Se ha eliminado al profesor correctamente');
    		else if(b == 3)
    			alert('Se ha modificado al profesor correctamente');




    		$( "#persona2" ).change(function() {
				  if (window.XMLHttpRequest)
				  {// code for IE7+, Firefox, Chrome, Opera, Safari
				  xmlhttp=new XMLHttpRequest();
				  }
				else
				  {// code for IE6, IE5
				  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				  }
				xmlhttp.onreadystatechange=function()
				  {
				  if (xmlhttp.readyState==4 && xmlhttp.status==200)
				    {
				    $("#modificar").html(xmlhttp.responseText);
				    }
				  }
				xmlhttp.open("GET","ttFunctionGet.php?profesor="+ this.value,true);
				xmlhttp.send();
			});
    	});
  	</script>
  	<style scoped>

        .button-success,
        .button-error,
        .button-warning,
        .button-secondary {
            color: white;
            border-radius: 4px;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
        }

        .button-success {
            background: rgb(28, 184, 65); /* this is a green */
        }

        .button-error {
            background: rgb(202, 60, 60); /* this is a maroon */
        }

        .button-warning {
            background: rgb(223, 117, 20); /* this is an orange */
        }

        .button-secondary {
            background: rgb(66, 184, 221); /* this is a light blue */
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
			        <li class='last'><a href="indexlog.php?logout=1"><span>Salir</span></a></li>
			  	</ul>
			  </li>
			</ul>
		</div>
		<div id="welcome" class="container" style="width:80%; padding: 4em 0em;">
			<div class="content">
				<form class="pure-form pure-form-stacked" method="post" action="ttFunctionPost.php">
				    <fieldset>
				        <legend>Dar de alta a profesor</legend>
				        <div class="pure-g">
				            <div class="pure-u-1-3">
				                <label for="nombre">Nombre</label>
				                <input id="nombre" name="nombre" style="width: 90%;" required>
				            </div>

				        	<div class="pure-u-1-3">
				                <label for="apaterno">Apellido paterno</label>
				                <input id="apaterno" name="apaterno" style="width: 90%;" required>
				            </div>

				            <div class="pure-u-1-3">
				                <label for="amaterno">Apellido materno</label>
				                <input id="amaterno" name="amaterno" style="width: 90%;" required>
				            </div>
				       	</div>
				        <div class="pure-g">
				            <div class="pure-u-1-3">
				                <label for="correo">Correo electr&oacute;nico</label>
				                <input id="correo" name="correo" type="email" style="width: 90%;" required>
				            </div>

				        	<div class="pure-u-1-3">
				                <label for="pass">Password</label>
				                <input id="pass" name="pass" style="width: 90%;" required>
				            </div>
				       	</div>
				       	<br>
				       	<input id="proceso" name="proceso" type="text" style="display:none;" value="1">

				        <button type="submit" class="pure-button pure-button-primary" style="width: 200px;">Registrar</button>
				    </fieldset>
				</form>
			</div>
			<br><br>
			<div class="content">
				<form class="pure-form pure-form-stacked" method="post" action="ttFunctionPost.php">
				    <fieldset>
				        <legend>Eliminar profesor</legend>
				        <div class="pure-g">
				            <div class="pure-u-1-3">
				                <label for="persona">Nombre</label>
			                	<select id="persona" name="persona" style="width: 90%; height: 25px; padding: 0 1em;" required>
				                	<?php
				                		echo "<option value='' disabled selected>Selecciona el profesor</option>";

				                		$con = Conectarse();
				                		$sql="SELECT id, nombre, apellidopaterno, apellidomaterno FROM profesor";

				                		$result = mysqli_query($con,$sql);

										while($row = mysqli_fetch_array($result))
										  {
										  	echo "<option value='".$row['id']."'>".$row['nombre']." ".$row['apellidopaterno']." ".$row['apellidomaterno']."</option>";
										  }

										Cerrar($con);
				                	?>
				                </select>
				            </div>
				       	</div>
				       	<br>
				       	<input id="proceso" name="proceso" type="text" style="display:none;" value="2">

				        <button type="submit" class="pure-button button-error" style="width: 200px;">Eliminar</button>
				    </fieldset>
				</form>
			</div>
			<br><br>
			<div class="content">
				<form class="pure-form pure-form-stacked" method="post" action="ttFunctionPost.php">
				    <fieldset>
				        <legend>Modificar profesor</legend>
				        <div class="pure-g">
				            <div class="pure-u-1-3">
				                <label for="persona2">Nombre</label>
			                	<select id="persona2" name="persona2" style="width: 90%; height: 25px; padding: 0 1em;" required>
				                	<?php
				                		echo "<option value='' disabled selected>Selecciona el profesor</option>";

				                		$con = Conectarse();
				                		$sql="SELECT id, nombre, apellidopaterno, apellidomaterno FROM profesor";

				                		$result = mysqli_query($con,$sql);

										while($row = mysqli_fetch_array($result))
										  {
										  	echo "<option value='".$row['id']."'>".$row['nombre']." ".$row['apellidopaterno']." ".$row['apellidomaterno']."</option>";
										  }

										Cerrar($con);
				                	?>
				                </select>
				            </div>
				       	</div>
				       	<br>
				        <div id="modificar"></div>
				       	<br>
				       	<input id="proceso" name="proceso" type="text" style="display:none;" value="3">

				        <button type="submit" class="pure-button pure-button-primary" style="width: 200px;">Guardar</button>
				    </fieldset>
				</form>
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
