<?php include("../database.php")?>
<?php

	// Inicializa la sesion
	session_start();

	$bienvenida = "";
	$sesion = "";

	error_reporting(0);

	if($_GET['logout'] == 1){
		if(isset($_SESSION['usuario'])){
			unset($_SESSION['usuario']);
			setcookie("userid", "" , time()-3600);
			setcookie("usernombre", "" , time()-3600);
			setcookie("usercorreo", "" , time()-3600);
			setcookie("usertipo", "" , time()-3600);
			header('Location: ../index.php');
		}
	}

	if($_COOKIE['usertipo'] == 0){
		header('Location: ../index.php');
	}

	// Redirecciona
	if (isset($_SESSION['usuario'])) { //En caso de que ya este activa la sesion
		$bienvenida = "Bienvenido alumno tesista: <b>" . $_COOKIE['usernombre'] . "</b>";
		$sesion = "Cerrar sesi&oacute;n";
	}
	else{
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
		<div id="welcome" class="container">
			<div class="title">
				<h2><?php echo $bienvenida ?></h2>
				<span class="byline">Puedes navegar y disfrutar de las funciones en la barra de navegación.</span>
			</div>
			<div class="content">
				<img src="../images/logo_upiita.png" id="ii" width="500" alt="img" />
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
