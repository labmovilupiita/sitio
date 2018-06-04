<?php include("../database.php")?>
<?php
	$proceso = $_POST['proceso'];

	function actualizarPerfil(){
		$con = Conectarse();
	                		
	    $sql = "UPDATE alumno SET nombre='".$_POST['nombre']."', apellidopaterno='".$_POST['apaterno']."', apellidomaterno='".$_POST['amaterno']."', correo='".$_POST['correo']."', password='".$_POST['pass']."', telefono='".$_POST['telefono']."', celular='".$_POST['celular']."' WHERE id=".$_POST['id'];
  		mysqli_query($con, $sql);
  		Cerrar($con);

  		setcookie("usernombre", "", time()-3600);
		setcookie("usercorreo", "", time()-3600);

  		setcookie("usernombre", $_POST['nombre']." ".$_POST['apaterno']." ".$_POST['amaterno'], 0);
		setcookie("usercorreo", $_POST['correo'], 0);

  		header( 'Location: editarPerfil.php?status=1' ) ;
	}
	
	function registrarTT(){

		$con = Conectarse();

		//Actualizacion
		$inicial = date("Y-m-d", strtotime($_POST['inicial']));
		$final = date("Y-m-d", strtotime($_POST['final']));

	    $sql = "UPDATE tt SET titulo='".$_POST['titulo']."', resumen='".$_POST['resumen']."', fechainicial='".$inicial."', fechafinal='".$final."', tt_relacionado='".$_POST['relacionado']."', totalreportes=".$_POST['total'].", bandera=5 WHERE id=".$_POST['id'];

		if (!mysqli_query($con,$sql))
		  {
		  	die('Error: ' . mysqli_error($con));
		  }

		//Insersion de reportes

		for($i=1;$i<=$_POST['total'];$i++){
			//Conversion de fechas
			$fecha = date("Y-m-d", strtotime($_POST['i_'.$i]));
			//Insertar
			$sql = "INSERT INTO actividad (fechaentrega, numero, id_tt) VALUES ('".$fecha."',".$i.",".$_POST['id'].")";

			if (!mysqli_query($con,$sql))
			  {
			  	die('Error: ' . mysqli_error($con));
			  }

		}


		Cerrar($con);

		header( 'Location: indexlog.php?status=2' ) ;
	}


	function actualizarActividad(){
		$con = Conectarse();
	                		
	    $fecha = date("Y-m-d", strtotime($_POST['fechaentrega']));
	    $sql = "UPDATE actividad SET titulo='".$_POST['titulo']."', fechaentrega='".$fecha."', descripcion='".$_POST['descripcion']."', resultado='".$_POST['resultado']."' WHERE id=".$_POST['id'];
  		mysqli_query($con, $sql);
  		Cerrar($con);

  		header( 'Location: indexlog.php?status=1' ) ;
	}

	function actualizarTT(){
		$con = Conectarse();        		
	    $sql = "UPDATE tt SET titulo='".$_POST['titulo']."', tt_relacionado='".$_POST['relacionado']."', resumen='".$_POST['resumen']."' WHERE id=".$_POST['id'];
  		mysqli_query($con, $sql);
  		Cerrar($con);		

  		header( 'Location: actualizacionTT.php?status=1' ) ;
	}


	switch($proceso){
		case 1:
			actualizarPerfil();
		break;
		case 2: 
			registrarTT();
		break;
		case 3:
			actualizarActividad();
		break;
		case 4:
			actualizarTT();
		break;
	}
?>