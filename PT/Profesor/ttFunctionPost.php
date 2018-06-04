<?php include("../database.php")?>
<?php
	$proceso = $_POST['proceso'];

	function darAltaAlumno(){
		$con = Conectarse();
		$sql = "INSERT INTO alumno (correo, password, id_tt, id_profesor) VALUES ('$_POST[correo]','$_POST[pass]','$_POST[tt]','$_COOKIE[userid]')";


		if (!mysqli_query($con,$sql))
		  {
		  	die('Error: ' . mysqli_error($con));
		  }

		Cerrar($con);

		header( 'Location: listaAlumno.php?status=2' ) ;
	}

	function darAltaTT(){
		$con = Conectarse();
		$sql = "INSERT INTO tt (titulo, id_profesor) VALUES ('$_POST[titulo]',$_COOKIE[userid])";


		if (!mysqli_query($con,$sql))
		  {
		  	die('Error: ' . mysqli_error($con));
		  }

		Cerrar($con);

		header( 'Location: listaTT.php?status=2' ) ;
	}

	function actualizarAlumno(){
		$con = Conectarse();
	                		
	    $sql = "UPDATE alumno SET nombre='".$_POST['nombre']."', apellidopaterno='".$_POST['apaterno']."', apellidomaterno='".$_POST['amaterno']."', correo='".$_POST['correo']."', password='".$_POST['pass']."', telefono='".$_POST['telefono']."', celular='".$_POST['celular']."' WHERE id=".$_POST['id'];
  		mysqli_query($con, $sql);
  		Cerrar($con);

  		header( 'Location: listaAlumno.php?status=1' ) ;
	}

	function actualizarTT(){
		$con = Conectarse();   
		$fechainicial = date("Y-m-d", strtotime($_POST['inicial']));
		$fechafinal = date("Y-m-d", strtotime($_POST['final']));     		
	    $sql = "UPDATE tt SET titulo='".$_POST['titulo']."', tt_relacionado='".$_POST['relacionado']."', resumen='".$_POST['resumen']."', fechainicial='".$fechainicial."', fechafinal='".$fechafinal."' WHERE id=".$_POST['id'];
  		mysqli_query($con, $sql);
  		Cerrar($con);		

  		header( 'Location: listaTT.php?status=1' ) ;
	}

	function actualizarActividad(){
		$con = Conectarse();
	                		
	    $fecha = date("Y-m-d", strtotime($_POST['fechaentrega']));
	    $sql = "UPDATE actividad SET numero=".$_POST['numero'].", titulo='".$_POST['titulo']."', fechaentrega='".$fecha."', descripcion='".$_POST['descripcion']."', resultado='".$_POST['resultado']."' WHERE id=".$_POST['id'];
  		mysqli_query($con, $sql);
  		Cerrar($con);
	}

	function guardarActividad(){
		$con = Conectarse();
	                		
	    $fecha = date("Y-m-d", strtotime($_POST['fechaentrega']));
	    $sql = "INSERT INTO actividad (numero, titulo, fechaentrega, descripcion, resultado, id_tt) VALUES ('$_POST[numero]','$_POST[titulo]','".$fecha."','$_POST[descripcion]','$_POST[resultado]','$_POST[id_tt]')";
  		mysqli_query($con, $sql);
  		Cerrar($con);
	}

	function eliminarActividad(){
		$con = Conectarse();
	                		
	    $sql = "DELETE FROM actividad WHERE id=".$_POST['id'];
  		mysqli_query($con, $sql);
  		Cerrar($con);

	}

	function enviarCorreo(){
		$para      = $_POST['destinatario'];
		$titulo = $_POST['asunto'];
		$mensaje = $_POST['contenido'];

		$de = $_COOKIE["usernombre"]." <".$_COOKIE["usercorreo"].">";


		Cerrar($con);

		$cabeceras = 'From: '. $de . "\r\n" .'X-Mailer: PHP/' . phpversion(); //X-Mailer opcional

		$status = mail($para, $titulo, $mensaje, $cabeceras);

		header( 'Location: gestor.php?status='. $status) ;
	}

	switch($proceso){
		case 1:
			darAltaAlumno();
		break;
		case 2: 
			darAltaTT();
		break;
		case 3:
			actualizarAlumno();
		break;
		case 4:
			actualizarTT();
		break;
		case 6:
			guardarActividad();
		break;
		case 7:
			eliminarActividad();
		break;
		case 8:
			enviarCorreo();
		break;
		case 9:
			actualizarActividad();
		break;
	}
?>