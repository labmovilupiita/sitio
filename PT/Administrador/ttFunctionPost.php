<?php include("../database.php")?>
<?php
	$proceso = $_POST['proceso'];

	function darAltaProfesor(){
		$con = Conectarse();
		$sql = "INSERT INTO profesor (nombre, apellidopaterno, apellidomaterno, correo, password) VALUES ('$_POST[nombre]', '$_POST[apaterno]', '$_POST[amaterno]', '$_POST[correo]','$_POST[pass]')";


		if (!mysqli_query($con,$sql))
		  {
		  	die('Error: ' . mysqli_error($con));
		  }

		Cerrar($con);

		header( 'Location: indexlog.php?status=1' ) ;
	}

	function eliminarProfesor(){
		$con = Conectarse();
		$sql = "DELETE FROM profesor WHERE id=".$_POST['persona'];

		if (!mysqli_query($con,$sql))
		  {
		  	die('Error: ' . mysqli_error($con));
		  }

		Cerrar($con);

		header( 'Location: indexlog.php?status=2' ) ;

	}

	function modificarProfesor(){
		$con = Conectarse();
		$sql = "UPDATE profesor SET nombre='".$_POST['nombre']."', apellidopaterno='".$_POST['apaterno']."', apellidomaterno='".$_POST['amaterno']."', correo='".$_POST['correo']."', password='".$_POST['pass']."' WHERE id=".$_POST['persona2'];

		if (!mysqli_query($con,$sql))
		  {
		  	die('Error: ' . mysqli_error($con));
		  }

		Cerrar($con);

		header( 'Location: indexlog.php?status=3' ) ;

	}

	switch($proceso){
		case 1:
			darAltaProfesor();
		break;
		case 2:
			eliminarProfesor();
		break;
		case 3:
			modificarProfesor();
		break;
	}
?>